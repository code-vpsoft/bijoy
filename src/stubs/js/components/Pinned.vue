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

        mounted() {
            let el = this.$el;
            let originalOffsetTop = el.offsetTop + this.offsetPlusTop;

            window.addEventListener('scroll',
                throttle( function() {
                    el.classList[
                        window.scrollY >= originalOffsetTop ? 'add' : 'remove'
                    ]('tw-sticky-top');
                }, 300)
            );
        }
    }
</script>