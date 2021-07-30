<template>
<!-- dark mode -->
<div class="rounded-md max-w-6xl mx-auto mb-3  bg-coolGray-700  border-gray-900">
    <div class="overflow-hidden shadow-md text-gray-100">
        <!-- card header -->
        <div class="px-6 py-4 border-t-2 rounded-md border-gray-800 bg-gray-800 font-bold capitalize flex justify-between">
            <div>
                <slot name="header-left"></slot>
            </div>
            <div>
                <slot name="header-right"></slot>
            </div>
         
        </div>

        <!-- card body -->
        <div class="p-6 border-b border-gray-600">
           <slot name="description"></slot>
        </div>
        <slot name="images"></slot>
        <!-- card footer -->
        <div class="px-6 py-3 border-gray-200 text-right flex justify-between">
            <!-- button link -->
            <div>
                <slot name="footer-left"></slot>
            </div>
            <div>
                <slot name="footer-right"></slot>
            </div>
        </div>
    </div>
</div>
</template>
<script>
import JetButton from "@/Jetstream/Button";
export default {
    components:{
        JetButton
    }
}
</script>