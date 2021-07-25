<template>
    <div v-for="reply in replies" :key="reply.id">
        <reply :reply="reply"></reply>
    </div>
</template>
<script>
import Reply from '@/components/Reply'
export default {
    components:{
        Reply
    },
    props:{
        replies:Array
    }
}
</script>