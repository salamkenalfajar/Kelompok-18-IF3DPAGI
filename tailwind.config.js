/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        roboto: ['Roboto', 'sans-serif'],
      },
      colors: {
        'color-coklat1': '#6D4C41',
        'color-coklat2': '#8D6E63',
        'color-biru1': '#38B9FA',
        'color-biru2': '#F6F9FF',
        'color-abu1': '#E9E8E8',
      }
    },
  },
  plugins: [
    require('daisyui'),
  ],
}

