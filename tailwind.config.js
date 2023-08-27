const defaultTheme = require("tailwindcss/defaultTheme");
const colors = require("tailwindcss/colors");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],
    darkMode: "class",
    theme: {
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: { ...colors.blue, DEFAULT: colors.blue[600] },
                'primary-hover': { ...colors.blue, DEFAULT: colors.blue[700] },
                secondary: { ...colors.gray, DEFAULT: colors.gray[400] },
                'secondary-hover': { ...colors.gray, DEFAULT: colors.gray[700] },
                success: { ...colors.green, DEFAULT: colors.green[600] },
                'success-hover': { ...colors.green, DEFAULT: colors.green[700] },
                danger: { ...colors.red, DEFAULT: colors.red[600] },
                'danger-hover': { ...colors.red, DEFAULT: colors.red[700] },
                warning: { ...colors.yellow, DEFAULT: colors.yellow[600] },
                'warning-hover': { ...colors.yellow, DEFAULT: colors.yellow[700] },
            }
        },
        container: {
            center: true,
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
};
