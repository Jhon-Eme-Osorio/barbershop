import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/styles.css',
                'resources/css/style-foto.css',
                'resources/css/styles-home.css',
                'resources/js/app.js',
                'resources/js/script.js',
            ],
            refresh: true,
        }),
    ],
});
