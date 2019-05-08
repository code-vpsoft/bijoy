<template>
    <li class="tw-flex">
        <a :href="this.href" @click="selectItem" class="tw-w-full tw-px-3 tw-py-1 md:tw-py-2 tw-text-md tw-no-underline tw-text-grey tw-cursor-pointer hover:tw-text-white" :class="{ 'tw-text-white' : this.isSelected }">{{ this.name }}</a>
    </li>
</template>

<script>
    export default {
        data() {
            return {
                isSelected: false
            }
        },

        props: {
            href: { required: true },
            name: { required: true },
            isActive: { default: false },
        },

        mounted() {
            this.isSelected = this.isActive;
        },

        methods: {
            selectItem() {
                if(this.isSelected) {
                    this.isSelected = ! this.isSelected;

                    return;
                }

                this.$parent.$emit('select-item', this);
            }
        }
    }
</script>
