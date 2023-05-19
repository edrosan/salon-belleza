/** @type {import('tailwindcss').Config} */

const withMT = require("@material-tailwind/html/utils/withMT");

 
module.exports = withMT({
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./resources/**/*.html"],
  theme: {
    extend: {},
  },
  plugins: [
    require('flowbite/plugin')
  ],
});

// module.exports = {
//   content: [
//     "./resources/**/*.blade.php",
//     "./resources/**/*.js",
//     "./resources/**/*.vue",
//   ],
//   theme: {
//     extend: {
      
//     },
//   },
//   plugins: [
//     // require('@tailwindcss/aspect-ratio')
//   ],
// }


