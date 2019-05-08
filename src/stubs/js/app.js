
require('./bootstrap');

window.Vue = require('vue');

// Vue.component('tooltip', require('./components/TooltipComponent.vue').default);
// Vue.component('modal', require('./components/ModalComponent.vue').default);
// Vue.component('input-file', require('./components/inputs/FileComponent.vue').default);
// Vue.component('pinned', require('./components/Pinned.vue').default);

// Vue.component('simplebar', require('./components/Simplebar.vue').default);
// Vue.component('dropdown', require('./components/DropdownComponent.vue').default);
// Vue.component('nav-left', require('./components/nav-left/NavLeftComponent.vue').default);
// Vue.component('nav-left-item', require('./components/nav-left/NavLeftItemComponent.vue').default);
// Vue.component('nav-left-sub-item', require('./components/nav-left/NavLeftSubItemComponent.vue').default);
// Vue.component('nav-left-sub-sub-item', require('./components/nav-left/NavLeftSubSubItemComponent.vue').default);

const app = new Vue({
    el: '#app'
});
