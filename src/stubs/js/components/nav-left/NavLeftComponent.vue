<template>
    <ul class="slide-menu tw-list-reset tw-flex tw-flex-col">
        <slot></slot>
    </ul>
</template>

<script>
    export default {
        data() {
            return { items: [] };
        },

        mounted() {
            this.items = this.$children;
        },

        created() {
            this.$on('select-item', function(selectedItem) {
                this.items.forEach(item => item.isSelected = (item.name === selectedItem.name));
            });
        }
    }
</script>
