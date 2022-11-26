<template>
  <div class="custom-form-container">
  <h2 v-html="question"></h2>
    <Bar
        :chart-options="chartOptions"
        :chart-data="chartData"
        :chart-id="chartId"
        :dataset-id-key="datasetIdKey"
        :plugins="plugins"
        :css-classes="cssClasses"
        :styles="styles"
        :width="width"
        :height="height"
        :options="options"
    />
  </div>
</template>

<script>
import { Bar } from 'vue-chartjs/legacy';
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js'

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)

export default {
  name: 'BarChart',
  components: { Bar },
  props: {
    counters:[],
    answers:[],
    question:{
      type: String,
    },
    chartId: {
      type: String,
      default: 'bar-chart'
    },
    datasetIdKey: {
      type: String,
      default: 'label'
    },
    width: {
      type: Number,
      default: 400
    },
    height: {
      type: Number,
      default: 400
    },
    cssClasses: {
      default: '',
      type: String
    },
    styles: {
      type: Object,
      default: () => {}
    }
  },
  data() {
    return {
      chartData: {
        labels: this.answers,
        datasets: [ { data: this.counters } ]
      },
      chartOptions: {
        responsive: true
      },
      plugins:[{title: {display: true,text: 'Chart Title'}}],
      options:{
        legend: {
          display: false,
        }
      }
    }
  }
}
</script>