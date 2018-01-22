<template>
        <div id="mapid">

        </div>
</template>


<script>

    /**
     *  GLOBAL VARIABLES
     */
    let mapBounds;


    /**
     * VUE TEMPLATE
     */
    export default {
        name: 'osm_map',
        mounted() {
            console.log('*DEBUGGER* : map component created');
            this.initMap();

        },

        data() {
            return {
                mapBounds: '',
                mymap: '',

            }
        },

        methods: {

            initMap: function () {

                this.mymap = L.map("mapid", {
                    center: [43.30932, -1.97711],
                    zoomControl: false,
                    attributionControl: false
                }).setView([ 43.30932,-1.97711], 13);;

                L.tileLayer('https://api.mapbox.com/styles/v1/marborav/cjb7ndf2q3olg2qk50cpyzvy0/tiles/256/{z}/{x}/{y}?access_token={accessToken}', {
                    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
                    maxZoom: 20,
                    id: 'mapbox.Ukiyo-e',
                    accessToken: 'pk.eyJ1IjoibWFyYm9yYXYiLCJhIjoiY2o5eDJrbTV0N2NncjJxcXljeDR3cXNhMiJ9.igTamTLm4nLiAN6w8NFS6Q'
                }).addTo(this.mymap);

//
//                L.control.zoom({
//                    position: "bottomright"
//                }).addTo(this.mymap);

                this.mymap.on('moveend', this.currentBBOX);
                this.currentBBOX();

                L.Routing.control({
                    waypoints: [
                        L.latLng(43.3258095, -1.9726347),
                        L.latLng(43.3280095,-1.9705863)
                    ],
                    router: L.Routing.mapbox('pk.eyJ1IjoibWFyYm9yYXYiLCJhIjoiY2o5eDJrbTV0N2NncjJxcXljeDR3cXNhMiJ9.igTamTLm4nLiAN6w8NFS6Q',{
                        profile: 'mapbox/walking',
                        language: 'es',

                    }),

                }).addTo(this.mymap);


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



            },

            currentBBOX: function () {
                let s, w, n, e;

                mapBounds = this.mymap.getBounds();

                s = mapBounds['_southWest']['lat'];
                w = mapBounds['_southWest']['lng'];
                n = mapBounds['_northEast']['lat'];
                e = mapBounds['_northEast']['lng'];

                let bbox = s + ',' + w + ',' + n + ',' + e;


                this.$store.dispatch('updateBBOXAction', bbox);

            }


        },

        computed: {},



    }



</script>