<template>
    <div class="md:col-span-1">
        <div class="px-4 sm:px-0">
            <h3 class="text-lg font-medium text-gray-50">
                <slot name="title"></slot>
            </h3>

            <p class="mt-1 text-sm text-gray-100">
                <slot name="description"></slot>
            </p>
        </div>
    </div>
</template>
