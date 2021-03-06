module.exports = {
  purge: [
    './src/**/*.html',
    './src/**/*.vue',
    './src/**/*.jsx',
    './src/**/*.php'
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      backgroundImage: theme => ({
        'star': "url('../images/starbg.jpg')",
        'plus': "url('../images/icon/add_image.png')",
        'home': "url('../images/home2.jpg')",
        'jovan': "url('../images/jovan.jpg')",
        'felix': "url('../images/felix.jpg')",
        'richard': "url('../images/richard.jpg')",

        'footer-texture': "url('/img/footer-texture.png')",
      }),
      keyframes: {
        'fade-in-right': {
          '0%': {
              opacity: '0',
              transform: 'translateX(-90px)'
          },
          '100%': {
              opacity: '1',
              transform: 'translateX(0)'
          },
        },
        'fade-out-left': {
          'from': {
              opacity: '1',
              transform: 'translateX(0px)'
          },
          'to': {
              opacity: '0',
              transform: 'translateX(-90px)'
          },
        },
        'fade-in': {
          '0%': {
              opacity: '0',
          },
          '100%': {
              opacity: '1',
          },
        }
      },
      animation: {
        'fade-in-right': 'fade-in-right 1s ease-out',
        'fade-out-left': 'fade-out-left 1s ease-out',
        'fade-in': 'fade-in 2s ease-out',
      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
