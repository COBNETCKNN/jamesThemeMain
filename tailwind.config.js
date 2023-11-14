module.exports = {
  content: require('fast-glob').sync([
      './**/*.php'
  ]),
  theme: {
    screens: {
      sm: '600px',
      md: '769px',
      lg: '1024px',
      xl: '1460px',
      '2xl': '1460px',
    },
    extend: {
      fontFamily: {
        avenir: ["Avenir", "sans-serif"],
      },
      colors: { 
        'avenir': '#030212',
    },
    },
  },
  plugins: [],
}