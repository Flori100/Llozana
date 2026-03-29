import { defineConfig } from 'vite'

export default defineConfig({
  server: {
      origin: 'http://localhost:5173',
      cors: true
  },
  
  build: {
    outDir: 'dist',
    manifest: true,
    assetsDir: 'assets',
    rollupOptions: {
      input: 'resources/js/app.js',
    },
  },
})
