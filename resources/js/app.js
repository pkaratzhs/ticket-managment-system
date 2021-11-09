require('./bootstrap');

/* Import modules...
import { createApp, h } from 'vue';
import { App as InertiaApp, plugin as InertiaPlugin, Link as InertiaLink } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';

const el = document.getElementById('app');

const app = createApp({
    render: () =>
        h(InertiaApp, {
            initialPage: JSON.parse(el.dataset.page),
            resolveComponent: (name) => require(`./Pages/${name}`).default,
        }),
})
    .mixin({ methods: { route } })
    .component('InertiaLink',InertiaLink)
    .use(InertiaPlugin);

app.mount(el);
InertiaProgress.init({ color: '#4B5563' }); */


import { createApp, h } from "vue";
import { createInertiaApp, Link } from "@inertiajs/inertia-vue3";
import { InertiaProgress } from "@inertiajs/progress";
import AppLayout from "./Layouts/AppLayout";

createInertiaApp({
    resolve: name => {
        let page = require(`./Pages/${name}`).default;
        page.layout ??= AppLayout;
        return page;
    },

    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mixin({ methods: { route } })
            .component("InertiaLink", Link)
            .mount(el);
    },

    title: title => `My App - ${title}`
});

InertiaProgress.init({
    color: "red",
    showSpinner: true,
});