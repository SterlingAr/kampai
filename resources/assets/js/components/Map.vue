<template>
    <div>

        <div id="mapid">

        </div>

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
    export default
    {
        name: 'map',
        mounted(){
            console.log('*DEBUGGER* : map component created');
            this.initMap();

        },

        data () {
            return {
                mapBounds: '',
                mymap: '',

            }
        },

        methods: {

            initMap: function ()
            {
                this.mymap = L.map('mapid').setView([ 43.30932,-1.97711], 13);
                L.tileLayer('https://api.mapbox.com/styles/v1/marborav/cjb7ndf2q3olg2qk50cpyzvy0/tiles/256/{z}/{x}/{y}?access_token={accessToken}', {
                    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
                    maxZoom: 20,
                    id: 'mapbox.Ukiyo-e',
                    accessToken: 'pk.eyJ1IjoibWFyYm9yYXYiLCJhIjoiY2o5eDJrbTV0N2NncjJxcXljeDR3cXNhMiJ9.igTamTLm4nLiAN6w8NFS6Q'
                }).addTo(this.mymap);

                this.mymap.on('moveend', this.currentBBOX);



            },

            currentBBOX: function ()
            {
                let  s, w, n, e;

                mapBounds = this.mymap.getBounds();

                s = mapBounds['_southWest']['lat'];
                w = mapBounds['_southWest']['lng'];
                n = mapBounds['_northEast']['lat'];
                e = mapBounds['_northEast']['lng'];

                this.$parent.bbox = s + ',' + w + ',' + n + ',' + e;


                console.log(this.$parent.bbox );
            }



        },

        computed: {



        },


    }


    /**
     * MAP FUNCTIONS
     */
    // /*MAP section BEGIN*/
    // let bbox,mapBounds;
    // function initmap()
    // {
    //
    // }
    /* To get the bounding box for the query, it should be in this order
       (s,w,n,e)
     */

</script>