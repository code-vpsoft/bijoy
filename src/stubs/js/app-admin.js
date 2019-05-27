
require('./bootstrap');

window.Vue = require('vue');

import Cookie from 'js-cookie';

import vClickOutside from 'v-click-outside';
Vue.use(vClickOutside);

Vue.component('tooltip', require('./components/Tooltip.vue').default);
// Vue.component('modal', require('./components/Modal.vue').default);
// Vue.component('input-file', require('./components/inputs/File.vue').default);
Vue.component('pinned', require('./components/Pinned.vue').default);
Vue.component('simplebar', require('./components/Simplebar.vue').default);
Vue.component('dropdown', require('./components/Dropdown.vue').default);
// Vue.component('carousel', require('./components/Carousel.vue').default);

Vue.component('sidebar', require('./components/Sidebar.vue').default);

Vue.component('slide-nav', require('./components/slide-nav/Nav.vue').default);
Vue.component('slide-nav-item', require('./components/slide-nav/NavItem.vue').default);
Vue.component('slide-nav-sub-item', require('./components/slide-nav/NavSubItem.vue').default);
Vue.component('slide-nav-sub-sub-item', require('./components/slide-nav/NavSubSubItem.vue').default);

const app = new Vue({
    el: '#app',

    data: {
        isLoading: false,

        Sidebar: { isActive: false }
    },

    methods: {
        toggleSidebar() {
            this.$emit('toggle-sidebar');
        },

        updatePinnedHeader() {
            let pinnedHeader = this.$refs.pinnedHeader.$el,
                isSticky = pinnedHeader.classList.contains('tw-sticky-top');

            if(this.Sidebar.isActive && isSticky) {
                pinnedHeader.classList.add('md:tw-pr-sidebar-w');
            } else {
                pinnedHeader.classList.remove('md:tw-pr-sidebar-w');
            }
        },

        refreshPage(url) {
            window.location = url;
        }
    },

    created() {
        let $this = this;

        this.$on('init-sidebar', function(isActive) {
            $this.Sidebar.isActive = isActive;
        });
    },

    mounted() {
        let $this = this;

        this.$on('update-sidebar', function(isActive) {
            $this.Sidebar.isActive = isActive;

            $this.updatePinnedHeader();
        });

        this.$on('pin-change', function(isPinned) {
            $this.updatePinnedHeader();
        });

        $this.updatePinnedHeader();
    }
});
