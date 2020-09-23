<script>
import { playStore } from '../../stores'
import { Line } from 'vue-chartjs';

export default {
  extends: Line,
  name: 'line-chart',
  data () {
    return {
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [
          {
            label: 'プレイした日数',
            data: playStore.state.summary.line.data,
            borderColor: '#CFD8DC',
            fill: true,
            type: 'line',
            lineTension: 0,
          }
        ]
      },
      options: {
        hoverBorderWidth: 20,
        scales: {
          xAxes: [{
            scaleLabel: {
              display: true,
              labelString: '2019'
            }
          }],
          yAxes: [{
            ticks: {
              beginAtZero: true,
              stepSize: 1,
              autoSkip: true
            }
          }]
        }
      }
    }
  },
  mounted () {
    setTimeout(() => {
      this.data.datasets[0].data = playStore.state.summary.line.data
      this.renderChart(this.data, this.options)
    }, 1000)
  }
}
</script>
