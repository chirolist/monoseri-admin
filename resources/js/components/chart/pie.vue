<script>
import { Pie } from 'vue-chartjs';

export default {
  extends: Pie,
  name: 'pie',
  data () {
    return {
      data: {
        hoverBackgroundColor: "red",
        hoverBorderWidth: 10,
        labels: ["Green", "Red", "Blue"],

        datasets: [
          {
            label: "Data One",
            backgroundColor: ["#41B883", "#E46651", "#00D8FF"],
            data: [1, 10, 5]
          }
        ]
      }
    }
  },
  mounted () {
    this.renderChart(this.data, this.options)
  }
}
</script>
