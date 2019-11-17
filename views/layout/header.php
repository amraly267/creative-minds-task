<?php
$navUrl = "http://".$_SERVER['HTTP_HOST'].str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>MindsUA</title>
        <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="../assets/plugins/daterangepicker/daterangepicker.css">
        <link rel="stylesheet" href="../assets/css/adminlte.css">
        <link rel="stylesheet" href="../assets/css/spinner.css">
    </head>
    <body class="hold-transition sidebar-mini">
        <div id="overlay">
            <div class="cv-spinner">
                <span class="spinner"></span>
            </div>
        </div>
        <div class="wrapper">
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href='<?php echo $navUrl.'products.php'; ?>' class="nav-link">Products</a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href='<?php echo $navUrl.'customers.php'; ?>' class="nav-link">Customers</a>
                    </li>
                </ul>
            </nav>



