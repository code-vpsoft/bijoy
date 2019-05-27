<script>
    import Cookie from 'js-cookie';

    export default{
        data() {
            return {
                isActive: false
            }
        },

        methods: {
            toggle() {
                this.isActive = ! this.isActive;

                Cookie.set('SidebarIsActive', this.isActive);

                this.update();
            },

            init() {
                this.$parent.$emit('init-sidebar', this.isActive);
            },

            update() {
                this.$parent.$emit('update-sidebar', this.isActive);
            }
        },

        mounted() {
            let $this = this;

            this.$parent.$on('toggle-sidebar', function() {
                $this.toggle();
            });

            this.isActive = Cookie.get('SidebarIsActive') === ('true' || null);

            this.init();
        }
    }
</script>