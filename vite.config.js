import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',

                'resources/assets/css/theme.css',
                'resources/assets/css/theme-rtl.css',
                'resources/assets/css/user.css',
                'resources/assets/css/user-rtl.css',

                'resources/assets/img/favicons/apple-touch-icon.png',
                'resources/assets/img/favicons/favicon-32x32.png',
                'resources/assets/img/favicons/favicon-16x16.png',
                'resources/assets/img/favicons/favicon.ico',
                'resources/assets/img/favicons/manifest.json',
                'resources/assets/img/icons/logo.png',
                'resources/assets/js/calendar.js',
                'resources/assets/js/config.js',
                'resources/assets/js/crm-analytics.js',
                'resources/assets/js/crm-dashboard.js',
                'resources/assets/js/echarts-example.js',
                'resources/assets/js/ecommerce-dashboard.js',
                'resources/assets/js/phoenix.js',
                'resources/assets/js/project-details.js',
                'resources/assets/js/projectmanagement-dashboard.js',
                'resources/assets/js/showcase.js',

                'resources/vendors/feather-icons/feather.min.js',
                'resources/vendors/bootstrap/bootstrap.min.js'
            ],
            refresh: true,
        }),
    ],
});
