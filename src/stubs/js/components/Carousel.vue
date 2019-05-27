<template>
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <slot></slot>
        </div>

        <div v-if="pagination" class="swiper-pagination"></div>

        <div v-if="navigation" class="button-next"><i class="icon ion-chevron-right"></i></div>
        <div v-if="navigation" class="button-prev"><i class="icon ion-chevron-left"></i></div>
    </div>
</template>

<script>
    import Swiper from 'swiper';
    import 'swiper/dist/css/swiper.min.css';

    export default {
        props: {
            slideClass: { default: 'slide' },
            direction: { default: 'horizontal' },
            slidePerView: { default: 'auto' },
            pagination: { default: false },
            dynamicBullets: { default: false },
            navigation: { default: false },
            autoplay: { default: false },
            delay: { default: 5000 },
        },

        computed: {
            pagEl() {
                return (this.navigation) ? '.swiper-pagination' :  '';
            },

            navElNext() {
                return (this.navigation) ? '.button-next' :  '';
            },

            navElPrev() {
                return (this.navigation) ? '.button-prev' :  '';
            }
        },

        mounted() {
            let $this = this;

            let mSwiper = new Swiper(this.$el, {
                slideClass: $this.slideClass,
                direction: $this.direction,
                slidesPerView: $this.slidePerView,
                pagination: {
                    el: $this.pagEl,
                    dynamicBullets: $this.dynamicBullets,
                },
                navigation: {
                    nextEl: $this.navElNext,
                    prevEl: $this.navElPrev,
                },

                autoplay: {
                    delay: $this.delay,
                }
            });

            if($this.autoplay) {
                mSwiper.autoplay.start();
            } else {
                mSwiper.autoplay.stop();
            }
        }
    }
</script>

<style>
    .swiper-container-horizontal > .swiper-pagination-bullets {
        bottom: 2rem;
    }

    .swiper-container-vertical > .swiper-pagination-bullets {
        right: 2rem;
    }

    .swiper-container-horizontal .swiper-pagination-bullet {
        width: 2rem;
        height: 4px;
        border-radius: 3px;
        opacity: 0.4;
    }

    .swiper-pagination-bullet-active {
        opacity: 0.8;
        background: #009688;
    }

    .button-next,
    .button-prev {
        position: absolute;
        top: 50%;
        z-index: 1;
        opacity: 0.4;
    }

    .button-next:hover,
    .button-prev:hover {
        opacity: 0.8;
        color: #009688;
    }

    .swiper-button-disabled.button-prev,
    .swiper-button-disabled.button-next {
        opacity: 0.4;
        color: #000;
    }

    .button-prev {
        left: 1.7rem;
    }

    .button-next {
        right: 1.7rem;
    }
</style>
