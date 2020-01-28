import Vue from 'vue';
import VueRouter from 'vue-router';

import demoCanvasComponent from "./components/ExampleComponent";
import EditorComponent from "./components/EditorComponent";
import homeComponent from "./components/homeComponent";
import demoComponent from "./components/demoComponent";
import testCanvas from "./components/testCanvas";

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
        {
            path: '/demo',
            component: demoComponent,
        },
        {
            path: '/test',
            component: testCanvas,
        },
    ],
    mode: 'history',
})