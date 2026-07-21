import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                // Homepage-only bundle. Kept separate from app.css on purpose:
                // app.css pulls in Tailwind's preflight, which would reset the
                // Bootstrap theme every other page depends on.
                'resources/css/home.css',
                'resources/js/home.js',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
