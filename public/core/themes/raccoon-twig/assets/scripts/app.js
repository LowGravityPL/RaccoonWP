import $ from 'jquery';
import sayHello from './components/dummy';
import Vue from 'vue';
import App from './App.vue';

Vue.config.productionTip = false;

new Vue({
    render: h => h(App),
}).$mount('#vue-example')

console.log('Hello from the application');
sayHello();
