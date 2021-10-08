module.exports = {
  purge: ["./index.html", "./src/**/*.{vue,js,ts,jsx,tsx}"],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      fontFamily: {
        sans: "Inter, sans-serif",
      },
      colors: {
        base: "#3AA0DA",
        secondary: "#00000008",
        "base-hover": "#2D96D1",
        "b-color": "#308bbf",
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
};
