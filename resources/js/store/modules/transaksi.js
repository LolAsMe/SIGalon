import axios from 'axios'
import store from '~/store'

// state
export const state = {

  transaksis: [],
}

// getters
export const getters = {
  transaksis: state => state.transaksis,
}

// mutations
export const mutations = {
  setTransaksis: (state, transaksis) => (state.transaksis = transaksis),
  editTransaksi(state, nTransaksi) {
    const oldTransaksi = state.transaksis.find(transaksi => transaksi.id === nTransaksi.id);
    if (oldTransaksi) {
      // not creating a new object but modifying old object here
      Object.assign(oldTransaksi, nTransaksi)
    }
  },
  addTransaksi: (state, transaksi) => state.transaksis.push(transaksi),
  deleteTransaksi: (state, id) => state.transaksis = state.transaksis.filter(transaksis => transaksis.id !== id)
}

// actions
export const actions = {
  async fetchTransaksis({ commit }) {
    const { data } = await axios.get('/api/transaksi')
    commit('setTransaksis', data)
  },
}
