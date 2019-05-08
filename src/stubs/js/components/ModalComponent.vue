<template>
    <div class="tw-modal">

        <div @click="toggle()" class="tw-modal-bg"></div>

        <div class="tw-modal-content sm:tw-w-2/3 md:tw-w-1/2" :class="this.classForModal">
            <div v-if="this.haveHeader" class="tw-modal-header" :class="this.classForHeader">
                <slot name="header"></slot>
            </div>

            <div class="tw-modal-body" :class="this.classForBody">
                <slot></slot>
            </div>

            <div v-if="this.haveFooter" class="tw-modal-footer" :class="this.classForFooter">
                <slot name="footer"></slot>
            </div>
        </div>

        <button v-if="this.isCancelable" @click="toggle()" class="tw-close tw-close-xl tw-mt-6 tw-mr-8" type="button" aria-label="close"></button>

    </div>
</template>

<script>
    export default {
        props: {
            isCancelable: { default: true },
            classForModal: { default: '' },
            classForHeader: { default: '' },
            classForBody: { default: '' },
            classForFooter: { default: '' },
        },

        data() {
            return {
                haveHeader: false,
                haveFooter: false
            }
        },

        methods: {
            toggle() {
                if( !this.isCancelable ) {
                    return;
                }

                this.$emit('toggle');
            }
        },

        mounted() {
            this.haveHeader = typeof this.$slots.header !== 'undefined';
            this.haveFooter = typeof this.$slots.footer !== 'undefined';
        }
    }
</script>