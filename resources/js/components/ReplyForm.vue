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
            <input
                    type="file"
                    @input="form.images = $event.target.files"
                    ref="imageUpload"
                    name="images"
                    class="border-gray-900 focus:border-coolGray-600 bg-blueGray-200 focus:ring focus:ring-coolGray-500 focus:ring-opacity-50 rounded-md shadow-sm p-2 ml-1"
                    multiple
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
    setup(props) {
        const form = useForm({
            reply_text: null,
            images:null
        });
  
        return { 
            form,     
        };
    },
    methods:{
        submit(){
                this.form.post(`/tickets/${this.ticket_id}/reply`, {
                preserveScroll: true,
                onSuccess: () => {
                    this.form.reset("reply_text")
                    this.form.reset("images")
                    this.$refs.imageUpload.value = null
                },
            });  
        }
    }
};
</script>