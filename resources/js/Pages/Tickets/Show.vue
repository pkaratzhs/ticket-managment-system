<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-100 leading-tight">
                Ticket Viewer
            </h2>
        </template>
        <div>
           <ticket :ticket="ticket.data"></ticket>
           <reply-list :replies="ticket.data.replies"></reply-list>
        </div>
        <reply-form v-if="ticket.data.status === 'Open'" :ticket_id="ticket.data.id"></reply-form>
    </app-layout>
</template>
<script>
import AppLayout from '@/Layouts/AppLayout'
import Ticket from '@/components/Ticket'
import ReplyList from '@/components/ReplyList'
import ReplyForm from '@/components/ReplyForm'
export default {
    components:{
        AppLayout,
        Ticket,
        ReplyList,
        ReplyForm
    },
    props:{
        ticket:Object
    }
}
</script>