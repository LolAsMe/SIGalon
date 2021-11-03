import axios from 'axios'
import store from '~/store'

// state
export const state = {

  piutangs: [{
    "id": 5,
    "payer_type": "Distributor",
    "payer_id": 3,
    "aset_id": 2,
    "jumlah": 1,
    "harga": "35000.00",
    "total": "35000.00",
    "bayar": "0.00",
    "status": "Pending",
    "keterangan": "test",
    "deleted_at": null,
    "created_at": "2021-10-28T12:56:36.000000Z",
    "updated_at": "2021-10-28T12:56:36.000000Z",
    "payer": {
      "id": 3,
      "nama": "Pak Mardiyono",
      "deleted_at": null,
      "created_at": "2021-10-14T20:47:36.000000Z",
      "updated_at": "2021-10-14T20:47:36.000000Z"
    },
    "aset": {
      "id": 2,
      "nama": "Galon",
      "harga_jual": "35000.00",
      "harga_beli": "35000.00",
      "jumlah": 60,
      "total": "2100000.00",
      "status": "Ok",
      "keterangan": "aset",
      "deleted_at": null,
      "created_at": "2021-10-14T20:47:36.000000Z",
      "updated_at": "2021-11-03T02:08:39.000000Z"
    }
  },],
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
