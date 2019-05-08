<template>
    <div v-click-outside="dismiss">
        <div @click="isVisible = ! isVisible" class="tw-relative">
            <slot name="btn-dropdown"></slot>
        </div>

        <slot v-if="isVisible"></slot>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                isVisible: false
            }
        },

        methods: {
            dismiss() {
                this.isVisible = false;
            }
        }
    }
</script>