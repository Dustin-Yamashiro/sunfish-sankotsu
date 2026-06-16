import { defineConfig } from 'vite';
import path from 'node:path';
import { fileURLToPath } from 'node:url';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);
const localWordPressOrigins = [
  /^http:\/\/localhost(?::\d+)?$/,
  /^http:\/\/127\.0\.0\.1(?::\d+)?$/,
  /^http:\/\/10\.\d{1,3}\.\d{1,3}\.\d{1,3}(?::\d+)?$/,
  /^http:\/\/172\.(1[6-9]|2\d|3[01])\.\d{1,3}\.\d{1,3}(?::\d+)?$/,
  /^http:\/\/192\.168\.\d{1,3}\.\d{1,3}(?::\d+)?$/,
];

function phpFullReload() {
  return {
    name: 'php-full-reload',
    handleHotUpdate({ file, server }) {
      if (file.endsWith('.php')) {
        server.ws.send({ type: 'full-reload' });
      }
    },
  };
}

export default defineConfig({
  base: './',
  plugins: [phpFullReload()],
  server: {
    host: '0.0.0.0',
    port: 5173,
    strictPort: true,
    cors: {
      origin: localWordPressOrigins,
    },
  },
  build: {
    outDir: 'themes/swell_child/assets',
    assetsInlineLimit: 0,
    manifest: true,
    emptyOutDir: true,
    cssCodeSplit: true,
    rolldownOptions: {
      input: {
        main: path.resolve(__dirname, 'assets/js/main.js'),
        style: path.resolve(__dirname, 'assets/scss/style.scss'),
      },
      output: {
        entryFileNames: 'js/[name].js',
        chunkFileNames: 'js/[name].js',
        assetFileNames: ({ name }) => {
          if (name && name.endsWith('.css')) {
            return 'css/[name][extname]';
          }

          return 'misc/[name][extname]';
        },
      },
    },
  },
});
