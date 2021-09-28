import axios from 'axios'
import store from '~/store'

// state
export const state = {

  detailTransaksis: [],
}

// getters
export const getters = {
  detailTransaksis: state => state.detailTransaksis,
}

// mutations
export const mutations = {
  setDetailTransaksis: (state, detailTransaksis) => (state.detailTransaksis = detailTransaksis),
  editDetailTransaksi(state, nDetailTransaksi) {
    const oldDetailTransaksi = state.detailTransaksis.find(detailTransaksi => detailTransaksi.id === nDetailTransaksi.id);
    if (oldDetailTransaksi) {
      // not creating a new object but modifying old object here
      Object.assign(oldDetailTransaksi, nDetailTransaksi)
    }
  },
  addDetailTransaksi: (state, detailTransaksi) => state.detailTransaksis.push(detailTransaksi),
  deleteDetailTransaksi: (state, id) => state.detailTransaksis = state.detailTransaksis.filter(detailTransaksis => detailTransaksis.id !== id)
}

// actions
export const actions = {
  async fetchDetailTransaksis({ commit }) {
    const { data } = await axios.get('/api/detailTransaksi')
    commit('setDetailTransaksis', data)
  },
}
