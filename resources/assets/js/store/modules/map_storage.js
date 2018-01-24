const state =
{
    MAP_API_PROVIDER: 'https://api.mapbox.com/styles/v1/marborav/cjb7ndf2q3olg2qk50cpyzvy0/tiles/256/{z}/{x}/{y}?access_token=',
    API_TOKEN: 'pk.eyJ1IjoibWFyYm9yYXYiLCJhIjoiY2o5eDJrbTV0N2NncjJxcXljeDR3cXNhMiJ9.igTamTLm4nLiAN6w8NFS6Q',
    MAP_STYLE: 'streets',
    bbox: '',
    map: '',
    featureCollection: '',
    featureLayer: '',
    barIcon: 'https://imgur.com/a/ppfBY',
}


const getters =
{


    currentBBOX: state =>
    {
        return state.bbox;
    },


    currentMap: state =>
    {
        return state.map;
    },

    currentFeatures: state =>
    {
        return state.featureCollection;
    },

    currentFeatureLayer: state =>
    {
        return state.featureLayer;
    }

}


const mutations =
{

    updateBBOX: (state, payload) =>
    {
        state.bbox = payload;
    },


    updateMap: (state,payload) =>
    {
        state.map = payload;
    },

    updateFeatureCollection: (state,payload) =>
    {
        state.featureCollection = payload;
    },

    updateFeatureLayer: (state, payload) =>
    {
        state.featureLayer = payload;
    }

}


const actions =
{
    //on call, update bbox state value .
    updateBBOXAction: ({commit}) =>
    {
        let s, w, n, e, mapBounds;
        mapBounds = state.map.getBounds();

        s = mapBounds['_southWest']['lat'];
        w = mapBounds['_southWest']['lng'];
        n = mapBounds['_northEast']['lat'];
        e = mapBounds['_northEast']['lng'];

        let bbox = s + ',' + w + ',' + n + ',' + e;
        commit('updateBBOX', bbox);
    },

    updateMapAction: ({commit}, payload) =>
    {
        commit('updateMap', payload);
    },

    /**
     * starts the map, all initial values should be handled with this function
     * @param commit
     * @param dispatch
     */
    initMapAction: ({commit,dispatch}) =>
    {

        let mapOptions =
        {
            attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
            maxZoom: 20,
            id: state.MAP_STYLE,
            accessToken: state.API_TOKEN,
        };

        let map = L.map("mapid", {
            center: [43.3213337, -1.976819],
        }).setView([ 43.3213337,-1.976819], 16);


        L.tileLayer(state.MAP_API_PROVIDER + '{accessToken}',mapOptions)
            .addTo(map);

        let dinnerIcon = L.icon({
            iconUrl: 'https://i.imgur.com/DujcmnC.png',
            iconSize: [32, 37],
            iconAnchor: [16, 37],
            // popupAnchor: [0, -28]
        });

        let pubIcon = L.icon({
            iconUrl: 'https://imgur.com/a/ppfBY',
            iconSize: [32, 37],
            iconAnchor: [16, 37],
            // popupAnchor: [0, -28]
        });


       let featureLayer =  L.geoJSON(false, {

            pointToLayer: function (feature, latlng) {
                if(feature.amenity == 'bar')
                {
                    return L.marker(latlng, {icon: pubIcon});
                }
                if(feature.amenity = 'restaurant')
                {
                    return L.marker(latlng, {icon: dinnerIcon});

                }


            },

           onEachFeature: onEachFeature


        }).addTo(map);

        commit('updateFeatureLayer', featureLayer);

        commit('updateMap', map);

    },

    /**
     * receives an array of node objects, commits a FeatureCollection  holding all nodes
     * @param commit
     * @param dispatch
     * @param bars
     */
    addFeaturesAction: ({commit,dispatch}, bars) =>
    {

        let featuresArray = [];
        let featureCollection = new Object();

        bars.forEach(function (element)
        {
            let feature = new Object();
            let featureProperties = new Object();
            let featureGeometry = new Object();
            featureProperties.popupContent =  "Establecimiento";

            featureGeometry.type = "Point";
            let nodeCoord = [element.lon,element.lat];
            featureGeometry.coordinates = nodeCoord;

            feature.type = "Feature";
            feature.properties = featureProperties;
            feature.geometry = featureGeometry;
            feature.amenity = element.tags.amenity;
            featuresArray.push(feature);

        });

        featureCollection.type = "FeatureCollection";
        featureCollection.features = featuresArray;

        commit('updateFeatureCollection',featureCollection);


        dispatch('addFeaturesToLayer',featureCollection);

    },

    addFeaturesToLayer: ({commit}, featureCollection) =>
    {


            let layer = state.featureLayer;

            layer.addData(featureCollection);

            commit('updateFeatureLayer', layer);

    },

    // onEachFeature : (feature, layer) =>
    // {
    //     let popupContent = "<p>I started out as a GeoJSON " +
    //         feature.geometry.type + ", but now I'm a Leaflet vector!</p>";
    //
    //     if (feature.properties && feature.properties.popupContent) {
    //         popupContent += feature.properties.popupContent;
    //     }
    //
    //     layer.bindPopup(popupContent);
    // }


}

export default {
    state,
    getters,
    mutations,
    actions
}


function onEachFeature(feature, layer)
{
    let popupContent = "<p>I started out as a GeoJSON " +
        feature.geometry.type + ", but now I'm a Leaflet vector!</p>";

    if (feature.properties && feature.properties.popupContent) {
        popupContent += feature.properties.popupContent;
    }

    layer.bindPopup(popupContent);
}