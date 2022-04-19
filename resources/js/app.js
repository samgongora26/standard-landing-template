require('./bootstrap');

import { createApp, h } from 'vue';
import { createInertiaApp, Head, Link  } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
// idk where get the appName so, let's name it 
// const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';
//Change this line with the AppName
const appName = 'Template';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .component('Head', Head)
            .component('Link', Link)
            .mixin({ methods: { route } })
            .mount(el);
    },
});

InertiaProgress.init({ color: '#4B5563' });
