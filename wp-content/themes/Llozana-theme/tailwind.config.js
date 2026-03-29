/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./**/*.php",
    "./template-parts/**/*.php",
    "./resources/**/*.{js,css}"
  ],
  theme: {
    extend: {
      fontFamily: {
        luxury: ['"Playfair Display"', 'serif'],
      }
    },
  },
  plugins: [],
}
