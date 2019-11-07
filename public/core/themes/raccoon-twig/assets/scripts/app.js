import $ from 'jquery';
import sayHello from './components/dummy';
import Vue from 'vue';

//vue components
import RecentPosts from './components/vue/RecentPosts.vue';

Vue.config.productionTip = false;
const vueContainers = document.getElementsByClassName('vue-container');
[].forEach.call(vueContainers, (container) => {
    const vueContainer = new Vue({
        el: container,
        components: {
            RecentPosts
        }
    });
});

console.log('Hello from the application');
sayHello();
