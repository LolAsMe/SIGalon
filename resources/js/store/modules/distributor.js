import axios from 'axios'
import store from '~/store'

// state
export const state = {

  distributors: [{"id":"1","nama":"dummy"}],
}

// getters
export const getters = {
  distributors: state => state.distributors,
}

// mutations
export const mutations = {
  setDistributors: (state, distributors) => (state.distributors = distributors),
  editDistributor(state, nDistributor) {
    const oldDistributor = state.distributors.find(distributor => distributor.id === nDistributor.id);
    if (oldDistributor) {
      // not creating a new object but modifying old object here
      Object.assign(oldDistributor, nDistributor)
    }
  },
  addDistributor: (state, distributor) => state.distributors.push(distributor),
  deleteDistributor: (state, id) => state.distributors = state.distributors.filter(distributors => distributors.id !== id)
}

// actions
export const actions = {
  async fetchDistributors({ commit }) {
    const { data } = await axios.get('/api/distributor')
    commit('setDistributors', data)
  },
}
