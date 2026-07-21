import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                // Shared design-system bundle for redesigned pages. Kept separate
                // from app.css on purpose: app.css pulls in Tailwind's preflight,
                // which would reset the Bootstrap theme the other pages rely on.
                'resources/css/site.css',
                'resources/js/site.js',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
