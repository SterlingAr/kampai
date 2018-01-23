const state =
{
    showBarModal: true,

}

const getters =
{
    currentBarModal: state =>
    {
        return state.showBarModal;
    }

}

const mutations =
{

    updateBarModal: (state,value) =>
    {
        state.showBarModal = value;
    }

}

const actions =
{

    updateBarModalAction: ({commit}) =>
    {
        let value = true;
        commit('updateBarModal', value);
    }

}

export default
{
    state,
    getters,
    mutations,
    actions
}