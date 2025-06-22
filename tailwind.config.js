/** @type {import('tailwindcss').Config} */
const defaultTheme = require("tailwindcss/defaultTheme");
module.exports = {
  content: [
    "./app/Views/**/*.php", // All .php files in the Views folder and its subfolders
    "./app/Views/*.php", // All .php files directly in the Views folder
    "public/js/**/*.js", // All .js files in your public/js folder
  ],
  theme: {
    extend: {
      colors: {
        golden: "#FFC107",
        grayish: "#8D6E63",
        "page-bg": "#fffaf2",
        "border-card": "#ccc",
      },
      fontFamily: {
        josefin: ['"Josefin Sans"', "sans-serif"],
        jaldi: ['"Jaldi"', "sans-serif"],
      },
      transitionProperty: {
        "bg-img": "background-image",
      },
      backgroundImage: {
        Landing: "url('./Assets/LandingPagePic1.jpg')",
      },
    },
  },
  plugins: [],
};
