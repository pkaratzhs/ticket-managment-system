<template>
    <main-page-component :tickets="tickets" v-bind="filters" :whichRoute="'dashboard'"></main-page-component>
</template>

<script>
import MainPageComponent from '@/components/MainPageComponent'
export default {
    components:{
        MainPageComponent
    },
    props: {
        tickets: Object,
        filters:{
            ticketStatus: String,
            search: String,
            severity: String
        }
    }
}
</script>