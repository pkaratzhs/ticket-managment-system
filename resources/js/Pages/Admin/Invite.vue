<template>
    <app-layout>
        <form @submit.prevent="submit" class="flex justify-center max-w-lg p-2 m-4 mx-auto rounded-md bg-coolGray-700">
            <input 
                type="email" 
                name="email" 
                id="email"
                v-model="form.email"
                placeholder="Invite a customer"
                class="w-full border-gray-600 border-2 rounded-md"
            >
            <jet-button class="ml-2"> Invite </jet-button>
        </form>
            <div v-if="$attrs.jetstream.flash.message" 
                class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline"> {{ $attrs.jetstream.flash.message }} </span>
            </div>
    </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout";
import JetButton from "@/Jetstream/Button";
import { useForm } from "@inertiajs/inertia-vue3";
export default {
    components: {
        AppLayout,
        JetButton,
    },
    setup() {
        const form = useForm({
            email: null,
        });
        return { form };
    },
    methods: {
        submit() {
            this.form.post("/invite", {
                onSuccess: () => this.form.reset(),
            });
        },
    },
};
</script>