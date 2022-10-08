<template>
    <div class="relative h-10  m-1">
        <div style="border-top: 1px solid #e6e6e6" class="grid grid-cols-6">
            <input 
                type="text"
                v-model="message"
                @keyup.enter = "sendMessage()"
                placeholder="Harap isi dengan hal hal positif..."
                class="col-span-5 outline-none p-1"
            />
            <button
                @click="sendMessage()"
                class="place-self-end bg-gray-600 hover:bg-gray-800 p-1 mt-1 rounded text-white"
            >
                Kirim
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