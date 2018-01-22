<template>
        <div id="mapid">

        </div>
</template>


<script>

     import {mapGetters} from 'vuex';
     import {mapActions} from 'vuex';

    /**
     * VUE TEMPLATE
     */
    export default {
        name: 'osm_map',
        mounted() {
            this.initMap();
        },

        data() {
            return {


            }
        },

        methods: {
            ...mapActions({
              initMap:  'initMapAction'
            })

//                L.control.zoom({
//                    position: "bottomright"
//                }).addTo(this.mymap);

                // this.mymap.on('moveend', this.currentBBOX);
                // this.currentBBOX();
                //
                // L.Routing.control({
                //     waypoints: [
                //         L.latLng(43.3258095, -1.9726347),
                //         L.latLng(43.3280095,-1.9705863)
                //     ],
                //     router: L.Routing.mapbox('pk.eyJ1IjoibWFyYm9yYXYiLCJhIjoiY2o5eDJrbTV0N2NncjJxcXljeDR3cXNhMiJ9.igTamTLm4nLiAN6w8NFS6Q',{
                //         profile: 'mapbox/walking',
                //         language: 'es',
                //
                //     }),
                //
                // }).addTo(this.mymap);


//                L.control.locate({
//                    position: "bottomright",
//                    drawCircle: true,
//                    follow: true,
//                    setView: true,
//                    keepCurrentZoomLevel: true,
//                    markerStyle: {
//                        weight: 1,
//                        opacity: 0.8,
//                        fillOpacity: 0.8
//                    },
//                    circleStyle: {
//                        weight: 1,
//                        clickable: false
//                    },
//                    icon: "fa fa-location-arrow",
//                    metric: false,
//                    strings: {
//                        title: "My location",
//                        popup: "You are within {distance} {unit} from this point",
//                        outsideMapBoundsMsg: "You seem located outside the boundaries of the map"
//                    },
//                    locateOptions: {
//                        maxZoom: 18,
//                        watch: true,
//                        enableHighAccuracy: true,
//                        maximumAge: 10000,
//                        timeout: 10000
//                    }
//                }).addTo(this.mymap);




            // currentBBOX: function ()
            // {
            //
            // }


        },


        computed:
        {

            ...mapGetters(
                {

                        map: 'currentMap',

                })
        },

    }



</script>