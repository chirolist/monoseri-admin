import { http } from '../services'

export const bookmarkStore = {

  state: {
    total: 1,
    alive_count: 1,
    dead_count: 1,
    notfound_count: 1,
    unknown_count: 1,
    bookmarks: []
  },

  init () {
    return new Promise((resolve, reject) => {
      http.get(`/api/summary/bookmark`, ({ data }) => {
        this.state.total = data.total
        this.state.alive_count = data.alive_count
        this.state.dead_count = data.dead_count
        this.state.notfound_count = data.notfound_count
        this.state.unknown_count = data.unknown_count
        this.state.bookmarks = data.bookmarks
        resolve(data)
      }, error => reject(error))
    })
  }
}
