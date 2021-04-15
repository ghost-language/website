const colors = require('tailwindcss/colors')

module.exports = {
  mode: 'jit',
  purge: [
    './resources/views/**/*.blade.php',
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
      }
    },
  },
  variants: {
    extend: {
      visibility: ['responsive', 'group-focus'],
    }
  },
  plugins: [
    require('@tailwindcss/typography'),
  ],
}