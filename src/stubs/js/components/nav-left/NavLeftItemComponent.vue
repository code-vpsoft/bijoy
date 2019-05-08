<template>
    <li class="tw-flex tw-flex-col hover:tw-bg-grey-darkest" :class="{ 'tw-bg-grey-darkest': this.isSelected }">

        <a :href="this.href" @click="select" class="tw-flex tw-items-center tw-w-full tw-text-grey tw-text-xl md:tw-text-2xl tw-no-underline tw-px-3 md:tw-px-6 tw-py-1 md:tw-py-3 tw-cursor-pointer hover:tw-text-white" :class="{ 'tw-text-white' : this.isSelected }">
            <i class="tw-mr-3 md:tw-mr-6 tw-w-3" v-bind:class="this.icon"></i>
            <span class="tw-flex-auto">{{ this.name }}</span>
            <i v-if="! this.href" class="icon tw-text-xs" :class="{ 'ion-chevron-down' : !this.isSelected, 'ion-chevron-up' : this.isSelected }"></i>
        </a>

        <ul v-if="! this.href" v-show="this.isSelected" class="tw-list-reset tw-flex tw-flex-col tw--mt-1 md:tw--mt-2 tw-mb-1">
            <slot></slot>
        </ul>

    </li>
</template>

<script>
    export default {
        props: {
            href: { default: false },
            name: { required: true },
            icon: { default: 'icon ion-arrow-graph-up-right' },
            isActive: { default: false }
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
            select() {
                if(this.isSelected) {
                    this.isSelected = ! this.isSelected;

                    return;
                }

                this.$parent.$emit('select-item', this);
            }
        }
    }
</script>
