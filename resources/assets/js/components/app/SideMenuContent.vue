<template>
<div>
    <router-view></router-view>
    <router-view name="login"></router-view>
    <router-view name="register"></router-view>
    <router-view name="profile_view"></router-view>

</div>
</template>


<script>

    export default {

        mounted(){
            console.log('*DEBUGGER* : SideMenuContent component created');
        },

        name: 'side_menu_content',

    }

</script>