import axios from 'axios'

/**
 * Responsible for all HTTP requests.
 */
export const http = {
  request (method, url, data, successCb = null, errorCb = null) {
    method = method.toLowerCase()
    axios.request({ url, data, method }).then(successCb).catch(errorCb)
  },

  get (url, successCb = null, errorCb = null) {
    return this.request('get', url, {}, successCb, errorCb)
  },

  post (url, data, successCb = null, errorCb = null) {
    return this.request('post', url, data, successCb, errorCb)
  },

  submit (url, data, successCb = null, errorCb = null) {
    // 多重送信抑止用にフラグを立てる
    data['single-submit'] = true;
    return this.request('post', url, data, successCb, errorCb);
  },

  put (url, data, successCb = null, errorCb = null) {
    return this.request('put', url, data, successCb, errorCb)
  },

  delete (url, data = {}, successCb = null, errorCb = null) {
    return this.request('delete', url, data, successCb, errorCb)
  },

  uploadFile (url, data, successCb = null, errorCb = null) {
    let config = {
        headers: {
            'content-type': 'multipart/form-data'
        }
    }
    return axios.post(url, data, config).then(successCb).catch(errorCb)
  },

  init () {
    //axios.defaults.headers.common = {
    //        'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
    //        'X-Requested-With': 'XMLHttpRequest'
    //}

    //axios.defaults.xsrfHeaderName = 'X-CSRF-TOKEN'

  }
}
