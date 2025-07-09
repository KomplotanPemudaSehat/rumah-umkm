import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', // Pastikan path ini benar
                'resources/js/app.js',   // Pastikan path ini benar
            ],
            refresh: true, // Pastikan ini ada untuk hot reloading
        }),
    ],
});