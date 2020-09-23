<script>
import { playStore } from '../../stores'
import { Bar } from 'vue-chartjs';

export default {
  extends: Bar,
  name: 'bar',
  data () {
    return {
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [
          {
            label: '艦これアーケード月別使用金額',
            data: playStore.state.summary.bar.data,
            borderWidth: 1
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
              stepSize: 5000
            },
            scaleLabel: {
              display: true,
              labelString: '使用金額(円)'
            }
          }]
        }
      }
    }
  },
  mounted () {
    setTimeout(() => {
      this.data.datasets[0].data = playStore.state.summary.bar.data
      this.renderChart(this.data, this.options)
    }, 1000)
  }
}
</script>
