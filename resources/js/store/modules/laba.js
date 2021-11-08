import axios from 'axios'
import store from '~/store'

// state
export const state = {

  labas: [
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
                "owner_type": "Laba",
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
  labas: state => state.labas,
}

// mutations
export const mutations = {
  setLabas: (state, labas) => (state.labas = labas),
  editLaba(state, nLaba) {
    const oldLaba = state.labas.find(laba => laba.id === nLaba.id);
    if (oldLaba) {
      // not creating a new object but modifying old object here
      Object.assign(oldLaba, nLaba)
    }
  },
  addLaba: (state, laba) => state.labas.push(laba),
  deleteLaba: (state, id) => state.labas = state.labas.filter(labas => labas.id !== id)
}

// actions
export const actions = {
  async fetchLabas({ commit }) {
    const { data } = await axios.get('/api/laba')
    data[0].log.reverse()
    commit('setLabas', data)
  },
}
