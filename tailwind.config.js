/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./src/**/*.{html,js}",
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      screens: {
        xs: '425px', // Breakpoint baru untuk layar lebih kecil dari sm
      },
      colors: {
        'color-coklat1': '#6D4C41',
        'color-coklat2': '#8D6E63',
        'color-coklat3': '#A1887F',
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

