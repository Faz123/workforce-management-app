const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                'purple-lighter': '#8B5CF6',
                'purple': '#6D28D9',
                'purple-dark': '#4C1D95',
              },
            fontFamily: {
                sans: ['Roboto', 'sans-serif'],
            },
            maxWidth: {
                '1/4': '25%',
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
