<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Lets Connect
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <MessageContainer :messages="messages"/>
                    <MessageInput :room="currentRoom" v-on:InfoMazhe="getMessages()"/>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import axios from 'axios';
import MessageContainer from './MessageContainer.vue';
import MessageInput from './MessageInput.vue';

export default {
    components:{
        AppLayout,MessageContainer,MessageInput,
    },
    data() {
        return {
            chatRoom:[],
            currentRoom:[],
            messages:[],
        }
    },
    watch:{
        currentRoom(){
            this.connect;
        }
    },
    methods:{
        connect(){
            if (this.currentRoom.id) {
                let vm =this;
                this.getMessages();
                window.Echo.privite('chat.'+this.currentRoom.id).listen('.message.new',e=>{
                    vm.getMessages();
                });
            }
        },
        getRooms(){
            axios
                .get('/chat/rooms').then( r => {
                    console.log(r); 
                    this.chatRoom = r.data; 
                    this.setRoom(r.data[0]);})
                .catch(e=>{console.log(e)});
        },
        setRoom(room){
            this.currentRoom = room;
            this.getMessages();
        },
        getMessages(){
            axios.get('/chat/room/'+this.currentRoom.id +'/messages').then(r =>{
                this.messages = r.data;
                console.log(r);
            }).catch(e=>{
                console.log(e);
            });
        },
    },
    created() {
        this.getRooms();
    },
}
</script>