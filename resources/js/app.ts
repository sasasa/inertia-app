import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'
import Layout from "./Components/Layout.vue";


createInertiaApp({
    resolve: name => {
        let page = require(`./Pages/${name}`).default;

        page.layout ??= Layout;

        return page;
    },
    setup({ el, app, props, plugin }) {
        createApp({ render: () => h(app, props) })
            .use(plugin)
            .mount(el)
    },
    title: (title) => `${title} | Inertia.js`,
})
InertiaProgress.init()