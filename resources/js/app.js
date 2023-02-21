import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";

window._base_url = import.meta.env.APP_URL;

createInertiaApp({
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
        return pages[`./Pages/${name}.vue`];
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mount(el);
    },
    progress: {
        color: "#29d",
    },
});
