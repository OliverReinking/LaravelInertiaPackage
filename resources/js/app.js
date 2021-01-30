// vue
import Vue from "vue";

// NProgress
import NProgress from "nprogress";

// inertia-vue
import { InertiaApp, plugin } from "@inertiajs/inertia-vue";
Vue.use(plugin);

// inertia
import { Inertia } from "@inertiajs/inertia";

// inertia progress indicator
import { InertiaProgress } from "@inertiajs/progress";

// inerta progress initialize
InertiaProgress.init({
    // The delay after which the progress bar will
    // appear during navigation, in milliseconds.
    delay: 250,
    // The color of the progress bar.
    color: "#FDE047",
    // Whether to include the default NProgress styles.
    includeCSS: true,
    // Whether the NProgress spinner will be shown.
    showSpinner: false
});

// inerta progress events
let timeout = null;
// starts progress indicator
Inertia.on("start", () => {
    console.log("34 start");
    timeout = setTimeout(() => NProgress.start(), 250);
});
// observe progress
Inertia.on("progress", event => {
    if (NProgress.isStarted() && event.detail.progress.percentage) {
        NProgress.set((event.detail.progress.percentage / 100) * 0.9);
    }
});
// ends progress indicator
Inertia.on("finish", event => {
    console.log("45 finish");
    clearTimeout(timeout);
    if (!NProgress.isStarted()) {
        return;
    } else if (event.detail.visit.completed) {
        NProgress.done();
    } else if (event.detail.visit.interrupted) {
        NProgress.set(0);
    } else if (event.detail.visit.cancelled) {
        NProgress.done();
        NProgress.remove();
    }
});

// Ziggy
Vue.mixin({ methods: { route: window.route } });

const app = document.getElementById("app");

new Vue({
    render: h =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: name =>
                    import(`./Pages/${name}`).then(module => module.default)
            }
        })
}).$mount(app);
