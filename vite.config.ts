/* eslint-disable import/no-extraneous-dependencies */
import defineConfig from '@openstamanager/vite-config';
import path from 'node:path';
import url from 'node:url';

export default defineConfig({
  build: {
    lib: {
      entry: path.resolve(path.dirname(url.fileURLToPath(import.meta.url)), 'resources/js/index.ts'),
      formats: ['es'],
      fileName: 'index.ts'
    },
    rollupOptions: {
      external: ['openstamanager']
    }
  }
});
