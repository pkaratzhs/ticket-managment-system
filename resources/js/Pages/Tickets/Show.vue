<template>    
<div>
    <ticket :ticket="ticket.data"></ticket>
    <reply-list :replies="ticket.data.replies"></reply-list>
</div>
<reply-form v-if="ticket.data.status === 'Open'" :ticket_id="ticket.data.id"></reply-form>
    
</template>
<script>
import Ticket from '@/components/Ticket'
import ReplyList from '@/components/ReplyList'
import ReplyForm from '@/components/ReplyForm'
export default {
    components:{
        Ticket,
        ReplyList,
        ReplyForm
    },
    props:{
        ticket:Object
    }
}
</script>