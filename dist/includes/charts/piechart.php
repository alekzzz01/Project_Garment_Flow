
<div id="piechart" >
</div>




<script>

var options1 = {
          series: [25, 25, 50],
          chart: {
          width: 380,
          type: 'pie',
        },
        labels: ['Processing', 'In Production', 'Shipped/Delivered'],
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
        };

        var chart1 = new ApexCharts(document.querySelector("#piechart"), options1);
        chart1.render();




</script>
                        


