<template>
    <div class="rounded-md max-w-6xl mx-auto mb-3  bg-coolGray-700  border-gray-900">
    <div class="overflow-hidden shadow-md text-gray-100">
        <!-- card header -->
        <div class="px-6 border-t-2 rounded-md border-gray-800 bg-gray-800 font-bold capitalize flex justify-between">
            <div>
                {{ reply.user }} :
            </div>
            <div>
                {{ reply.created_at }}
            </div>
         
        </div>

        <!-- card body -->
        <div class="px-6 py-2 border-gray-600">
           {{ reply.reply_text }}
        </div>

    </div>
</div>
</template>
<script>
export default {
    props: {
        reply: Object,
    },
};
</script>