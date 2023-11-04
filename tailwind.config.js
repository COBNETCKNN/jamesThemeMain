module.exports = {
  content: require('fast-glob').sync([
      './**/*.php'
  ]),
  theme: {
    extend: {
      fontFamily: {
      },
      colors: {
    },
    },
  },
  plugins: [],
}