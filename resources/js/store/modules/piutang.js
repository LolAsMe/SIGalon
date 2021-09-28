import axios from 'axios'
import store from '~/store'

// state
export const state = {

  piutangs: [],
}

// getters
export const getters = {
  piutangs: state => state.piutangs,
}

// mutations
export const mutations = {
  setPiutangs: (state, piutangs) => (state.piutangs = piutangs),
  editPiutang(state, nPiutang) {
    const oldPiutang = state.piutangs.find(piutang => piutang.id === nPiutang.id);
    if (oldPiutang) {
      // not creating a new object but modifying old object here
      Object.assign(oldPiutang, nPiutang)
    }
  },
  addPiutang: (state, piutang) => state.piutangs.push(piutang),
  deletePiutang: (state, id) => state.piutangs = state.piutangs.filter(piutangs => piutangs.id !== id)
}

// actions
export const actions = {
  async fetchPiutangs({ commit }) {
    const { data } = await axios.get('/api/piutang')
    commit('setPiutangs', data)
  },
}
