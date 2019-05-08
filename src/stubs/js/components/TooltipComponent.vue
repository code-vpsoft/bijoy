<template>
    <span><slot></slot></span>
</template>

<script>
    import Tooltip from 'tooltip.js';

    export default {
        props: {
            title: { required: true },
            placement: { default: 'top' },
            offset: { default: '0 8' },
            trigger: { default: 'hover' },
            html: { default: false },
            wrapperClass: { default: '' },
            innerClass: { default: ''}
        },

        mounted() {
            new Tooltip(this.$el, {
                title: this.title,
                placement: this.placement,
                offset: this.offset,
                trigger: this.trigger,
                html: this.html,
                template: '<div class="tooltip '+this.wrapperClass+'"><div class="tooltip-arrow"></div><div class="tooltip-inner '+this.innerClass+'"></div></div>'
            })
        }
    }
</script>