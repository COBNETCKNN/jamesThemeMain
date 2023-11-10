module.exports = {
  content: require('fast-glob').sync([
      './**/*.php'
  ]),
  theme: {
    screens: {
      sm: '600px',
      md: '728px',
      lg: '984px',
      xl: '1460px',
      '2xl': '1460px',
    },
    extend: {
      fontFamily: {
        avenir: ["avenir", "sans-serif"],
      },
      colors: { 
        'avenir': '#030212',
    },
    },
  },
  plugins: [],
}