require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('games-component', require('./components/games/Games.vue').default);
Vue.component('createGames', require('./components/games/Create.vue').default);
Vue.component('editGames', require('./components/games/Edit.vue').default);

Vue.component('users-component', require('./components/users/Users.vue').default);
Vue.component('createUsers', require('./components/users/Create.vue').default);
Vue.component('editUsers', require('./components/users/Edit.vue').default);

const app = new Vue({
    el: '#app',
});
