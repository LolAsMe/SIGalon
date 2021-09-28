import axios from 'axios'
import store from '~/store'

// state
export const state = {

  logs: [],
}

// getters
export const getters = {
  logs: state => state.logs,
}

// mutations
export const mutations = {
  setLogs: (state, logs) => (state.logs = logs),
  editLog(state, nLog) {
    const oldLog = state.logs.find(log => log.id === nLog.id);
    if (oldLog) {
      // not creating a new object but modifying old object here
      Object.assign(oldLog, nLog)
    }
  },
  addLog: (state, log) => state.logs.push(log),
  deleteLog: (state, id) => state.logs = state.logs.filter(logs => logs.id !== id)
}

// actions
export const actions = {
  async fetchLogs({ commit }) {
    const { data } = await axios.get('/api/log')
    commit('setLogs', data)
  },
}
