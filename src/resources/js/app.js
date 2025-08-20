import './bootstrap';
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import PrimeVue from 'primevue/config';
import Aura from '@primeuix/themes/aura';
import { definePreset } from '@primeuix/themes';
import 'primeicons/primeicons.css';

const Noir = definePreset(Aura, {
    semantic: {
        focusRing: { width: '2px', style: 'dashed', color: '{primary.color}', offset: '1px' },
        primary: {
            50: '{zinc.50}', 100: '{zinc.100}', 200: '{zinc.200}', 300: '{zinc.300}',
            400: '{zinc.400}', 500: '{zinc.500}', 600: '{zinc.600}', 700: '{zinc.700}',
            800: '{zinc.800}', 900: '{zinc.900}', 950: '{zinc.950}'
        },
        colorScheme: {
            light: {
                primary: { color: '{zinc.950}', inverseColor: '#fff', hoverColor: '{zinc.900}', activeColor: '{zinc.800}' },
                highlight: { background: '{zinc.950}', focusBackground: '{zinc.700}', color: '#fff', focusColor: '#fff' },
                formField: { hoverBorderColor: '{primary.color}' }
            },
            dark: {
                primary: { color: '{zinc.50}', inverseColor: '{zinc.950}', hoverColor: '{zinc.100}', activeColor: '{zinc.200}' },
                highlight: { background: 'rgba(250,250,250,.16)', focusBackground: 'rgba(250,250,250,.24)', color: 'rgba(255,255,255,.87)', focusColor: 'rgba(255,255,255,.87)' },
                formField: { hoverBorderColor: '{primary.color}' }
            }
        }
    }
});

createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true });
        return pages[`./Pages/${name}.vue`];
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(PrimeVue, {
                theme: {
                    preset: Noir, // ⚡ используем кастомный пресет
                    options: {
                        prefix: 'p',
                        darkModeSelector: '.my-app-dark',
                        cssLayer: {
                            name: 'primevue',
                            order: 'app-styles, primevue, another-css-library'
                        }
                    }
                }
            })
            .mount(el);
    },
});
