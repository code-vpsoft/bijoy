<template>
    <li class="tw-flex tw-flex-col tw-ml-6 md:tw-ml-12">

        <a :href="this.href" @click="selectItem" class="tw-w-full tw-px-3 tw-py-1 md:tw-py-2 tw-text-md tw-no-underline tw-text-grey tw-cursor-pointer hover:tw-text-white" :class="{ 'tw-text-white' : this.isSelected }">{{ this.name }}</a>

        <ul v-if="! this.href" v-show="this.isSelected" class="tw-list-reset tw-flex tw-flex-col tw-ml-3 tw-border-l tw-border-primary tw--mt-0 md:tw--mt-1 tw-mb-1 md:tw-mb-0">
            <slot></slot>
        </ul>

    </li>
</template>

<script>
    export default {
        props: {
            href: { default: false },
            name: { required: true },
            isActive: { default: false },
        },

        data() {
            return {
                items: [],
                isSelected: false
            };
        },

        mounted() {
            this.items = this.$children;
            this.isSelected = this.isActive;
        },

        created() {
            this.$on('select-item', function(selectedItem) {
                this.items.forEach(item => item.isSelected = (item.name === selectedItem.name));
            });
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
