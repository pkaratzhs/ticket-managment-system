<template>
    <div class="flex">
        <img class="image" v-for="(image, i) in images" :src="image" :key="i" @click="index = i">
        <image-gallery :images="images" :index="index" @close="index = null" />
    </div>
</template>
<script>
import ImageGallery from "@/components/ImageGallery"
export default{
    components:{
        ImageGallery
    },
    props:{
        images : Array
    },
    data() {
        return {
            index:null
        }
    },
}
</script>
<style scoped>
.image {
  width: 100px;
  height: 100px;
  background-size: contain;
  cursor: pointer;
  margin: 10px;
  border-radius: 3px;
}
</style>
