
require('./bootstrap');

window.Vue = require('vue');

// import Cookie from 'js-cookie';
// import vClickOutside from 'v-click-outside';

// Vue.use(vClickOutside);

// Vue.component('tooltip', require('./components/Tooltip.vue').default);
// Vue.component('modal', require('./components/Modal.vue').default);
// Vue.component('input-file', require('./components/inputs/File.vue').default);
Vue.component('pinned', require('./components/Pinned.vue').default);
// Vue.component('simplebar', require('./components/Simplebar.vue').default);
// Vue.component('dropdown', require('./components/Dropdown.vue').default);
// Vue.component('carousel', require('./components/Carousel.vue').default);

// Vue.component('sidebar', require('./components/Sidebar.vue').default);
//
// Vue.component('slide-nav', require('./components/slide-nav/Nav.vue').default);
// Vue.component('slide-nav-item', require('./components/slide-nav/NavItem.vue').default);
// Vue.component('slide-nav-sub-item', require('./components/slide-nav/NavSubItem.vue').default);
// Vue.component('slide-nav-sub-sub-item', require('./components/slide-nav/NavSubSubItem.vue').default);


const app = new Vue({
    el: '#app',

    data: {
        isMenuActive: false
    }
});
