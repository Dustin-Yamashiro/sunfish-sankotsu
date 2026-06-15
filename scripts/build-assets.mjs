import fs from 'node:fs/promises';
import path from 'node:path';
import { glob } from 'glob';
import sharp from 'sharp';
import { optimize } from 'svgo';

const imageInputDir = 'assets/images';
const imageOutputDir = 'theme/assets/images';
const fontInputDir = 'assets/fonts';
const fontOutputDir = 'theme/assets/fonts';
const videoInputDir = 'assets/video';
const videoOutputDir = 'theme/assets/video';
const webpQuality = Number.parseInt(process.env.WEBP_QUALITY ?? '82', 10);

const outputTargets = new Map();

async function exists(target) {
  try {
    await fs.access(target);
    return true;
  } catch {
    return false;
  }
}

function normalizeTarget(target) {
  return path.normalize(target).toLowerCase();
}

function reserveOutput(input, output) {
  const key = normalizeTarget(output);
  const existing = outputTargets.get(key);

  if (existing && existing !== input) {
    throw new Error(`Asset output collision:\n- ${existing}\n- ${input}\n=> ${output}`);
  }

  outputTargets.set(key, input);
}

async function copyTree(inputDir, outputDir, pattern) {
  if (!(await exists(inputDir))) {
    return;
  }

  const files = await glob(pattern, { cwd: inputDir, nodir: true, dot: true });

  await Promise.all(
    files.map(async (relativePath) => {
      const input = path.join(inputDir, relativePath);
      const output = path.join(outputDir, relativePath);
      reserveOutput(input, output);
      await fs.mkdir(path.dirname(output), { recursive: true });
      await fs.copyFile(input, output);
    }),
  );
}

async function buildImages() {
  if (!(await exists(imageInputDir))) {
    return;
  }

  const files = await glob('**/*.{jpg,jpeg,png,webp,svg,gif,avif}', {
    cwd: imageInputDir,
    nodir: true,
    nocase: true,
  });

  for (const relativePath of files) {
    const input = path.join(imageInputDir, relativePath);
    const parsed = path.parse(relativePath);
    const ext = parsed.ext.toLowerCase();
    const outputDir = path.join(imageOutputDir, parsed.dir);
    await fs.mkdir(outputDir, { recursive: true });

    if (['.jpg', '.jpeg', '.png'].includes(ext)) {
      const output = path.join(outputDir, `${parsed.name}.webp`);
      reserveOutput(input, output);
      await sharp(input).rotate().webp({ quality: webpQuality }).toFile(output);
      continue;
    }

    if (ext === '.svg') {
      const output = path.join(outputDir, parsed.base);
      reserveOutput(input, output);
      const source = await fs.readFile(input, 'utf8');
      const result = optimize(source, {
        multipass: true,
        path: input,
        plugins: [
          {
            name: 'preset-default',
            params: {
              overrides: {
                removeViewBox: false,
              },
            },
          },
        ],
      });
      await fs.writeFile(output, result.data);
      continue;
    }

    const output = path.join(outputDir, parsed.base);
    reserveOutput(input, output);
    await fs.copyFile(input, output);
  }
}

await buildImages();
await copyTree(fontInputDir, fontOutputDir, '**/*');
await copyTree(videoInputDir, videoOutputDir, '**/*');
