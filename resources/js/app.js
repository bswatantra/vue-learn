import Vue from "vue";
import store from './store/index';


require('./bootstrap');


Vue.component('App',require('./App.vue').default);
Vue.component('Navbar',require('./components/Navbar.vue').default);
Vue.component('Post',require('./components/Post.vue').default);
Vue.component('Footer',require('./components/Footer.vue').default);


const app=new Vue({
	el: '#app',
	store
});