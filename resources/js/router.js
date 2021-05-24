import Router from 'vue-router'
import Home from './components/HomeComponent.vue'
import Menu from './components/MenuComponent.vue'

export default new Router({
  mode: 'history',
  routes: [
    //ホーム
    //{ path: '/', name: 'home', component: Home },
    //メニュー
    { path: '/', name: 'menu', component: require('./components/MenuComponent.vue').default },
    //機体一覧
    { path: '/aircrafts', name: 'aircrafts', component: require('./components/AircraftsComponent.vue').default },
    //操縦者一覧
    //{ path: '/pilots', name: 'pilots', component: require('./components/PilotsComponent.vue').default },
    //点検者一覧
    //{ path: '/inspectors', name: 'inspectors', component: require('./components/InspectorsComponent.vue').default },
    //点検記録一覧
    //飛行記録一覧
    //設定管理
    // not found
    { path: '*', component: require('./components/NotFoundComponent.vue').default },    
  ]
});
