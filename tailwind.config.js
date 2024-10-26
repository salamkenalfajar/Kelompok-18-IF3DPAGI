/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'color-coklat1': '#6D4C41',
        'color-biru1': '#38B9FA',
        'color-biru2': '#F6F9FF',
      }
    },
  },
  plugins: [
    require('daisyui'),
  ],
}

