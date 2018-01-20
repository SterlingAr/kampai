const state =
{
    keywords: 'all'

}

const getters =
{
    currentKeywords: state =>
    {
        return state.keywords;
    }

}

const mutations =
{

    updateKeywords: (state,payload) =>
    {
        state.keywords = payload;
    }

}

const actions =
{

    updateKeywordsAction: ({commit}, payload) =>
    {
        commit('updateKeywords',payload);
    }

}


export default {
    state,
    getters,
    mutations,
    actions
}