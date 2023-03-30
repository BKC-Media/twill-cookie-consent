/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./resources/views/components/*.blade.php"],
    prefix: 'tcc__', // Prefix for all classes
    theme: {
        extend: {
            zIndex: {
                '999': '999',
            }
        },
    },
    plugins: [],
}