<template>
    <div class="mx-auto max-w-6xl rounded-md bg-coolGray-700">
        <form @submit.prevent="submit" class="flex justify-center p-2 m-4">
            <input
                type="text"
                name="reply"
                id="reply"
                v-model="form.reply_text"
                placeholder="Reply to ticket"
                class="w-full border-gray-600 border-2 rounded-md"
            >
            <jet-button class="ml-2"> Reply </jet-button>
        </form>
    </div>
</template>
<script>
import JetButton from "@/Jetstream/Button";
import { useForm } from "@inertiajs/inertia-vue3";
export default {
    components: {
        JetButton,
    },
    props: {
        ticket_id: Number,
    },
    setup() {
        const form = useForm({
            reply_text: null,
        });
        return { form };
    },
    methods: {
        submit() {
            this.form.post(`/tickets/${this.ticket_id}/reply`, {
                preserveScroll: true,
                onSuccess: () => this.form.reset("reply_text"),
            });
        },
    },
};
</script>