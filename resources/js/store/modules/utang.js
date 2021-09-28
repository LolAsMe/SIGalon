import axios from 'axios'
import store from '~/store'

// state
export const state = {

  utangs: [],
}

// getters
export const getters = {
  utangs: state => state.utangs,
}

// mutations
export const mutations = {
  setUtangs: (state, utangs) => (state.utangs = utangs),
  editAset(state, nAset) {
    const oldAset = state.utangs.find(utang => utang.id === nAset.id);
    if (oldAset) {
      // not creating a new object but modifying old object here
      Object.assign(oldAset, nAset)
    }
  },
  addAset: (state, utang) => state.utangs.push(utang),
  deleteAset: (state, id) => state.utangs = state.utangs.filter(utangs => utangs.id !== id)
}

// actions
export const actions = {
  async fetchUtangs({ commit }) {
    const { data } = await axios.get('/api/utang')
    commit('setUtangs', data)
  },
}
