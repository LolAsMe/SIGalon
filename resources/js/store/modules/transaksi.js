import axios from 'axios'
import store from '~/store'

// state
export const state = {

  transaksis: [
    {
      "id": 54,
      "tanggal": "2021-11-08 15:32:56",
      "debit": "335000.00",
      "kredit": "335000.00",
      "status": "Ok",
      "keterangan": "-",
      "deleted_at": null,
      "created_at": "2021-11-08T08:32:56.000000Z",
      "updated_at": "2021-11-08T08:32:56.000000Z",
      "payer_type": "Distributor",
      "payer_id": 1,
      "payer": {
        "id": 1,
        "nama": "Pak Mul",
        "deleted_at": null,
        "created_at": "2021-10-14T20:47:36.000000Z",
        "updated_at": "2021-10-14T20:47:36.000000Z"
      },
      "detail": [
        {
          "id": 151,
          "transaksi_id": 54,
          "jumlah": 1,
          "harga": "0.00",
          "debit": "0.00",
          "kredit": "25000.00",
          "total": "25000.00",
          "keterangan": "Aktor Pak Mul",
          "deleted_at": null,
          "created_at": "2021-11-08T08:32:56.000000Z",
          "updated_at": "2021-11-08T08:32:56.000000Z",
          "log": {
            "id": 147,
            "owner_type": "Laba",
            "owner_id": 1,
            "detail_transaksi_id": 151,
            "nama": "log",
            "tanggal": "2021-11-08 15:32:56",
            "jumlah": 1,
            "debit": "0.00",
            "kredit": "25000.00",
            "total": "375500.00",
            "keterangan": "Aktor Pak Mul",
            "deleted_at": null,
            "created_at": "2021-11-08T08:32:56.000000Z",
            "updated_at": "2021-11-08T08:32:56.000000Z"
          }
        }
      ]
    },
  ]
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
    commit('setTransaksis', data.data.reverse())
  },
}
