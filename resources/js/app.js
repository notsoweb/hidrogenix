import '../css/app.css';
import './bootstrap';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';

import Notify from './notify';
import Swal from 'sweetalert2'
import { SessionFresh } from './sessionFresh';
import { TailwindScreen } from './tailwindScreen';
import { i18n, t } from '@/Lang/i18n';
import { bootSidebar } from '@/sidebar'
import { bootTheme, darkMode } from './darkMode';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

window.appName = appName;
window.lang = t;
window.Notify = new Notify();
window.sessionFresh = new SessionFresh();
window.Swal = Swal;
window.TwScreen = new TailwindScreen();
window.darkMode = darkMode;

// bootTheme();
bootSidebar();

createInertiaApp({
    progress: {
        color: '#4B5563'
    },
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ 
                render: () => h(App, props) 
            })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .use(i18n)
            .mount(el);
    }
});
