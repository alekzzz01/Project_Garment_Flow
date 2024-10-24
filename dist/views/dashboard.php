<?php

require '../../config/db.php';




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project</title>

    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>

    <html data-theme="light"></html>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  

</head>
<body class="flex">

  
    <?php include '../includes/layouts/sidebar.php'; ?>
    


    <div class="flex-1">
        
        <!-- Navbar -->

        <?php include '../includes/layouts/navbar.php';?>
        
        <!-- Content -->

        <div class="bg-[#f2f5f8] p-6 grid grid-cols-1 lg:grid-cols-3 gap-6 h-full border-l">

                <div class="linechart shadow-sm rounded-lg p-6 bg-base-100 col-span-1 lg:col-span-3">

                        <div>
                            <p class="text-xl font-semibold mb-6">Total Sales(Revenue)</p>
                            <p class="text-3xl font-bold mb-2">$ 3000</p>
                            <p class="text-slate-500">+15% from last month</p>
                        </div>

                        <!-- Line chart for sales -->

                        <?php include '../includes/charts/linechart.php' ?>


                </div>

                <div class="neworders shadow-sm rounded-lg p-6 bg-base-100 space-y-12">
                        <p class="text-xl font-semibold">New Orders</p>

                        <div>
                            <p class="text-3xl font-bold mb-2">24</p>
                            <p class="text-slate-500">New orders today</p>
                        </div>

                        <div class="space-y-3 text-sm">

                            <div class="flex items-center justify-between">
                                <p>Processing</p>
                                <p class="font-semibold">15</p>
                            </div>

                            <div class="flex items-center justify-between">
                                <p>Shipped</p>
                                <p class="font-semibold">15</p>
                            </div>

                            <div class="flex items-center justify-between">
                                <p>Delivered</p>
                                <p class="font-semibold">15</p>
                            </div>


                        </div>

                </div>

                <div class="piechart shadow-sm rounded-lg p-6 bg-base-100 space-y-6">
                        <p class="text-xl font-semibold">Order Status</p>

                        <?php include '../includes/charts/piechart.php' ?>

                </div>

                <div class="barchart shadow-sm rounded-lg p-6 bg-base-100 space-y-6">
                        <p class="text-xl font-semibold">Top Selling Products</p>

                        <?php include '../includes/charts/barchart.php' ?>

                </div>

                <div class="inventory shadow-sm rounded-lg p-6 bg-base-100 space-y-12 col-span-1 lg:col-span-2">
                        <p class="text-xl font-semibold">Inventory Summary</p>

                        <div>
                            <p class="text-3xl font-bold mb-2">24</p>
                            <p class="text-slate-500">New orders today</p>
                        </div>

                        <div class="space-y-6 text-sm">

                        <div>
                            <div class="flex items-center justify-between mb-3">
                                <p>Critical Stock Level</p>
                                <p class="font-semibold text-red-500">5 items</p>
                            </div>
                            <progress class="progress w-full" value="10" max="100"></progress>
                        </div>

                        <div>
                            <div class="flex items-center justify-between mb-3">
                                <p>Low Stock Level</p>
                                <p class="font-semibold text-yellow-500">5 items</p>
                            </div>
                            <progress class="progress w-full" value="10" max="100"></progress>
                        </div>
                       
                       

                        </div>

                </div>

                <div class="neworders shadow-sm rounded-lg p-6 bg-base-100 space-y-12">
                        <p class="text-xl font-semibold">Customer Summary</p>

                        <div>
                            <p class="text-3xl font-bold mb-2">256</p>
                            <p class="text-slate-500">New customer this month</p>
                        </div>


                </div>

                
                
                
              
                   
        </div>

    </div>

   
</body>
</html>





<script src="../../assets/js/script.js"></script>
