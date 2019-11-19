import Vue from "vue";

import App from "./views/App";
import Menu from "./components/Menu";

Vue.component("menu-component", Menu);

const app = new Vue({
    el: "#app",
    components: { App }
    // router
});
