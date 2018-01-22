const state =
{
    bars: [
        {
            tags: {
                name: 'Fulencio'
            }
        }
    ],
    test: 'Hellow from bars_storage'
}

const getters =
{
    currentBars: state =>
    {
        return state.bars;
    },

    keywords: (state,getters,rootState) =>
    {
        return rootState.keywords;
    }

}

const mutations =
{

    updateBars: (state,payload) =>
    {
        state.bars = payload;
    }

}

const actions =
{

    updateBarsAction: ({state,commit,rootState}) =>
    {
        console.log(state.test);
        console.log(rootState.test);

        let api_base_uri = rootState.api_base_uri;
        let keywords = rootState.app_storage.keywords;
        let bbox = rootState.map_storage.bbox;

        // let bars = bars_resource(api_base_uri,keywords,bbox);

        axios.get(api_base_uri+'/api/bars/' + keywords + "/" + bbox)
            .then((response) =>
            {
                console.log(response);
                console.log(api_base_uri+'/api/bars/' + keywords + "/" + bbox);
                // bars = response.data.data.elements;
                let bars = [];

                bars = response.data.elements;

                console.log(bars);
                commit('updateBars', bars);


            }).catch((error) =>

            {
                console.log(error);
            });



    }

}

/**
 * Retrieve new bars using global parameters.
 */
function bars_resource (api_base_uri,keywords,bbox)
{

    console.log("bars_resource, api_base_uri = " + api_base_uri );
    console.log("bars_resource, keywords = " + keywords );
    console.log("bars_resource, bbox = " + bbox );

    let bars = [];

    axios.get(api_base_uri+'/api/bars/' + keywords + "/" + bbox)
    .then((response) =>
    {
        // console.log(response);

        console.log(api_base_uri+'/api/bars/' + keywords + "/" + bbox);
        bars = response.data.data.elements;
    }).catch((error) =>
    {
        console.log(error);
    });

    console.log(bars);
    return bars;

}

export default {

    state,
    getters,
    mutations,
    actions

}