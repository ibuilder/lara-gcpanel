import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
// If using Vue: import vue from '@vitejs/plugin-vue';
// If using React: import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js'
                // Add other CSS/JS entry points if needed
            ],
            refresh: true, // Enables Blade/route refreshing on change
        }),
        // If using Vue:
        // vue({
        //     template: {
        //         transformAssetUrls: {
        //             base: null,
        //             includeAbsolute: false,
        //         },
        //     },
        // }),
        // If using React:
        // react(),
    ],
    // Optional: Configure dev server if needed (defaults often work)
    // server: {
    //     host: 'localhost', // Or your specific host
    //     hmr: {
    //         host: 'localhost', // Ensure HMR connects correctly
    //     },
    // }
});