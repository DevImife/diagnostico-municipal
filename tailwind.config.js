import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
  ],

  theme: {
    extend: {
      fontFamily: {
        sans: ['Figtree', ...defaultTheme.fontFamily.sans],
      },
      colors: {
        vino: '#56212f', // 👈 Aquí agregas tu color personalizado
        rosa: '#EBCBD4',
        cafe: '#977e5b',
        negro: '#141414',
        gris: '#575252',
        dorado: '#c3b08f',
        grisclaro: '#d6d1ca',
        grisOscuro: '#201d1d',
        doradoFuerte: '#A68A59',
        cafeclaro: '#F5F3EF',
        vinoClaro: '#9f2241',
        caramelo: '#bc955b',
      },
      maxWidth: {
        '8xl': '1400px',
        '9xl': '1800px',
      },
    },
  },


  plugins: [forms],
};
