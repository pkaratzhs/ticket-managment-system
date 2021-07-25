<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <jet-secondary-button
                    @click="state.showOpenTickets = true"
                    :class="state.showOpenTickets ? 'bg-blue-200 ': 'bg-white'"
                >Open Tickets</jet-secondary-button>
                <jet-secondary-button
                    @click="state.showOpenTickets = false"
                    :class="!state.showOpenTickets ? 'bg-blue-200 ': 'bg-white'"
                >Closed Tickets</jet-secondary-button>
            </h2>
        </template>
        <ticket-list
            v-if="state.showOpenTickets"
            :tickets="state.openTickets"
        ></ticket-list>
        <ticket-list
            v-else-if="!state.showOpenTickets"
            :tickets="state.closedTickets"
        ></ticket-list>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import TicketList from "@/components/TicketList";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";
import { computed, reactive } from "@vue/runtime-core";
export default {
    components: {
        AppLayout,
        TicketList,
        JetSecondaryButton,
    },
    props: {
        tickets: Object,
    },
    setup(props) {
        const state = reactive({
            openTickets: computed(() =>
                props.tickets.data.filter((ticket) => ticket.status === "Open")
            ),
            closedTickets: computed(() =>
                props.tickets.data.filter(
                    (ticket) => ticket.status === "Closed"
                )
            ),
            showOpenTickets: true,
        });
        return { state };
    },
};
</script>
