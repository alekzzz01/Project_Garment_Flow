<?php 








?>




<!-- This is for the sales line chart -->
<div id="linechart">
</div>


<script>
var options = {

series: [{
    name: "Desktops",
    data: [10, 41, 35, 51, 49, 62, 69, 91, 148, 180, 80, 95]
}],
 chart: {
  type: 'area',
  stacked: false,
  height: 350,
  zoom: {
    type: 'x',
    enabled: true,
    autoScaleYaxis: true
  },
  toolbar: {
    autoSelected: 'zoom'
  }
},
dataLabels: {
  enabled: false
},
stroke: {
  colors: ['#2E93FA'], 
  curve: 'straight'
},

fill: {
  type: 'gradient',
  gradient: {
    shadeIntensity: 1,
    inverseColors: false,
    opacityFrom: 0.5,
    opacityTo: 0,
    stops: [0, 90, 100]
  },
},

grid: {
  row: {
    colors: ['#EFF7FF', 'transparent'],
    opacity: 0.5
  },
},
xaxis: {
  categories: ['Jan 2024', 'Feb 2024', 'Mar 2024', 'Apr 2024', 'May 2024', 'Jun 2024', 'Jul 2024', 'Aug 2024', 'Sep 2024', 'Oct 2024', 'Nov 2024', 'Dec 2024'],
},

tooltip: {
    enabled: true,
    x: {
        format: 'MMM yyyy'
    }
},

};

var chart = new ApexCharts(document.querySelector("#linechart"), options);
chart.render();


</script>