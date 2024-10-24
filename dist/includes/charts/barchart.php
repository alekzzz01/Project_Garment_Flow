<div id="barchart" >
</div>



<script>
// Sample data for top 5 selling products
var productNames = ['Product A', 'Product B', 'Product C', 'Product D', 'Product E'];
var productSales = [150, 120, 100, 90, 80]; 

// ApexCharts options for the column chart
var options = {
    chart: {
        type: 'bar',
        height: 250
    },
    series: [{
        name: 'Sales',
        data: productSales
    }],
    xaxis: {
        categories: productNames
    },
  
    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded'
        },
    },
    dataLabels: {
        enabled: false
    },
  

};

// Render the chart
var chart = new ApexCharts(document.querySelector("#barchart"), options);
chart.render();
</script>
