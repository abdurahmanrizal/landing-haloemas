import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Poppins", "Lora", ...defaultTheme.fontFamily.sans],
                serif: ["Lora", ...defaultTheme.fontFamily.serif],
                poppins: ["Poppins", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: "var(--primary-color)",
                secondary: "var(--secondary-color)",
            },
        },
    },
    plugins: [],
};
