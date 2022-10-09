<template>
    <div class="relative h-18  m-4">
        <div class="flex">
            <input 
                type="text"
                v-model="message"
                @keyup.enter = "sendMessage()"
                placeholder="Harap isi dengan hal hal positif..."
                class="block p-4 w-full text-gray-900 bg-gray-50 rounded-full border border-gray-300 sm:text-md focus:ring-blue-500 focus:border-blue-500 mr-2"
            />
            <button
                @click="sendMessage()"
                class="text-white w-16 h-full p-5 bg-green-500 hover:bg-green-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm text-center inline-flex place-self-end"
            >
            <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
  
            </button>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    props:['room'],
    data() {
        return {
            message:'',

        }
    },
    methods: {
        sendMessage(){
            if(this.message == ''){
                return
            }
            axios.post('/chat/room/'+this.room.id+'/message',{
                message: this.message
            })
            .then(r =>{
                if (r.status == 201) {
                    this.message = '';
                    this.$emit('InfoMazhe');
                }
            })
            .catch(e=>{
                console.log(e);
            })
        }
    },
}
</script>


<style>
    
</style>