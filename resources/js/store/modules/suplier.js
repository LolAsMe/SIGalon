import axios from 'axios'
import store from '~/store'

// state
export const state = {

  supliers: [],
}

// getters
export const getters = {
  supliers: state => state.supliers,
}

// mutations
export const mutations = {
  setSuplier: (state, supliers) => (state.supliers = supliers),
  editDistributor(state, nDistributor) {
    const oldDistributor = state.supliers.find(suplier => suplier.id === nDistributor.id);
    if (oldDistributor) {
      // not creating a new object but modifying old object here
      Object.assign(oldDistributor, nDistributor)
    }
  },
  addDistributor: (state, suplier) => state.supliers.push(suplier),
  deleteDistributor: (state, id) => state.supliers = state.supliers.filter(supliers => supliers.id !== id)
}

// actions
export const actions = {
  async fetchSupliers({ commit }) {
    const { data } = await axios.get('/api/suplier')
    commit('setSuplier', data)
  },
}
