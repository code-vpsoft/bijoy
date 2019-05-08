<template>
    <div class="tw-field">

        <label v-if="label" class="tw-label" :for="name">{{ label }}</label>

        <div class="tw-control">
            <div class="tw-file tw-border" :class="classForFile">
                <input :id="name" :name="name" type="file" ref="file" :multiple="isMultiple" @click="reset"  @change="onChange">

                <div class="tw-file-meta">
                    <i class="icon ion-upload"></i>
                    <span class="tw-file-label">{{ placeholder }}</span>
                    <p class="tw-file-name" :class="(files.length < 1) ? 'tw-bg-transparent' : 'tw-bg-white'">
                        {{ displayName }}
                        <span v-if="exceedCount > 0">&nbsp;&nbsp;+{{ exceedCount }} files</span>
                    </p>
                </div>
            </div>
        </div>

        <p v-if="error" class="tw-help">{{ error }}</p>

        <div v-if="files.length > 0" class="tw-flex tw-flex-wrap tw--m-1">
            <div v-for="(file, index) in files" class="tw-relative tw-w-32 tw-m-1">
                <img class="tw-inline-block tw-w-full tw-p-px tw-border tw-break-words" :src="createObjectUrl(file)" :alt="file.name">

                <button @click="remove(index)" type="button" class="tw-close tw-close-md tw-text-red tw-m-1"></button>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        props: {
            name: { required: true },
            label: { default: '' },
            placeholder: { default: 'Choose a file' },
            isMultiple: { default: false },
            classForFile: { default: '' },
            maxFileName: { default: 2 },
            error: { default: '' },
        },

        data() {
            return {
                files: []
            }
        },

        computed: {
            displayName: function() {
                let name = '';

                for(let i = 0; i < this.files.length && i < this.maxFileName; i++) {
                    let file = this.files[i];

                    if(i === 0) {
                        name += file.name;
                    } else {
                        name += ', ' + file.name;
                    }
                }

                if(name.length > 30) {
                    name = name.substr(0, 30) + '...';
                }
                return name;
            },

            exceedCount: function() {
                return this.files.length - this.maxFileName;
            }
        },

        methods: {
            onChange() {
                if(this.$refs.file.files.length > 0) {
                    this.files = this.$refs.file.files;
                } else {
                    this.files = [];
                }
            },

            createObjectUrl(file) {
                let URL = window.URL || window.webkitURL;

                return URL.createObjectURL(file);
            },

            remove(index) {
                const dt = new DataTransfer();

                for(let i = 0; i < this.files.length; i++) {
                    if(i !== parseInt(index)) {
                        dt.items.add(this.files[i]);
                    }
                }

                this.$refs.file.files = dt.files;

                if ("createEvent" in document) {
                    let evt = document.createEvent("HTMLEvents");
                    evt.initEvent("change", false, true);
                    this.$refs.file.dispatchEvent(evt);
                } else {
                    this.$refs.file.fireEvent("onchange");
                }
            },

            reset() {
                this.files = [];
            }
        }
    }
</script>