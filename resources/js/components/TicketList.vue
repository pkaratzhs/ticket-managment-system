<template>
    <div>
        <ticket-card v-for="(ticket,index) in tickets.data"
                    :key="index"> 
            <template #header-left>
                {{ ticket.title }}
            </template>
            <template #header-right> 
                {{ ticket.user.name }}
            </template>
            <template #description>
                {{ ticket.description }}
            </template>
            <template #footer-left>
                 <jet-button>  <inertia-link class="w-full" :href="route('tickets.show',ticket.id)"> View More </inertia-link></jet-button>
            </template>
            <template #footer-right>
                {{ ticket.created_at }}
            </template>
        </ticket-card>
        <pagination class="mt-6 pb-6" :links="tickets.meta.links" />
    </div>
</template>

<script>
import TicketCard from "@/components/TicketCard";
import JetButton from "@/Jetstream/Button";
import Pagination from "@/components/Pagination"
export default {
    components: {
        TicketCard,
        JetButton,
        Pagination
    },
    props: {
        tickets: Object,
    },
    
};
</script>