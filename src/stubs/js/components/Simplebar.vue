<template>
    <div :class="{ 'tw-overflow-x-auto tw-overflow-y-hidden': this.direction === 'x', 'tw-overflow-x-hidden tw-overflow-y-auto': this.direction === 'y', 'tw-overflow-x-auto tw-overflow-y-auto': this.direction === 'xy' }">
        <slot></slot>
    </div>
</template>

<script>
    import SimpleBar from 'simplebar';
    import 'simplebar/dist/simplebar.min.css';

    if(typeof document.createStyleSheet === 'undefined') {
        document.createStyleSheet = (function() {
            function createStyleSheet(href) {
                if(typeof href !== 'undefined') {
                    let element = document.createElement('link');
                    element.type = 'text/css';
                    element.rel = 'stylesheet';
                    element.href = href;
                }
                else {
                    let element = document.createElement('style');
                    element.type = 'text/css';
                }

                document.getElementsByTagName('head')[0].appendChild(element);
                let sheet = document.styleSheets[document.styleSheets.length - 1];

                if(typeof sheet.addRule === 'undefined')
                    sheet.addRule = addRule;

                if(typeof sheet.removeRule === 'undefined')
                    sheet.removeRule = sheet.deleteRule;

                return sheet;
            }

            function addRule(selectorText, cssText, index) {
                if(typeof index === 'undefined')
                    index = this.cssRules.length;

                this.insertRule(selectorText + ' {' + cssText + '}', index);
            }

            return createStyleSheet;
        })();
    }

    export default {
        props: {
            direction: { default: 'y' }, // x | y | xy
            autoHide: { default: 'true' },
            scrollbarMinSize: { default: 10 },
            height: { default: 7 },
            top: { default: 2 }
        },

        mounted() {
            new SimpleBar(this.$el, {
                autoHide: this.autoHide === 'true',
                scrollbarMinSize: this.scrollbarMinSize,
                classNames: {
                    scrollbar: ['simplebar-scrollbar'],
                }
            });

            let sheet = document.createStyleSheet();
            sheet.addRule('.simplebar-track.simplebar-horizontal .simplebar-scrollbar', 'height: '+this.height+'px; top: '+this.top+'px');
        }
    }
</script>