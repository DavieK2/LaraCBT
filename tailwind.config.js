module.exports = {
  mode: 'jit',
  purge: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.svelte',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        'dark': '#20304C',
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
