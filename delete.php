<?php
include('connection.php');
global $conn;
    $deleteQuery['stock_list'] = mysqli_query($conn, "DELETE FROM `stock_list` WHERE id= " . $_GET['stock_id'] . " ");
    $deleteQuery['stock_basic_info'] = mysqli_query($conn, "DELETE FROM `stock_basic_info` WHERE stock_list_id= " . $_GET['stock_id'] . " ");
    $deleteQuery['stock_features_specs'] = mysqli_query($conn, "DELETE FROM `stock_features_specs` WHERE stock_list_id= " . $_GET['stock_id'] . " ");
    $count = 1;
    foreach ($deleteQuery as $key => $delete) {
        if($delete){
            $count++;
        }
    }
    if ($count == 3) {
        header('location: index.php?message=Record Deleted');
    }
    else{
        header('location: index.php?message=Record Can Not Be Deleted');
    }

?>