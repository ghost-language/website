const colors = require('tailwindcss/colors')

module.exports = {
  content: [
    './components/**/*.{vue,js}',
    './content/**/*.{md,json}',
    './layouts/**/*.vue',
    './pages/**/*.vue',
    './plugins/**/*.{js,ts}',
    './nuxt.config.{js,ts}',
  ],
  theme: {
    extend: {
      colors: {
        gray: colors.gray,
        cyan: colors.cyan,
        sky: colors.sky,
      },
      fontFamily: {
        'sans': ['Inter', 'sans-serif'],
        'mono': ['Source Code Pro', 'monospace'],
      },
      maxWidth: {
        '8xl': '90rem',
      }
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
  ],
}
