<?php
    include('functions.php');
?>
<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="js.js"></script>
        <title>Carnama | Car Inventory</title>
    </head>

    <body>
        <div class="row">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="#"><strong>Carnama</strong></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-item nav-link active" href="index.php">Home</a>
                            <a class="nav-item nav-link" href="stock.php?create">Create New</a>
                        </div>
                    </div>
                    <div class="col-lg-8" style="float: right">
                        <?php 
                            $msg = "";
                            if(isset($_GET['message'])){
                                if($_GET['message'] == 'success'){
                                    $msg = $_GET['message'];
                                    $class = $_GET['message'];
                                }
                                elseif($_GET['message'] == 'failure'){
                                    $msg = $_GET['message'];
                                    $class = 'danger';
                                }
                                else{
                                    $msg = $_GET['message'];
                                    $class = 'info';
                                }  
                            }
                            if(!empty($msg)){ ?>
                                <div class="col-lg-4 h5 alert alert-<?= $class ?> text-center">
                                    <?= ucfirst($msg).'..!' ?> 
                                </div>
                        <?php
                            }
                        ?>
                    </div>
                </nav>
            </div>
        </div>
        <div class="container">
            <div class="row d-flex justify-content-between">
