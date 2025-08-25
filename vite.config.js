import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import { globSync } from 'glob';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'Lareon/CMS/resources/css/app.css', 'Lareon/CMS/resources/js/app.js','Lareon/CMS/resources/js/javascript.js',
                ...globSync('Lareon/Modules/*/resources/js/app.js'),
                ...globSync('Lareon/Modules/*/resources/css/app.css'),

                'resources/css/app.css', 'resources/js/app.js',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
