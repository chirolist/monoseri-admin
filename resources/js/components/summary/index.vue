<template>
<main class="c-main">
  <div class="container-fluid">
    <div class="fade-in">
      <div class="row">
        <div class="col-sm-6 col-lg-3">
          <div class="card">
            <div class="card-body">
              <div class="text-value-lg">{{ separate(playState.summary.sum_total) }}円</div>
              <div>総金額</div>
            </div>
          </div>
        </div>
        <!-- /.col-->
        <div class="col-sm-6 col-lg-3">
          <div class="card">
            <div class="card-body">
              <div class="text-value-lg">{{ separate(playState.summary.avg_total) }}円</div>
              <div>日平均 （総プレイ日数:{{ playState.summary.count }}）</div>
            </div>
          </div>
        </div>
        <!-- /.col-->
        <div class="col-sm-6 col-lg-3">
          <div class="card">
            <div class="card-body">
              <div class="text-value-lg">{{ separate(playState.summary.month_average_total) }}円</div>
              <div>月平均</div>
            </div>
          </div>
        </div>
        <!-- /.col-->
        <div class="col-sm-6 col-lg-3">
          <div class="card">
            <div class="card-body">
              <div class="text-value-lg">{{ separate(playState.summary.max_month.sum_total) }}円</div>
              <div>月最高額（{{ playState.summary.max_month.played_at }}）</div>
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- /.row-->
      <div class="card-columns cols-2">
        <div class="card">
          <div class="card-header">2019年月別艦アケ使用金額
            <div class="card-header-actions"><a class="card-header-action" href="http://www.chartjs.org" target="_blank"><small class="text-muted">docs</small></a></div>
          </div>
          <div class="card-body">
            <div class="c-chart-wrapper">
              <bar/>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header">プレイ日数
            <div class="card-header-actions"><a class="card-header-action" href="http://www.chartjs.org" target="_blank"><small class="text-muted">docs</small></a></div>
          </div>
          <div class="card-body">
            <div class="c-chart-wrapper">
              <line-chart/>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6 col-lg-3">
          <div class="card text-white bg-primary">
            <div class="card-body">
              <div class="text-value-lg">{{ bookmarkState.alive_count }}</div>
              <div>Alive</div>
              <div class="progress progress-white progress-xs my-2">
                <div class="progress-bar" role="progressbar" :style="{width: ((bookmarkState.alive_count/bookmarkState.total)*100) + '%' }" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
              </div><small class="text-muted">Widget helper text</small>
            </div>
          </div>
        </div>
        <!-- /.col-->
        <div class="col-sm-6 col-lg-3">
          <div class="card text-white bg-warning">
            <div class="card-body">
              <div class="text-value-lg">{{ bookmarkState.notfound_count }}</div>
              <div>Not Found</div>
              <div class="progress progress-white progress-xs my-2">
                <div class="progress-bar" role="progressbar" :style="{width: ((bookmarkState.notfound_count/bookmarkState.total)*100) + '%' }" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
              </div><small class="text-muted">Widget helper text</small>
            </div>
          </div>
        </div>
        <!-- /.col-->
        <div class="col-sm-6 col-lg-3">
          <div class="card text-white bg-danger">
            <div class="card-body">
              <div class="text-value-lg">{{ bookmarkState.dead_count }}</div>
              <div>Dead</div>
              <div class="progress progress-white progress-xs my-2">
                <div class="progress-bar" role="progressbar" :style="{width: ((bookmarkState.dead_count/bookmarkState.total)*100) + '%' }" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
              </div><small class="text-muted">Widget helper text</small>
            </div>
          </div>
        </div>
        <!-- /.col-->
        <div class="col-sm-6 col-lg-3">
          <div class="card text-white bg-dark">
            <div class="card-body">
              <div class="text-value-lg">{{ bookmarkState.unknown_count }}</div>
              <div>Unknown</div>
              <div class="progress progress-white progress-xs my-2">
                <div class="progress-bar" role="progressbar" :style="{width: ((bookmarkState.unknown_count/bookmarkState.total)*100) + '%' }" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
              </div><small class="text-muted">Widget helper text</small>
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- /.row-->
      <div class="row">
        <div class="col-sm-6 col-lg-3" v-for="bookmark in bookmarkState.bookmarks">
          <div class="card">
            <div class="card-body">
              <div class="text-value-lg">{{ bookmark.count }}</div>
              <div>{{ bookmark.domain }}</div>
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- /.row-->
      <div class="row">
        <div class="col-6 col-lg-3">
          <div class="card">
            <div class="card-body p-3 d-flex align-items-center">
              <div class="bg-primary p-3 mfe-3">
                <svg class="c-icon c-icon-xl">
                  <use xlink:href="/coreui/vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
                </svg>
              </div>
              <div>
                <div class="text-value text-primary">$1.999,50</div>
                <div class="text-muted text-uppercase font-weight-bold small">Widget title</div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.col-->
        <div class="col-6 col-lg-3">
          <div class="card">
            <div class="card-body p-3 d-flex align-items-center">
              <div class="bg-info p-3 mfe-3">
                <svg class="c-icon c-icon-xl">
                  <use xlink:href="/coreui/vendors/@coreui/icons/svg/free.svg#cil-laptop"></use>
                </svg>
              </div>
              <div>
                <div class="text-value text-info">$1.999,50</div>
                <div class="text-muted text-uppercase font-weight-bold small">Widget title</div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.col-->
        <div class="col-6 col-lg-3">
          <div class="card">
            <div class="card-body p-3 d-flex align-items-center">
              <div class="bg-warning p-3 mfe-3">
                <svg class="c-icon c-icon-xl">
                  <use xlink:href="/coreui/vendors/@coreui/icons/svg/free.svg#cil-moon"></use>
                </svg>
              </div>
              <div>
                <div class="text-value text-warning">$1.999,50</div>
                <div class="text-muted text-uppercase font-weight-bold small">Widget title</div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.col-->
        <div class="col-6 col-lg-3">
          <div class="card">
            <div class="card-body p-3 d-flex align-items-center">
              <div class="bg-danger p-3 mfe-3">
                <svg class="c-icon c-icon-xl">
                  <use xlink:href="/coreui/vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
                </svg>
              </div>
              <div>
                <div class="text-value text-danger">$1.999,50</div>
                <div class="text-muted text-uppercase font-weight-bold small">Widget title</div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.col-->
        <div class="col-6 col-lg-3">
          <div class="card">
            <div class="card-body p-3 d-flex align-items-center">
              <div class="bg-primary p-3 mfe-3">
                <svg class="c-icon c-icon-xl">
                  <use xlink:href="/coreui/vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
                </svg>
              </div>
              <div>
                <div class="text-value text-primary">$1.999,50</div>
                <div class="text-muted text-uppercase font-weight-bold small">Widget title</div>
              </div>
            </div>
            <div class="card-footer px-3 py-2"><a class="btn-block text-muted d-flex justify-content-between align-items-center" href="#"><span class="small font-weight-bold">View More</span>
                <svg class="c-icon">
                  <use xlink:href="/coreui/vendors/@coreui/icons/svg/free.svg#cil-chevron-right"></use>
                </svg></a></div>
          </div>
        </div>
        <!-- /.col-->
        <div class="col-6 col-lg-3">
          <div class="card">
            <div class="card-body p-3 d-flex align-items-center">
              <div class="bg-info p-3 mfe-3">
                <svg class="c-icon c-icon-xl">
                  <use xlink:href="/coreui/vendors/@coreui/icons/svg/free.svg#cil-laptop"></use>
                </svg>
              </div>
              <div>
                <div class="text-value text-info">$1.999,50</div>
                <div class="text-muted text-uppercase font-weight-bold small">Widget title</div>
              </div>
            </div>
            <div class="card-footer px-3 py-2"><a class="btn-block text-muted d-flex justify-content-between align-items-center" href="#"><span class="small font-weight-bold">View More</span>
                <svg class="c-icon">
                  <use xlink:href="/coreui/vendors/@coreui/icons/svg/free.svg#cil-chevron-right"></use>
                </svg></a></div>
          </div>
        </div>
        <!-- /.col-->
        <div class="col-6 col-lg-3">
          <div class="card">
            <div class="card-body p-3 d-flex align-items-center">
              <div class="bg-warning p-3 mfe-3">
                <svg class="c-icon c-icon-xl">
                  <use xlink:href="/coreui/vendors/@coreui/icons/svg/free.svg#cil-moon"></use>
                </svg>
              </div>
              <div>
                <div class="text-value text-warning">$1.999,50</div>
                <div class="text-muted text-uppercase font-weight-bold small">Widget title</div>
              </div>
            </div>
            <div class="card-footer px-3 py-2"><a class="btn-block text-muted d-flex justify-content-between align-items-center" href="#"><span class="small font-weight-bold">View More</span>
                <svg class="c-icon">
                  <use xlink:href="/coreui/vendors/@coreui/icons/svg/free.svg#cil-chevron-right"></use>
                </svg></a></div>
          </div>
        </div>
        <!-- /.col-->
        <div class="col-6 col-lg-3">
          <div class="card">
            <div class="card-body p-3 d-flex align-items-center">
              <div class="bg-danger p-3 mfe-3">
                <svg class="c-icon c-icon-xl">
                  <use xlink:href="/coreui/vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
                </svg>
              </div>
              <div>
                <div class="text-value text-danger">$1.999,50</div>
                <div class="text-muted text-uppercase font-weight-bold small">Widget title</div>
              </div>
            </div>
            <div class="card-footer px-3 py-2"><a class="btn-block text-muted d-flex justify-content-between align-items-center" href="#"><span class="small font-weight-bold">View More</span>
                <svg class="c-icon">
                  <use xlink:href="/coreui/vendors/@coreui/icons/svg/free.svg#cil-chevron-right"></use>
                </svg></a></div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- /.row-->
      <div class="row">
        <div class="col-6 col-lg-3">
          <div class="card overflow-hidden">
            <div class="card-body p-0 d-flex align-items-center">
              <div class="bg-primary p-4 mfe-3">
                <svg class="c-icon c-icon-xl">
                  <use xlink:href="/coreui/vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
                </svg>
              </div>
              <div>
                <div class="text-value text-primary">$1.999,50</div>
                <div class="text-muted text-uppercase font-weight-bold small">Widget title</div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.col-->
        <div class="col-6 col-lg-3">
          <div class="card overflow-hidden">
            <div class="card-body p-0 d-flex align-items-center">
              <div class="bg-info p-4 mfe-3">
                <svg class="c-icon c-icon-xl">
                  <use xlink:href="/coreui/vendors/@coreui/icons/svg/free.svg#cil-laptop"></use>
                </svg>
              </div>
              <div>
                <div class="text-value text-info">$1.999,50</div>
                <div class="text-muted text-uppercase font-weight-bold small">Widget title</div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.col-->
        <div class="col-6 col-lg-3">
          <div class="card overflow-hidden">
            <div class="card-body p-0 d-flex align-items-center">
              <div class="bg-warning p-4 mfe-3">
                <svg class="c-icon c-icon-xl">
                  <use xlink:href="/coreui/vendors/@coreui/icons/svg/free.svg#cil-moon"></use>
                </svg>
              </div>
              <div>
                <div class="text-value text-warning">$1.999,50</div>
                <div class="text-muted text-uppercase font-weight-bold small">Widget title</div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.col-->
        <div class="col-6 col-lg-3">
          <div class="card overflow-hidden">
            <div class="card-body p-0 d-flex align-items-center">
              <div class="bg-danger p-4 mfe-3">
                <svg class="c-icon c-icon-xl">
                  <use xlink:href="/coreui/vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
                </svg>
              </div>
              <div>
                <div class="text-value text-danger">$1.999,50</div>
                <div class="text-muted text-uppercase font-weight-bold small">Widget title</div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.col-->
        <div class="col-6 col-lg-3">
          <div class="card overflow-hidden">
            <div class="card-body p-0 d-flex align-items-center">
              <div class="bg-primary py-4 px-5 mfe-3">
                <svg class="c-icon c-icon-xl">
                  <use xlink:href="/coreui/vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
                </svg>
              </div>
              <div>
                <div class="text-value text-primary">$1.999,50</div>
                <div class="text-muted text-uppercase font-weight-bold small">Widget title</div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.col-->
        <div class="col-6 col-lg-3">
          <div class="card overflow-hidden">
            <div class="card-body p-0 d-flex align-items-center">
              <div class="bg-info py-4 px-5 mfe-3">
                <svg class="c-icon c-icon-xl">
                  <use xlink:href="/coreui/vendors/@coreui/icons/svg/free.svg#cil-laptop"></use>
                </svg>
              </div>
              <div>
                <div class="text-value text-info">$1.999,50</div>
                <div class="text-muted text-uppercase font-weight-bold small">Widget title</div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.col-->
        <div class="col-6 col-lg-3">
          <div class="card overflow-hidden">
            <div class="card-body p-0 d-flex align-items-center">
              <div class="bg-warning py-4 px-5 mfe-3">
                <svg class="c-icon c-icon-xl">
                  <use xlink:href="/coreui/vendors/@coreui/icons/svg/free.svg#cil-moon"></use>
                </svg>
              </div>
              <div>
                <div class="text-value text-warning">$1.999,50</div>
                <div class="text-muted text-uppercase font-weight-bold small">Widget title</div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.col-->
        <div class="col-6 col-lg-3">
          <div class="card overflow-hidden">
            <div class="card-body p-0 d-flex align-items-center">
              <div class="bg-danger py-4 px-5 mfe-3">
                <svg class="c-icon c-icon-xl">
                  <use xlink:href="/coreui/vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
                </svg>
              </div>
              <div>
                <div class="text-value text-danger">$1.999,50</div>
                <div class="text-muted text-uppercase font-weight-bold small">Widget title</div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- /.row-->
      <div class="row">
        <div class="col-sm-6 col-lg-4">
          <div class="card">
            <div class="card-header bg-facebook content-center">
              <svg class="c-icon c-icon-3xl text-white my-4">
                <use xlink:href="/coreui/vendors/@coreui/icons/svg/brand.svg#cib-facebook-f"></use>
              </svg>
              <div class="c-chart-wrapper">
                <canvas id="social-box-chart-1" height="90"></canvas>
              </div>
            </div>
            <div class="card-body row text-center">
              <div class="col">
                <div class="text-value-xl">89k</div>
                <div class="text-uppercase text-muted small">friends</div>
              </div>
              <div class="c-vr"></div>
              <div class="col">
                <div class="text-value-xl">459</div>
                <div class="text-uppercase text-muted small">feeds</div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.col-->
        <div class="col-sm-6 col-lg-4">
          <div class="card">
            <div class="card-header bg-twitter content-center">
              <svg class="c-icon c-icon-3xl text-white my-4">
                <use xlink:href="/coreui/vendors/@coreui/icons/svg/brand.svg#cib-twitter"></use>
              </svg>
              <div class="c-chart-wrapper">
                <canvas id="social-box-chart-2" height="90"></canvas>
              </div>
            </div>
            <div class="card-body row text-center">
              <div class="col">
                <div class="text-value-xl">973k</div>
                <div class="text-uppercase text-muted small">followers</div>
              </div>
              <div class="c-vr"></div>
              <div class="col">
                <div class="text-value-xl">1.792</div>
                <div class="text-uppercase text-muted small">tweets</div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.col-->
        <div class="col-sm-6 col-lg-4">
          <div class="card">
            <div class="card-header bg-linkedin content-center">
              <svg class="c-icon c-icon-3xl text-white my-4">
                <use xlink:href="/coreui/vendors/@coreui/icons/svg/brand.svg#cib-linkedin"></use>
              </svg>
              <div class="c-chart-wrapper">
                <canvas id="social-box-chart-3" height="90"></canvas>
              </div>
            </div>
            <div class="card-body row text-center">
              <div class="col">
                <div class="text-value-xl">500+</div>
                <div class="text-uppercase text-muted small">contacts</div>
              </div>
              <div class="c-vr"></div>
              <div class="col">
                <div class="text-value-xl">292</div>
                <div class="text-uppercase text-muted small">feeds</div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- /.row-->
      <div class="card-group mb-4">
        <div class="card">
          <div class="card-body">
            <div class="text-muted text-right mb-4">
              <svg class="c-icon c-icon-2xl">
                <use xlink:href="/coreui/vendors/@coreui/icons/svg/free.svg#cil-people"></use>
              </svg>
            </div>
            <div class="text-value-lg">1</div><small class="text-muted text-uppercase font-weight-bold">Visitors</small>
            <div class="progress progress-xs mt-3 mb-0">
              <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="text-muted text-right mb-4">
              <svg class="c-icon c-icon-2xl">
                <use xlink:href="/coreui/vendors/@coreui/icons/svg/free.svg#cil-user-follow"></use>
              </svg>
            </div>
            <div class="text-value-lg">385</div><small class="text-muted text-uppercase font-weight-bold">New Clients</small>
            <div class="progress progress-xs mt-3 mb-0">
              <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="text-muted text-right mb-4">
              <svg class="c-icon c-icon-2xl">
                <use xlink:href="/coreui/vendors/@coreui/icons/svg/free.svg#cil-basket"></use>
              </svg>
            </div>
            <div class="text-value-lg">1238</div><small class="text-muted text-uppercase font-weight-bold">Products sold</small>
            <div class="progress progress-xs mt-3 mb-0">
              <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="text-muted text-right mb-4">
              <svg class="c-icon c-icon-2xl">
                <use xlink:href="/coreui/vendors/@coreui/icons/svg/free.svg#cil-chart-pie"></use>
              </svg>
            </div>
            <div class="text-value-lg">28%</div><small class="text-muted text-uppercase font-weight-bold">Returning Visitors</small>
            <div class="progress progress-xs mt-3 mb-0">
              <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="text-muted text-right mb-4">
              <svg class="c-icon c-icon-2xl">
                <use xlink:href="/coreui/vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
              </svg>
            </div>
            <div class="text-value-lg">5:34:11</div><small class="text-muted text-uppercase font-weight-bold">Avg. Time</small>
            <div class="progress progress-xs mt-3 mb-0">
              <div class="progress-bar bg-danger" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
</template>

<script>
import { bookmarkStore, playStore } from '../../stores'
import Pie from '../chart/pie.vue'
import Bar from '../chart/bar.vue'
import LineChart from '../chart/line.vue'

export default {

  components: { Pie, Bar, LineChart },

  data() {
    return {
      bookmarkState: bookmarkStore.state,
      playState: playStore.state
    }
  },

  created () {

  },

  mounted () {

    this.fetchBookMarkSummary()
    this.fetchPlaySummary ()

  },

  methods: {

    fetchBookMarkSummary () {
      bookmarkStore.init().then(data => {

      })
    },

    fetchPlaySummary () {
      playStore.init().then(data => {

      })
    },

    separate(num){
      return String(num).replace( /(\d)(?=(\d\d\d)+(?!\d))/g, '$1,');
    }
  }
}
</script>
