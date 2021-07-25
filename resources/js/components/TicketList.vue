<template>
    <div>
        <ticket-card v-for="(ticket,index) in tickets"
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
    </div>
</template>

<script>
import TicketCard from "@/components/TicketCard";
import JetButton from "@/Jetstream/Button";
export default {
    components: {
        TicketCard,
        JetButton
    },
    props: {
        tickets: Array,
    },
    
};
</script>