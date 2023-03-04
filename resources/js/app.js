import "./bootstrap";
import "../css/app.css";

import { createApp, h } from "vue";
import { createI18n } from "vue-i18n";
import { createInertiaApp } from "@inertiajs/inertia-vue3";
import { InertiaProgress } from "@inertiajs/progress";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "../../vendor/tightenco/ziggy/dist/vue.m";
import Toaster from "@meforma/vue-toaster";
import vClickOutside from "click-outside-vue3";

const appName =
    window.document.getElementsByTagName("title")[0]?.innerText || "Laravel";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue")
        ),
    setup({ el, app, props, plugin }) {
        const messages = {
            lt: {
                message: {
                    hello: "hello world",
                },
            },
        };

        const i18n = createI18n({
            locale: "lt", // set locale
            fallbackLocale: "lt", // set fallback locale
            messages,
        });

        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .use(Toaster, {
                position: "bottom",
                duration: 5000,
                max: 3,
            })
            .use(vClickOutside)
            .use(i18n)
            .mount(el);
    },
});

InertiaProgress.init({ color: "#4B5563" });
