const state =
{
    MAP_API_PROVIDER: 'https://api.mapbox.com/styles/v1/marborav/cjb7ndf2q3olg2qk50cpyzvy0/tiles/256/{z}/{x}/{y}?access_token=',
    API_TOKEN: 'pk.eyJ1IjoibWFyYm9yYXYiLCJhIjoiY2o5eDJrbTV0N2NncjJxcXljeDR3cXNhMiJ9.igTamTLm4nLiAN6w8NFS6Q',
    MAP_STYLE: 'mapbox.streets',
    bbox: '',
    map: '',

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

    //starts the map, all initial values should be handled with this function
    initMapAction: ({commit}) =>
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


        commit('updateMap', map);

    }




}

export default {
    state,
    getters,
    mutations,
    actions
}