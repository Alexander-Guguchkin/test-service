import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import vue from '@vitejs/plugin-vue';
import Components from 'unplugin-vue-components/vite';
import {PrimeVueResolver} from '@primevue/auto-import-resolver';
import path from 'path';
import { wayfinder } from "@laravel/vite-plugin-wayfinder";

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.ts'],
            refresh: true,
        }),
        vue(),
        Components({
            resolvers: [
                PrimeVueResolver()
            ]
        }),
        tailwindcss(),
        wayfinder()
    ],
    resolve:{
        alias:{
            '@' :path.resolve('resources/js')
        }
    }
});
