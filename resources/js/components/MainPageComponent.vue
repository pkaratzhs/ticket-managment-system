<template>
    <app-layout>
    <div class="flex justify-between ">
        <div class="font-semibold text-xl text-gray-800 leading-tight mb-5 flex w-24">
            <div class="mx-2">
                <label for="status" class="text-base ml-1 text-gray-100 mb-1">Status </label>
                <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                <select v-model="form.ticketStatus" class="border border-gray-300 rounded-full w-28 text-gray-600 h-10 pl-5 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                    <option value="open">Open</option>
                    <option value="closed">Closed</option>
                </select>
            </div>
            <div class="mx-2">
                <label for="status" class="text-base ml-1 text-gray-100 mb-1">Severity </label>
                <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                <select v-model="form.severity" class="border border-gray-300 rounded-full w-28 text-gray-600 h-10 pl-5 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                    <option value="">All</option>
                    <option value="Low">Low</option>
                    <option value="Medium">Medium</option>
                    <option value="High">High</option>
                    <option value="Urgent">Urgent</option>
                </select>
            </div>
        </div>
        <div class="font-semibold text-xl text-gray-800 leading-tight  mt-5 mr-1">
            <input class="w-full rounded-r focus:ring" autocomplete="off" type="text" name="search" placeholder="Search…" @reset="reset" v-model="form.search"/>
        </div>
    </div>
        <ticket-list :tickets = "tickets" />
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import TicketList from "@/components/TicketList";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";
import { reactive } from "@vue/runtime-core";
import { Inertia } from '@inertiajs/inertia'
import pickBy from 'lodash/pickBy'
import debounce from 'lodash/debounce'
export default {
    components: {
        AppLayout,
        TicketList,
        JetSecondaryButton,
    },
    props: {
        tickets: Object,
        filters:{
            ticketStatus: String,
            search: String,
            severity: String
        },
        whichRoute: String
    },
    setup(props) {
        const form = reactive({
            ticketStatus: props.ticketStatus ?? 'open',
            search: props.search ?? '',
            severity: props.severity ?? ''
        });
    
        return {
            form,
        }
    },
     watch: {
        form: {
        deep: true,
        handler: debounce(function() {
            Inertia.get(this.route(this.whichRoute), pickBy(this.form), { preserveState: true })
        }, 250),
    },
  }, 
};
</script>
