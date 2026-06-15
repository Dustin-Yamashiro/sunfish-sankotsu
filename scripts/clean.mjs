import fs from 'node:fs/promises';

const paths = ['theme/assets', 'original-blocks/build'];

await Promise.all(
  paths.map((target) => fs.rm(target, { recursive: true, force: true })),
);
