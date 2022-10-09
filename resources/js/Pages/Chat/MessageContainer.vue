<template>
    <div class="h-80 w-full">
        <div class="h-full px-5 py-2 flex flex-col-reverse overflow-scroll">
            <div v-for="(message, index) in messages" :key="index">
                <MessageItem :message="message"/>
            </div>
        </div>
    </div>
</template>
<script>
import MessageItem from './MessageItem.vue';
export default {
    props: ["messages"],
    components: { MessageItem }
}
</script>
<style>
    
</style>