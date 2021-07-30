<template>
    <div>
        <jet-confirmation-modal :show='modalOpen' @close='modalOpen = false'>
            <template #title>This will Close the ticket</template>
            <template #content> Are you sure? </template>
            <template #footer>
                <jet-danger-button class="mr-2" @click="submit"> Continue</jet-danger-button>
                <jet-secondary-button class="ml-2" @click='modalOpen = !modalOpen'> Cancel </jet-secondary-button>
            </template>
        </jet-confirmation-modal>
        <ticket-card>
            <template #header-left>
                {{ ticket.title }}
            </template>
            <template #header-right>
                <jet-danger-button v-if="ticket.status === 'Open'" @click="modalOpen = !modalOpen">Close</jet-danger-button>
            </template>
            
            <template #description>
                {{ ticket.description }}
            </template>
            <template #images v-if="ticket.images">
                <div class="p-6 border-b border-gray-600">
                    <h1>Images</h1>
                    <images :images="ticket.images"/>
                </div>
            </template>
            <template #footer-left>
                {{ ticket.user.name }}
            </template>
            <template #footer-right>
                {{ ticket.created_at }}
            </template>
        </ticket-card>
    </div>
</template>
<script>
import JetDangerButton from "@/Jetstream/DangerButton";
import JetConfirmationModal from "@/Jetstream/ConfirmationModal";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";
import TicketCard from "@/components/TicketCard"
import Images from "@/components/Images"
export default {
    components: {
        JetDangerButton,
        JetConfirmationModal,
        JetSecondaryButton,
        TicketCard,
        Images
    },
    props: {
        ticket: Object,
    },
    data() {
        return {
            modalOpen: false,
            index:null
        };
    },
    methods: {
        submit() {
            this.$inertia.patch(`/tickets/${this.ticket.id}/close`);
        },
    },
};
</script>