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
                'cloud-white': '#F5F5F7',
                'deep-graphite': '#2E2E2E',
                'soft-navy': '#64748B',
                'muted-teal': '#5EAAA8',
                'blush-rose': '#F2C6C2',
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
