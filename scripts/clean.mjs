import fs from 'node:fs/promises';

const paths = ['theme/assets'];

await Promise.all(
  paths.map((target) => fs.rm(target, { recursive: true, force: true })),
);
