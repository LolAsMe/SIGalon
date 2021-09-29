import axios from 'axios'
import store from '~/store'

// state
export const state = {

  saldos: [],
}

// getters
export const getters = {
  saldos: state => state.saldos,
}

// mutations
export const mutations = {
  setSaldos: (state, saldos) => (state.saldos = saldos),
  editSaldo(state, nSaldo) {
    const oldSaldo = state.saldos.find(saldo => saldo.id === nSaldo.id);
    if (oldSaldo) {
      // not creating a new object but modifying old object here
      Object.assign(oldSaldo, nSaldo)
    }
  },
  addSaldo: (state, saldo) => state.saldos.push(saldo),
  deleteSaldo: (state, id) => state.saldos = state.saldos.filter(saldos => saldos.id !== id)
}

// actions
export const actions = {
  async fetchSaldos({ commit }) {
    const { data } = await axios.get('/api/saldo')
    commit('setSaldos', data)
  },
}
