module.exports = {
  root: true,
  build: {
    outDir: 'public',
    rollupOptions: {
      input: {
        main: 'resources/js/app.js',
        // Add other entry points if necessary
      },
    },
  },
  server: {
    port: 3000,
    open: true,
  },
  plugins: [
    // Add any necessary plugins here
  ],
  css: {
    preprocessorOptions: {
      css: {
        additionalData: '@import "./resources/css/app.css";',
      },
    },
  },
};