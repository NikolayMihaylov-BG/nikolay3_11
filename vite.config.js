import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/css/app.css',
                'resources/js/admin/main.js',
                'resources/js/admin/invoice_parameters/index.js',
                'resources/js/admin/invoice_parameters/invoice.js',
            ],
            refresh: true,
        }),
    ],
});
