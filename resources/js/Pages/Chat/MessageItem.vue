<template>
    <div>
        {{ message.user.name }} : {{ message.message }} <br>
        <small>
            {{ message.created_at }} 
        </small> 
        <br>
        <br>
    </div>
</template>
<script>
export default {
    props:['message']
}
</script>
<style>
    
</style>