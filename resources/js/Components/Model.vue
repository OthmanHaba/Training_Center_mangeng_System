<template>
    <transition name="modal">
        <div class="modal-mask" @click="closeModal">
            <div class="modal-container">
                <div class="modal-content">
                    <!-- Your form content goes here -->
                    <form @submit.prevent="submitForm">
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700">Name:</label>
                            <input v-model="formData.name" type="text" id="name" class="form-input mt-1 block w-full" />
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700">Email:</label>
                            <input v-model="formData.email" type="email" id="email" class="form-input mt-1 block w-full" />
                        </div>
                        <div class="mb-4">
                            <label for="password" class="block text-gray-700">Password:</label>
                            <input v-model="formData.password" type="password" id="password" class="form-input mt-1 block w-full" />
                        </div>
                        <div class="mb-4">
                            <label for="age" class="block text-gray-700">Age:</label>
                            <input v-model="formData.age" type="number" id="age" class="form-input mt-1 block w-full" />
                        </div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
export default {
    data() {
        return {
            formData: {
                name: '',
                email: '',
                password: '',
                age: null,
            },
        };
    },
    methods: {
        closeModal() {
            this.$emit('close');
        },
        submitForm() {
            // Handle form submission logic here
            // For example, you can emit an event to the parent component
            this.$emit('submit', this.formData);
            this.closeModal();
        },
    },
};
</script>

<style scoped>
/* Add your custom styles here */
.modal-mask {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
}

.modal-container {
    width: 80%;
    max-width: 400px;
}

.modal-content {
    background-color: #fff;
    padding: 2rem;
    border-radius: 8px;
}

/* Transition Animation */
.modal-enter-active, .modal-leave-active {
    transition: opacity 0.5s;
}
.modal-enter, .modal-leave-to {
    opacity: 0;
}
</style>
