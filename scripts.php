<?php
    include('functions.php');
    global $conn;

    if (isset($_POST['make_id'])) {
        $getModels = getModels();
        echo json_encode($getModels);
    }
    if (isset($_POST['model_id'])) {
        $getTrims = getTrims();
        echo json_encode($getTrims);
    }
    if(isset($_POST['create'])){
        $createStock = create();
        
        if($createStock['status'] == 200){
            header("Location: index.php?message=".$createStock['message']."");
        }
        else{
            header("Location: stock.php?create&message=".$createStock['message']."");
        }
    }
    if(isset($_POST['update'])){
        $stockId = $_POST['stock_id'];
        $updateStock = update($stockId);
        // echo "<pre>";
        // print_r($updateStock);
        // echo "</pre>";
        // exit;
        if($updateStock['status'] == 200){
            header("Location: index.php?message=".$updateStock['message']."");
        }
        else{
            header("Location: stock.php?update=".$stockId."&message=".mysqli_error($conn)."");
        }
    }
    if(isset($_POST['delete'])){
        $createStock = create();
        if($createStock['status'] == 200){
            header("Location: index.php?message=".$createStock['message']."");
        }
        else{
            header("Location: create.php?message=".$createStock['message']."");
        }
    }
    // if (isset($_POST['searchStock'])) {
    //     $data['stock_make'] = $_POST['stock_make'];
    //     $data['stock_model'] = $_POST['stock_model'];
    //     $searchStock = searchStock($data);
    //     return $searchStock;
    // }
?>