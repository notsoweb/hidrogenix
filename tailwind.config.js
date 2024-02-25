const defaultTheme = require('tailwindcss/defaultTheme')
const colorsConfig = require('./colors.json')

/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        './colors.json',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Karla', ...defaultTheme.fontFamily.sans],
                'google-icon':['Material Icons'],
                'google-icon-outlined':['Material Symbols Outlined']
            },
            colors: colorsConfig,
            spacing: {
                '18': '4.5rem',
                '22': '5.5rem',
                '26': '6.5rem',
                '30': '7.5rem',
                '128': '32rem',
            }
        },
    },

    plugins: [require('@tailwindcss/typography')],
};
