<template>
    <app-layout>
        <div class="bg-coolGray-700 rounded-md w-full">
            <jet-validation-errors class="ml-6 pt-4" />
            <form
                @submit.prevent="submit"
                class="flex justify-between p-2 m-4 flex-col h-auto"
                enctype="multipart/form-data"
            >
                <label for="title" class="text-gray-100">Title</label>
                <input
                    v-model="form.title"
                    type="text"
                    name="title"
                    placeholder="Title"
                    class="border-gray-900 focus:border-coolGray-600 bg-blueGray-200 focus:ring focus:ring-coolGray-500 focus:ring-opacity-50 rounded-md shadow-sm m-2 p-2"
                >

                <label for="description" class="text-gray-100">Description</label>
                <textarea
                    v-model="form.description"
                    type="textarea"
                    rows="6"
                    name="description"
                    placeholder="Describe your problem"
                    class="border-gray-900 focus:border-coolGray-600 bg-blueGray-200 focus:ring focus:ring-coolGray-500 focus:ring-opacity-50 rounded-md shadow-sm m-2 p-2"
                />
                <label for="images" class="text-gray-100">Images</label>
                <input
                    type="file"
                    @input="form.images = $event.target.files"
                    name="images"
                    class="border-gray-900 focus:border-coolGray-600 bg-blueGray-200 focus:ring focus:ring-coolGray-500 focus:ring-opacity-50 rounded-md shadow-sm m-2 p-2"
                    multiple
                >
                <div class="flex justify-between">
                    <jet-button class="ml-2 w-max"> Submit </jet-button>
                    <label for="severity" class="text-gray-100">Severity Level:
                        <select v-model="form.severity" name="severity" class="border-gray-600 border-2 rounded-md text-gray-900">
                            <option value="Low">Low</option>
                            <option value="Medium">Medium</option>
                            <option value="High">High</option>
                            <option value="Urgent">Urgent</option>
                        </select>
                    </label>
                </div>
            </form>
        </div>
    </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout";
import JetButton from "@/Jetstream/Button";
import JetValidationErrors from "@/Jetstream/ValidationErrors";
import { useForm } from "@inertiajs/inertia-vue3";
export default {
    components: {
        JetButton,
        AppLayout,
        JetValidationErrors,
    },
    setup() {
        const form = useForm({
            title: null,
            description: null,
            images:null,
            severity: "Low",
        });

        function submit(){
            this.form.post("/tickets")
        }
        return{
            form,
            submit
        }
    },
  
};
</script>

