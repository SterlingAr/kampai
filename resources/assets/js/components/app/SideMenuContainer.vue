<template>
    <div class="side-menu-container">
        <ul class="nav navbar-nav">
            <li>
                <side-menu-content></side-menu-content>
            </li>
        </ul>
    </div><!-- /.navbar-collapse -->
</template>


<script>

    import SideMenuContent from "./SideMenuContent.vue";

    export default {

        mounted(){
            console.log('*DEBUGGER* : SideMenuContainer component created');
        },

        components: {SideMenuContent},
        name: 'side_menu_container',

    }

</script>