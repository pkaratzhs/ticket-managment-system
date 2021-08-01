<template>
  <div v-if="links.length > 3">
    <div class="flex flex-wrap -mb-1 justify-center">
      <template v-for="(link, k) in links" :key="k">
        <div v-if="link.url === null"  class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-200 border rounded" v-html="link.label" />
        <inertia-link v-else class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded text-gray-200 hover:bg-blueGray-600 focus:border-indigo-500 focus:text-indigo-500" :class="{ 'bg-blueGray-700 text-white': link.active }" :href="link.url"><span v-html="link.label"></span></inertia-link>
      </template>
    </div>
  </div>
</template>
  
<script>

export default {
  props: {
    links: Array
  },

}
</script> 