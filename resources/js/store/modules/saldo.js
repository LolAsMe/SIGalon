import axios from 'axios'
import store from '~/store'

// state
export const state = {

  saldos: [
    {
        "id": 1,
        "nama": "Loading",
        "total": "0",
        "deleted_at": null,
        "created_at": "2021-10-14T20:47:36.000000Z",
        "updated_at": "2021-11-08T08:32:56.000000Z",
        "log": [
            {
                "id": 148,
                "owner_type": "Saldo",
                "owner_id": 1,
                "detail_transaksi_id": 152,
                "nama": "log",
                "tanggal": "2021-11-08 15:32:56",
                "jumlah": 10,
                "debit": "100000.00",
                "kredit": "0.00",
                "total": "1140000.00",
                "keterangan": "Aktor Pak Mul",
                "deleted_at": null,
                "created_at": "2021-11-08T08:32:56.000000Z",
                "updated_at": "2021-11-08T08:32:56.000000Z"
            }
        ]
    }
],
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
