/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {},
    daisyui: {
      themes: ["light", "dark", "cupcake"],
    },
  },
  plugins: [
    require("daisyui"),
  ],
}