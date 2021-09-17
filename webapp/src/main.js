import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import AppLayout from "@/layouts/AppLayout";
import "tailwindcss/tailwind.css";

Vue.config.productionTip = false;

Vue.component("AppLayout", AppLayout);

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
