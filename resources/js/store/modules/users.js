import axios from 'axios'
import store from '~/store'

// state
export const state = {

  asets: [],
}

// getters
export const getters = {
  asets: state => state.asets,
}

// mutations
export const mutations = {
  setAsets: (state, asets) => (state.asets = asets),
  editAset(state, nAset) {
    const oldAset = state.asets.find(aset => aset.id === nAset.id);
    if (oldAset) {
      // not creating a new object but modifying old object here
      Object.assign(oldAset, nAset)
    }
  },
  addAset: (state, aset) => state.asets.push(aset),
  deleteAset: (state, id) => state.asets = state.asets.filter(asets => asets.id !== id)
}

// actions
export const actions = {
  async fetchAsets({ commit }) {
    const { data } = await axios.get('/api/aset')
    commit('setAsets', data)
  },
}
