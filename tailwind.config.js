/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["index.html", "./node_modules/flowbite/**/*.js", "./about-us/index.html", "./*.php",
    "./**/*.php"],
  plugins: [
    require('flowbite/plugin'),
  ],
  theme: {
    extend: {
      colors: {
        NormalBlue: "#0096CC",
        LightBlue: "#CFF2FF",
        DarkBlue: "#007199",
        DarkerBlue: "#005A7A",

        NormalGreen: "#6FEA51",
        LightGreen: "#AEFD88",
        DarkGreen: "#53B03D",
        DarkerGreen: "#27521C",

        NormalYellow: "#E8A328",
        LightYellow: "#F2C039",

        NormalPurple: "#9146F1",

        CustomBlue: "#3a6593",

        primary: {
          "50": "#eff6ff",
          "100": "#dbeafe",
          "200": "#bfdbfe",
          "300": "#93c5fd",
          "400": "#60a5fa",
          "500": "#3b82f6",
          "600": "#2563eb",
          "700": "#1d4ed8",
          "800": "#1e40af",
          "900": "#1e3a8a",
          "950": "#172554",
        },
      },
      fontFamily: {
        sans: "Synonym-Regular", // Replace default sans-serif 
        pally: ['Pally', 'sans-serif'],
      },
    },
  },
};
