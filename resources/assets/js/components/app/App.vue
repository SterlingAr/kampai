<template>
<div>
        <side-menu></side-menu>
        <osm-map></osm-map>
</div>
</template>


<script>


    import SideMenu from './SideMenu.vue';
    import OsmMap from '../osm/OsmMap.vue';


    export default
    {
        name: 'app',
        mounted(){
            console.log('*DEBUGGER* : App component created');
        },

        data () {
            return {
                test : "Test Message",
                bbox:   "",
                // keywords: 'Test'

            }
        },

        components: {SideMenu,OsmMap}



    }


</script>