<template>
    <div>
        <slot></slot>
    </div>
</template>

<script>
    import {throttle} from 'lodash';

    export default {
        props: {
            offsetPlusTop: { default: 0 }
        },

        methods: {
            notifyParent(isPinned) {
                this.$parent.$emit('pin-change', isPinned);
            }
        },

        mounted() {
            let $this = this,
                el = $this.$el,
                originalOffsetTop = el.offsetTop + this.offsetPlusTop;

            window.addEventListener('scroll',
                throttle( function() {
                    if( window.scrollY >= originalOffsetTop ) {
                        el.classList.add('tw-sticky-top');

                        $this.notifyParent(true);
                    } else {
                        el.classList.remove('tw-sticky-top');

                        $this.notifyParent(false);
                    }
                }, 300)
            );
        }
    }
</script>