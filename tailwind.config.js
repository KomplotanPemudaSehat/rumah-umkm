import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
                poppins: ['Poppins', 'sans-serif'],
            },
            colors: {
                'biru-keren': '#003878',
                'cloud-white': '#F5F5F7',
                'deep-graphite': '#6687ae',
                'soft-navy': '#64748B',
                'muted-teal': '#325f93',
                'blush-rose': '#007478',
                'biru-footer': '#00326c',
                'gelap': '#2e2c2cff',
                // Warna Kategori
                'coral-red': '#F26457',
                'stone-green': '#8FA998',
                'soft-lilac': '#D2B5D8',
                'aqua-glow': '#84DCC6',
            }
        },
    },

    plugins: [forms],
};
