const state =
{

    bbox: '',

}


const getters =
{


    currentBBOX: state =>
    {
        return state.bbox;
    },

}


const mutations =
{

    updateBBOX: (state, payload) =>
    {
        state.bbox = payload;
    },

}


const actions =
{

    updateBBOXAction: ({commit}, payload) =>
    {
        commit('updateBBOX',payload);
    },


}

export default {
    state,
    getters,
    mutations,
    actions
}