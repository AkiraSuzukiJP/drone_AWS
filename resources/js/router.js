import Router from 'vue-router'
import Home from './components/HomeComponent.vue'
import Menu from './components/MenuComponent.vue'

export default new Router({
  mode: 'history',
  routes: [
    { path: '/',
      name: 'menu',
      component: Menu
    },
    { path: '/',
      name: 'home',
      component: Home
    },
  ]
});
