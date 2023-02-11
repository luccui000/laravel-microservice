<template>
  <div> 
    <div v-if="dataChart">
      <LineChartGenerator
        :chart-options="chartOptions"
        :data="dataChart"
        :chart-id="chartId"
        :dataset-id-key="datasetIdKey"
        :plugins="plugins"
        :css-classes="cssClasses"
        :styles="styles"
        :width="width"
        :height="height"
      /> 
    </div>
    <div v-else>Loading...</div>
  </div>
</template>

<script>
import { Line as LineChartGenerator } from 'vue-chartjs'

import {
  Chart as ChartJS,
  Title,
  Tooltip,
  Legend,
  LineElement,
  LinearScale,
  CategoryScale,
  PointElement
} from 'chart.js'

ChartJS.register(
  Title,
  Tooltip,
  Legend,
  LineElement,
  LinearScale,
  CategoryScale,
  PointElement
)

export default {
  name: 'LineChart',
  components: {
    LineChartGenerator
  },
  props: {
    chartId: {
      type: String,
      default: 'line-chart'
    },
    datasetIdKey: {
      type: String,
      default: 'label'
    },
    width: {
      type: Number,
      default: 100
    },
    height: {
      type: Number,
      default: 20
    },
    cssClasses: {
      default: '',
      type: String
    },
    styles: {
      type: Object,
      default: () => {}
    },
    plugins: {
      type: Array,
      default: () => []
    }
  },
  data() {
    return {
      chartData: {
        labels: [
          'January',
          'February',
          'March',
          'April',
          'May',
          'June',
          'July',
          'July',
          'July',
          'July',
          'July',
          'July',
          'July',
          'July',
          'July',
          'July',
        ],
        datasets: [
          {
            label: 'Số lượng mua',
            backgroundColor: '#f87979',
            data: [40, 39, 10, 40, 39, 80, 40, 40, 39, 10, 40, 39, 80, 40]
          }
        ]
      },
      chartOptions: {
        responsive: true,
        maintainAspectRatio: false
      },
      timerId: null
    }
  },
  beforeMount() {
    this.$store.dispatch('dashboard/getOrders');
  },
  mounted() {
    if(this.timerId)
      return;
    let timer = setInterval(() => {
      this.getOrders();
    }, 5000);
    this.timerId = timer;
  },
  methods: {
    getOrders() {
      this.$store.dispatch('dashboard/getOrders')
        .then(response => {
          const lables = Object.keys(response);
          this.chartData.labels = lables;
          const values = Object.values(response);
          this.chartData.datasets.data = values;
        })
    },
  },
  computed: { 
    dataChart() {
      return this.$store.getters['dashboard/chartData'] || {};
    }
  },
  beforeDestroy() { 
    clearInterval(this.timerId)
  }
}
</script>
