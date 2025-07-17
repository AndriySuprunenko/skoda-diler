export default {
  content: [
      "./resources/**/*.blade.php",
  ],
  theme: {
    extend: {
      screens: {
        'md': '800px', // Додано для великих екранів
      },
      colors: {
        'skoda-emerald-green': '#0E3A2F', // Основний зелений колір
        'skoda-electric-green': '#78FAAE', // Світло-зелений колір
        // вторинні кольори
        'skoda-black': '#000000', // Чорний
        'skoda-white': '#FFFFFF', // Білий
        'skoda-chrome-750': '#394748', // Хромований 750
        'skoda-chrome-500': '#0F797A', // Хромований 500
        'skoda-chrome-400': '#A0A7A8', // Хромований 400
        'skoda-chrome-200': '#CACECF', // Хромований 200
        'skoda-chrome-50': '#E3E5E6', // Хромований 50
        'skoda-chrome-25': '#F1F2F2', // Хромований 25
        // третинні кольори
        'skoda-blue': '#0961A1',
        'skoda-red': '#ED2100',
        'skoda-gray': '#898989', 
        'skoda-green': '#0E3A2F',
        'skoda-gold': '#EFBF04' ,
        'skoda-bronze': '#CE8946',
        'skoda-yellow': '#FAEB67',
        'skoda-orange': '#FF7518',
        'skoda-teal': '#1ED4DF',
      },
      fontFamily: {
        sans: ['SkodaNext', 'sans-serif'], // Основний шрифт
        'skoda-arabic': ['SkodaNextArabic', 'sans-serif'], // Для арабського тексту
      },
    },
  },
};