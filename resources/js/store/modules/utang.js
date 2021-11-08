import axios from 'axios'
import store from '~/store'

// state
export const state = {

  utangs: [
    {
      "id": 6,
      "payer_type": "Distributor",
      "payer_id": 4,
      "aset_id": 2,
      "jumlah": 13,
      "harga": "35000.00",
      "total": "455000.00",
      "bayar": "0.00",
      "status": "Pending",
      "keterangan": "test",
      "deleted_at": null,
      "created_at": "2021-10-28T12:56:55.000000Z",
      "updated_at": "2021-10-28T12:56:55.000000Z",
      "payer": {
        "id": 4,
        "nama": "Pak Tentrem",
        "deleted_at": null,
        "created_at": "2021-10-14T20:47:36.000000Z",
        "updated_at": "2021-10-14T20:47:36.000000Z"
      },
      "aset": {
        "id": 2,
        "nama": "Galon",
        "harga_jual": "35000.00",
        "harga_beli": "35000.00",
        "jumlah": 15,
        "total": "525000.00",
        "status": "Ok",
        "keterangan": "aset",
        "deleted_at": null,
        "created_at": "2021-10-14T20:47:36.000000Z",
        "updated_at": "2021-11-08T08:32:56.000000Z"
      },
      "log": [
        {
          "id": 114,
          "owner_type": "Utang",
          "owner_id": 6,
          "detail_transaksi_id": 114,
          "nama": "log",
          "tanggal": "2021-10-28 19:56:55",
          "jumlah": 13,
          "debit": "0.00",
          "kredit": "455000.00",
          "total": "0.00",
          "keterangan": "test",
          "deleted_at": null,
          "created_at": "2021-10-28T12:56:55.000000Z",
          "updated_at": "2021-10-28T12:56:55.000000Z"
        }
      ]
    },
    {
      "id": 7,
      "payer_type": "Distributor",
      "payer_id": 1,
      "aset_id": 2,
      "jumlah": 0,
      "harga": "35000.00",
      "total": "0.00",
      "bayar": "0.00",
      "status": "Ok",
      "keterangan": "test",
      "deleted_at": null,
      "created_at": "2021-11-03T02:07:52.000000Z",
      "updated_at": "2021-11-08T08:24:35.000000Z",
      "payer": {
        "id": 1,
        "nama": "Pak Mul",
        "deleted_at": null,
        "created_at": "2021-10-14T20:47:36.000000Z",
        "updated_at": "2021-10-14T20:47:36.000000Z"
      },
      "aset": {
        "id": 2,
        "nama": "Galon",
        "harga_jual": "35000.00",
        "harga_beli": "35000.00",
        "jumlah": 15,
        "total": "525000.00",
        "status": "Ok",
        "keterangan": "aset",
        "deleted_at": null,
        "created_at": "2021-10-14T20:47:36.000000Z",
        "updated_at": "2021-11-08T08:32:56.000000Z"
      },
      "log": [
        {
          "id": 128,
          "owner_type": "Utang",
          "owner_id": 7,
          "detail_transaksi_id": 133,
          "nama": "log",
          "tanggal": "2021-11-08 15:24:35",
          "jumlah": 10,
          "debit": "350000.00",
          "kredit": "0.00",
          "total": "105000.00",
          "keterangan": "test",
          "deleted_at": null,
          "created_at": "2021-11-08T08:24:35.000000Z",
          "updated_at": "2021-11-08T08:24:35.000000Z"
        }
      ]
    }
  ]
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
