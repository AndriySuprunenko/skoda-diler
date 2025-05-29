export default {
  content: [
      "./resources/**/*.blade.php",
  ],
  theme: {
    extend: {
      colors: {
      },
      fontFamily: {
        sans: ['SkodaNext', 'sans-serif'], // Основний шрифт
        'skoda-arabic': ['SkodaNextArabic', 'sans-serif'], // Для арабського тексту
      },
    },
  },
};