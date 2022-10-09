<template>
    <div class="grid grid-cols-12">
        <!-- kalau pesan dari kita -->
        <div class="col-end-6 col-start-13">
            <div v-if="( $page.props.user.id == message.user_id )" class="p-6 m-2 w-full bg-fuchsia-800 rounded-bl-3xl rounded-br-3xl rounded-tl-3xl shadow-md flex flex-col">
                <p class="font-bold leading-normal text-slate-100 ">{{ message.user.name }}</p>
                <p class="tracking-wide text-sm text-slate-100 ">{{ message.message }}</p>
                
                <small class="text-slate-100 place-self-end">
                    
                    {{ message.created_at.substring(11, 19) }}, {{ message.created_at.substring(0, 10) }} 
                </small>
            </div>
        </div>
        
        <!-- kalau user lain -->
        <div class="col-start-1 col-end-8 ">

            <div v-if="( $page.props.user.id != message.user_id )" class="p-6 m-2 w-full bg-slate-200 rounded-bl-3xl rounded-br-3xl rounded-tr-3xl shadow-md flex flex-col">
                <p class="font-bold leading-normal text-fuchsia-800 ">{{ message.user.name }}</p>
                <p class="tracking-wide text-sm text-gray-500 ">{{ message.message }}</p>
                
                <small class="text-gray-500 place-self-end">
                    
                    {{ message.created_at.substring(11, 19) }}, {{ message.created_at.substring(0, 10) }} 
                </small>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props:['message']
}
</script>
<style>
    
</style>