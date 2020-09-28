require ('bootstrap');
const Vue = require('vue');
import BootstrapVue from 'bootstrap-vue';

import 'bootstrap-vue/dist/bootstrap-vue.css';

Vue.use(BootstrapVue);
Vue.config.devtools = true;

import MenuManagement from './components/options/Menu';
const app = new Vue({
    el: '#MenuManagement',
    render: h => h(MenuManagement)
});
