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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  

</head>
<body class="flex h-screen">

    <?php include '../includes/layouts/sidebar.php'; ?>

    <div class="flex-1 transition-margin duration-300 ease-in-out">
        
        <!-- Navbar -->

        <?php include '../includes/layouts/navbar.php';?>
        
        <!-- Content -->

        <div class="flex flex-col items-center justify-center bg-base-200">
                
                    <button type="button" class="btn btn-neutral mb-5">Dashboard Page</button>

                   
        </div>

    </div>

   
</body>
</html>


<script src="../../assets/js/script.js"></script>
