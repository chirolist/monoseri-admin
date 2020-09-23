import { http } from '../services'

export const playStore = {

  state: {
    summary: {
      sum_total: 0,
      avg_total: 0,
      count: 0,
      max_month: {
        sum_total: 0,
        played_at: 0
      },
      bar: {
        data:[0,0,0,0,0,0,0,0,0,0,0,0]
      },
      line: {
        data:[0,0,0,0,0,0,0,0,0,0,0,0]
      }
    }
  },

  init () {
    return new Promise((resolve, reject) => {
      http.get(`/api/summary/play`, ({ data }) => {
        this.state.summary = data.summary
        resolve(data)
      }, error => reject(error))
    })
  }
}
