import Vue from "vue";
// import VueRouter from "vue-router";

// Vue.use(VueRouter);

import App from "./views/App";
import Menu from "./components/Menu";
import Form from "./components/Form";

Vue.component("menu-component", Menu);
Vue.component("form-component", Form);
// import Menu from "./views/Menu";
// import Home from "./views/Home";

// const router = new VueRouter({
//     mode: "history",
//     routes: [
//         {
//             path: "/",
//             name: "app",
//             component: App
//         }
//     ]
// });

const app = new Vue({
    el: "#app",
    components: { App }
    // router
});
