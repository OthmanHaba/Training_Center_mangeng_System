<template>
    <transition name="fade" mode="out-in">
        <div dir="rtl" v-if="show"  class="fixed top-16 right-2 animate-slide-in">
            <div class="bg-green-500 text-white px-4 py-3 rounded-lg shadow-md">
                <div class="flex items-center">
                    <div class="w-6 h-6 mr-4">
                        <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />
                        </svg>
                    </div>
                    <div>
                        <p class="font-bold">{{$page.props.flash.success}}!</p>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
export default {
    data() {
        return {
            show: false,
        };
    },
    methods: {
        showFlashMessage() {
            this.show = true;
            setTimeout(() => {
                this.show = false;
            }, 2000);
        },
    },
    watch: {
        '$page.props.flash': {
            handler() {
                // this.show = true
                this.showFlashMessage()
            },
            deep: true,
        }
    },
    // mounted() {
    //     this.showFlashMessage();
    // },

};
</script>

<style>
.animate-bob-up {
    animation: bobUp 0.8s cubic-bezier(0.68, -0.55, 0.27, 1.55) forwards, fadeOut 0.5s ease-in-out 2s forwards;
}

@keyframes bobUp {
    0% {
        transform: translateY(100%);
        opacity: 0;
    }
    60% {
        transform: translateY(-30%);
        opacity: 1;
    }
    100% {
        transform: translateY(0);
    }
}

@keyframes fadeOut {
    0% {
        opacity: 1;
    }
    100% {
        opacity: 0;
    }
}

.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s;
}

.fade-enter,
.fade-leave-to {
    opacity: 0;
}
</style>

