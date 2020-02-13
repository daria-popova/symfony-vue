import Vue from "vue";
import VueRouter from "vue-router";
import Home from "../views/Home";
import Posts from "../views/Posts";
import About from "../views/About";

Vue.use(VueRouter);

export default new VueRouter({
    mode: "history",
    routes: [
        { path: "/home", component: Home },
        { path: "/posts", component: Posts },
        { path: "/about", component: About },
        { path: "*", redirect: "/home" }
    ]
});