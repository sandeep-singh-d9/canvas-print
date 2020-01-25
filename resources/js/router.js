import Vue from 'vue';
import VueRouter from 'vue-router';

import demoCanvasComponent from "./components/ExampleComponent";
import EditorComponent from "./components/EditorComponent";
import homeComponent from "./components/homeComponent";

Vue.use(VueRouter)

export default new VueRouter({
    routes: [
        {
            path: '/',
            component: demoCanvasComponent,
        },
        {
            path: '/dev-ui',
            component: EditorComponent,
        },
        {
            path: '/welcome',
            component: homeComponent,
        },
    ],
    mode: 'history',
})