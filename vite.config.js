import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({

    server: {
        host: '127.0.0.1', // permite conexión desde otras máquinas
        port: 8001, // puedes cambiarlo si quieres, solo asegúrate que no esté bloqueado por firewall
        strictPort: true,
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
