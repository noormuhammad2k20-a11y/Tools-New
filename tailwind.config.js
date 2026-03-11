/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./app/views/**/*.php",
    "./assets/js/**/*.js",
    "./index.php"
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Inter', 'sans-serif'],
      },
      colors: {
        primary: '#2563eb',
        'primary-hover': '#1d4ed8',
        'bg-soft': '#f8fafc',
        'border-soft': '#e2e8f0',
      }
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
  ],
}
