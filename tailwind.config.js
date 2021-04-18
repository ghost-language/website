const colors = require('tailwindcss/colors')

module.exports = {
  mode: 'jit',
  purge: [
    './resources/views/**/*.blade.php',
    './resources/js/components/**/*.js',
  ],
  theme: {
    extend: {
      fontFamily: {
        'sans': ['Inter', 'sans-serif'],
        'mono': ['Ubuntu Mono', 'monospace'],
      },
      colors: {
        gray: colors.coolGray,
        violet: colors.violet
      },
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
  ],
}