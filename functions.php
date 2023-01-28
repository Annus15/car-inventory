<?php
    include('connection.php');

function create(){
    
    global $conn;
    $data = array();
    $createStock = mysqli_query($conn, "INSERT INTO `stock_list`(`stock_title`) VALUES ('".$_POST['stock_title']."')");
    
    if ($createStock == true) {
        
        $new_stock_id = mysqli_insert_id($conn);
        $createStockBasicInfo = mysqli_query($conn, "INSERT INTO `stock_basic_info`(`stock_list_id`, `make_id`, `model_id`, `trim_id`, `year`, `body_type_id`, `exterior_color_id`, `interior_color_id`, `transmission_id`, `drive_id`, `fuel_id`, `engine`, `mileage`, `engine_no`, `chassis_no`, `registration_date`, `seats`, `doors`, `steering_id`, `price_usd`) VALUES (".$new_stock_id.",".$_POST['stock_make'].",".$_POST['stock_model'].",".$_POST['stock_trim'].",".$_POST['stock_year'].",".$_POST['stock_body'].",".$_POST['stock_exterior_color'].",".$_POST['stock_interior_color'].",".$_POST['stock_transmission'].",".$_POST['stock_drive'].",".$_POST['stock_fuel'].",'".$_POST['stock_engine_size']."','".$_POST['stock_mileage']."','".$_POST['stock_engine_no']."','".$_POST['stock_chassis_no']."','".$_POST['stock_regirtaton_date']."',".$_POST['stock_seats'].",".$_POST['stock_doors'].",".$_POST['stock_steering'].",".$_POST['stock_price_usd'].")");
        
        if($createStockBasicInfo == true){
            (isset($_POST['power_doors']))? $stockSpecs['power_doors'] = $_POST['power_doors']: $stockSpecs['power_doors'] = NULL ;
            (isset($_POST['power_windows']))? $stockSpecs['power_windows'] = $_POST['power_windows']: $stockSpecs['power_windows'] = NULL ;
            (isset($_POST['abs']))? $stockSpecs['abs'] = $_POST['abs']: $stockSpecs['abs'] = NULL ;
            (isset($_POST['airbags']))? $stockSpecs['airbags'] = $_POST['airbags']: $stockSpecs['airbags'] = NULL ;
            (isset($_POST['key_less_entry']))? $stockSpecs['key_less_entry'] = $_POST['key_less_entry']: $stockSpecs['key_less_entry'] = NULL ;
            (isset($_POST['push_start']))? $stockSpecs['push_start'] = $_POST['push_start']: $stockSpecs['push_start'] = NULL ;
            (isset($_POST['leather_seats']))? $stockSpecs['leather_seats'] = $_POST['leather_seats']: $stockSpecs['leather_seats'] = NULL ;
            (isset($_POST['power_seats']))? $stockSpecs['power_seats'] = $_POST['power_seats']: $stockSpecs['power_seats'] = NULL ;
            (isset($_POST['audio_player']))? $stockSpecs['audio_player'] = $_POST['audio_player']: $stockSpecs['audio_player'] = NULL ;
            (isset($_POST['cd_player']))? $stockSpecs['cd_player'] = $_POST['cd_player']: $stockSpecs['cd_player'] = NULL ;
            (isset($_POST['android_player']))? $stockSpecs['android_player'] = $_POST['android_player']: $stockSpecs['android_player'] = NULL ;
            (isset($_POST['fm_radio']))? $stockSpecs['fm_radio'] = $_POST['fm_radio']: $stockSpecs['fm_radio'] = NULL ;
            (isset($_POST['sun_roof']))? $stockSpecs['sun_roof'] = $_POST['sun_roof']: $stockSpecs['sun_roof'] = NULL ;
            (isset($_POST['parking_sensors']))? $stockSpecs['parking_sensors'] = $_POST['parking_sensors']: $stockSpecs['parking_sensors'] = NULL ;
            (isset($_POST['auto_dimming']))? $stockSpecs['auto_dimming'] = $_POST['auto_dimming']: $stockSpecs['auto_dimming'] = NULL ;
            (isset($_POST['blind_spot_monitor']))? $stockSpecs['blind_spot_monitor'] = $_POST['blind_spot_monitor']: $stockSpecs['blind_spot_monitor'] = NULL ;
            (isset($_POST['360_camera']))? $stockSpecs['360_camera'] = $_POST['360_camera']: $stockSpecs['360_camera'] = NULL ;
            (isset($_POST['reverse_camera']))? $stockSpecs['reverse_camera'] = $_POST['reverse_camera']: $stockSpecs['reverse_camera'] = NULL ;
            (isset($_POST['cruise_control']))? $stockSpecs['cruise_control'] = $_POST['cruise_control']: $stockSpecs['cruise_control'] = NULL ;
            (isset($_POST['adaptive_cruise_control']))? $stockSpecs['adaptive_cruise_control'] = $_POST['adaptive_cruise_control']: $stockSpecs['adaptive_cruise_control'] = NULL ;
            (isset($_POST['traction_control']))? $stockSpecs['traction_control'] = $_POST['traction_control']: $stockSpecs['traction_control'] = NULL ;
            (isset($_POST['drl']))? $stockSpecs['drl'] = $_POST['drl']: $stockSpecs['drl'] = NULL ;
            (isset($_POST['fog_lamps']))? $stockSpecs['fog_lamps'] = $_POST['fog_lamps']: $stockSpecs['fog_lamps'] = NULL ;
            (isset($_POST['alloy_rims']))? $stockSpecs['alloy_rims'] = $_POST['alloy_rims']: $stockSpecs['alloy_rims'] = NULL ;

            $createStockFeatures = mysqli_query($conn, "INSERT INTO `stock_features_specs`(`stock_list_id`, `power_doors`, `power_windows`, `abs`, `airbags`, `key_less_entry`, `push_start`, `leather_seats`, `power_seats`, `audio_player`, `cd_player`, `android_player`, `fm_radio`, `sun_roof`, `parking_sensors`, `auto_dimming`, `blind_spot_monitor`, `360_camera`, `reverse_camera`, `cruise_control`, `adaptive_cruise_control`, `traction_control`, `drl`, `fog_lamps`, `alloy_rims`) VALUES (".$new_stock_id.",'".$stockSpecs['power_doors']."','".$stockSpecs['power_windows']."','".$stockSpecs['abs']."','".$stockSpecs['airbags']."','".$stockSpecs['key_less_entry']."','".$stockSpecs['push_start']."','".$stockSpecs['leather_seats']."','".$stockSpecs['power_seats']."','".$stockSpecs['audio_player']."','".$stockSpecs['cd_player']."','".$stockSpecs['android_player']."','".$stockSpecs['fm_radio']."','".$stockSpecs['sun_roof']."','".$stockSpecs['parking_sensors']."','".$stockSpecs['auto_dimming']."','".$stockSpecs['blind_spot_monitor']."','".$stockSpecs['360_camera']."','".$stockSpecs['reverse_camera']."','".$stockSpecs['cruise_control']."','".$stockSpecs['adaptive_cruise_control']."','".$stockSpecs['traction_control']."','".$stockSpecs['drl']."','".$stockSpecs['fog_lamps']."','".$stockSpecs['alloy_rims']."')");
        }
        if($createStock == true && $createStockBasicInfo == true && $createStockFeatures == true){
            $data['status'] = '200';
            $data['message'] = 'success';
        }
        else{
            $data['status'] = '500';
            $data['message'] = 'failure';
        }
    }

    return $data;
}

function searchStock($data){
    $getAllStock = getAllStock($data);
    return $getAllStock;
}

function update($id){
    global $conn;
    $data = array();
    $updateStock = mysqli_query($conn, "UPDATE `stock_list` SET `stock_title` = '".$_POST['stock_title']."' WHERE id = ".$id."");
    
    if ($updateStock == true) {
        $updateStockBasicInfo = mysqli_query($conn, "UPDATE `stock_basic_info` SET `make_id`=".$_POST['stock_make']." , `model_id`=".$_POST['stock_model']." , `trim_id`=".$_POST['stock_trim']." , `year`=".$_POST['stock_year']." , `body_type_id`=".$_POST['stock_body']." , `exterior_color_id`=".$_POST['stock_exterior_color']." , `interior_color_id`=".$_POST['stock_interior_color']." , `transmission_id`=".$_POST['stock_transmission']." , `drive_id`=".$_POST['stock_drive']." , `fuel_id`=".$_POST['stock_fuel']." , `engine`='".$_POST['stock_engine_size']."' , `mileage`='".$_POST['stock_mileage']."' , `engine_no`='".$_POST['stock_engine_no']."' , `chassis_no`='".$_POST['stock_chassis_no']."' , `registration_date`='".$_POST['stock_regirtaton_date']."' , `seats`=".$_POST['stock_seats']." , `doors`='".$_POST['stock_doors']."' , `steering_id`=".$_POST['stock_steering']." , `price_usd`=".$_POST['stock_price_usd']." WHERE stock_list_id = ".$id."");

        if($updateStockBasicInfo == true){
            (isset($_POST['power_doors']))? $stockSpecs['power_doors'] = $_POST['power_doors']: $stockSpecs['power_doors'] = NULL ;
            (isset($_POST['power_windows']))? $stockSpecs['power_windows'] = $_POST['power_windows']: $stockSpecs['power_windows'] = NULL ;
            (isset($_POST['abs']))? $stockSpecs['abs'] = $_POST['abs']: $stockSpecs['abs'] = NULL ;
            (isset($_POST['airbags']))? $stockSpecs['airbags'] = $_POST['airbags']: $stockSpecs['airbags'] = NULL ;
            (isset($_POST['key_less_entry']))? $stockSpecs['key_less_entry'] = $_POST['key_less_entry']: $stockSpecs['key_less_entry'] = NULL ;
            (isset($_POST['push_start']))? $stockSpecs['push_start'] = $_POST['push_start']: $stockSpecs['push_start'] = NULL ;
            (isset($_POST['leather_seats']))? $stockSpecs['leather_seats'] = $_POST['leather_seats']: $stockSpecs['leather_seats'] = NULL ;
            (isset($_POST['power_seats']))? $stockSpecs['power_seats'] = $_POST['power_seats']: $stockSpecs['power_seats'] = NULL ;
            (isset($_POST['audio_player']))? $stockSpecs['audio_player'] = $_POST['audio_player']: $stockSpecs['audio_player'] = NULL ;
            (isset($_POST['cd_player']))? $stockSpecs['cd_player'] = $_POST['cd_player']: $stockSpecs['cd_player'] = NULL ;
            (isset($_POST['android_player']))? $stockSpecs['android_player'] = $_POST['android_player']: $stockSpecs['android_player'] = NULL ;
            (isset($_POST['fm_radio']))? $stockSpecs['fm_radio'] = $_POST['fm_radio']: $stockSpecs['fm_radio'] = NULL ;
            (isset($_POST['sun_roof']))? $stockSpecs['sun_roof'] = $_POST['sun_roof']: $stockSpecs['sun_roof'] = NULL ;
            (isset($_POST['parking_sensors']))? $stockSpecs['parking_sensors'] = $_POST['parking_sensors']: $stockSpecs['parking_sensors'] = NULL ;
            (isset($_POST['auto_dimming']))? $stockSpecs['auto_dimming'] = $_POST['auto_dimming']: $stockSpecs['auto_dimming'] = NULL ;
            (isset($_POST['blind_spot_monitor']))? $stockSpecs['blind_spot_monitor'] = $_POST['blind_spot_monitor']: $stockSpecs['blind_spot_monitor'] = NULL ;
            (isset($_POST['360_camera']))? $stockSpecs['360_camera'] = $_POST['360_camera']: $stockSpecs['360_camera'] = NULL ;
            (isset($_POST['reverse_camera']))? $stockSpecs['reverse_camera'] = $_POST['reverse_camera']: $stockSpecs['reverse_camera'] = NULL ;
            (isset($_POST['cruise_control']))? $stockSpecs['cruise_control'] = $_POST['cruise_control']: $stockSpecs['cruise_control'] = NULL ;
            (isset($_POST['adaptive_cruise_control']))? $stockSpecs['adaptive_cruise_control'] = $_POST['adaptive_cruise_control']: $stockSpecs['adaptive_cruise_control'] = NULL ;
            (isset($_POST['traction_control']))? $stockSpecs['traction_control'] = $_POST['traction_control']: $stockSpecs['traction_control'] = NULL ;
            (isset($_POST['drl']))? $stockSpecs['drl'] = $_POST['drl']: $stockSpecs['drl'] = NULL ;
            (isset($_POST['fog_lamps']))? $stockSpecs['fog_lamps'] = $_POST['fog_lamps']: $stockSpecs['fog_lamps'] = NULL ;
            (isset($_POST['alloy_rims']))? $stockSpecs['alloy_rims'] = $_POST['alloy_rims']: $stockSpecs['alloy_rims'] = NULL ;

            $updateStockFeatures = mysqli_query($conn, "UPDATE `stock_features_specs`SET `power_doors`= '".$stockSpecs['power_doors']."', `power_windows`= '".$stockSpecs['power_windows']."', `abs`= '".$stockSpecs['abs']."', `airbags`= '".$stockSpecs['airbags']."', `key_less_entry`= '".$stockSpecs['key_less_entry']."', `push_start`= '".$stockSpecs['push_start']."', `leather_seats`= '".$stockSpecs['leather_seats']."', `power_seats`= '".$stockSpecs['power_seats']."', `audio_player`= '".$stockSpecs['audio_player']."', `cd_player`= '".$stockSpecs['cd_player']."', `android_player`= '".$stockSpecs['android_player']."', `fm_radio`= '".$stockSpecs['fm_radio']."', `sun_roof`= '".$stockSpecs['sun_roof']."', `parking_sensors`= '".$stockSpecs['parking_sensors']."', `auto_dimming`= '".$stockSpecs['auto_dimming']."', `blind_spot_monitor`= '".$stockSpecs['blind_spot_monitor']."', `360_camera`= '".$stockSpecs['360_camera']."', `reverse_camera`= '".$stockSpecs['reverse_camera']."', `cruise_control`= '".$stockSpecs['cruise_control']."', `adaptive_cruise_control`= '".$stockSpecs['adaptive_cruise_control']."', `traction_control`= '".$stockSpecs['traction_control']."', `drl`= '".$stockSpecs['drl']."', `fog_lamps`= '".$stockSpecs['fog_lamps']."', `alloy_rims`= '".$stockSpecs['alloy_rims']."' WHERE stock_list_id = ".$id."");
        }
        if($updateStock == true && $updateStockBasicInfo == true && $updateStockFeatures == true){
            $data['status'] = '200';
            $data['message'] = 'success';
        }
        else{
            $data['status'] = '500';
            $data['message'] = 'failure';
        }
    }

    return $data;
}

function getAllStock($searchStock = array()){
    global $conn;
    $data = array();
    $i = 0;

    if(!empty($searchStock['stock_make'])){
        $queryPart[0] = "AND sbi.make_id = ".$searchStock['stock_make']."";
    }
    else{
        $queryPart[0] = "";
    }
    if(!empty($searchStock['stock_model'])){
        $queryPart[1] = "AND sbi.model_id = ".$searchStock['stock_model']."";
    }
    else{
        $queryPart[1] = "";
    }
    
    $dataQuery = mysqli_query($conn, "SELECT sl.id, sl.stock_title, m.make_title, md.model_title, sbi.year, t.trim_title  from stock_list as sl JOIN stock_basic_info as sbi ON sl.id = sbi.stock_list_id JOIN makes as m ON sbi.make_id = m.id JOIN models as md ON sbi.model_id = md.id JOIN trims as t ON sbi.trim_id = t.id WHERE sl.active = 1 ".$queryPart[0]." ".$queryPart[1]."");
    while($row = mysqli_fetch_assoc($dataQuery)){
        $data[$i]['id']          = $row['id'];
        $data[$i]['stock_title'] = $row['stock_title'];
        $data[$i]['make_title']  = $row['make_title'];
        $data[$i]['model_title'] = $row['model_title'];
        $data[$i]['trim_title']  = $row['trim_title'];
        $data[$i]['year']        = $row['year'];
        $i++;
    }

    return $data;
}

function getStockById($stockID){
    global $conn;
    $data = array();
    
    $dataQuery = mysqli_query($conn, "SELECT sl.id stk, sl.stock_title, m.id mk, m.make_title, md.id mdl, md.model_title, sbi.year, t.id trm, t.trim_title, bt.body_type_title, ec.color_title exterior_color, ic.color_title interior_color, trans.transmission_title, d.drive_title, f.fuel_title, str.steering_title, sbi.engine, sbi.mileage, sbi.engine_no, sbi.chassis_no, sbi.registration_date, sbi.seats, sbi.doors, sbi.doors, sbi.price_usd, sfs.* from stock_list as sl JOIN stock_basic_info as sbi ON sl.id = sbi.stock_list_id JOIN makes as m ON sbi.make_id = m.id JOIN models as md ON sbi.model_id = md.id JOIN trims as t ON sbi.trim_id = t.id JOIN body_types as bt ON bt.id = sbi.body_type_id JOIN colors as ec ON ec.id = sbi.exterior_color_id JOIN colors as ic ON ic.id = sbi.interior_color_id JOIN transmissions as trans ON trans.id = sbi.transmission_id JOIN drives as d ON d.id = sbi.drive_id JOIN fuels as f ON f.id = sbi.fuel_id JOIN steering as str ON str.id = sbi.steering_id JOIN stock_features_specs as sfs ON sfs.stock_list_id = sl.id WHERE sl.active = 1 AND sl.id = ".$stockID."");
    
    while($row = mysqli_fetch_assoc($dataQuery)){
        $data['stk']          = $row['stk'];
        $data['mk']          = $row['mk'];
        $data['mdl']          = $row['mdl'];
        $data['trm']          = $row['trm'];
        $data['stock_title'] = $row['stock_title'];
        $data['make_title']  = $row['make_title'];
        $data['model_title'] = $row['model_title'];
        $data['trim_title']  = $row['trim_title'];
        $data['year']        = $row['year'];
        $data['body_type_title'] = $row['body_type_title'];
        $data['exterior_color'] = $row['exterior_color'];
        $data['interior_color'] = $row['interior_color'];
        $data['transmission_title'] = $row['transmission_title'];
        $data['drive_title'] = $row['drive_title'];
        $data['fuel_title'] = $row['fuel_title'];
        $data['steering_title'] = $row['steering_title'];
        $data['engine'] = $row['engine'];
        $data['mileage'] = $row['mileage'];
        $data['engine_no'] = $row['engine_no'];
        $data['chassis_no'] = $row['chassis_no'];
        $data['registration_date'] = $row['registration_date'];
        $data['seats'] = $row['seats'];
        $data['doors'] = $row['doors'];
        $data['price_usd'] = $row['price_usd'];
        $data['specs']['power_doors'] = $row['power_doors'];
        $data['specs']['power_windows'] = $row['power_windows'];
        $data['specs']['abs'] = $row['abs'];
        $data['specs']['airbags'] = $row['airbags'];
        $data['specs']['key_less_entry'] = $row['key_less_entry'];
        $data['specs']['push_start'] = $row['push_start'];
        $data['specs']['leather_seats'] = $row['leather_seats'];
        $data['specs']['power_seats'] = $row['power_seats'];
        $data['specs']['audio_player'] = $row['audio_player'];
        $data['specs']['cd_player'] = $row['cd_player'];
        $data['specs']['android_player'] = $row['android_player'];
        $data['specs']['fm_radio'] = $row['fm_radio'];
        $data['specs']['sun_roof'] = $row['sun_roof'];
        $data['specs']['parking_sensors'] = $row['parking_sensors'];
        $data['specs']['auto_dimming'] = $row['auto_dimming'];
        $data['specs']['blind_spot_monitor'] = $row['blind_spot_monitor'];
        $data['specs']['360_camera'] = $row['360_camera'];
        $data['specs']['reverse_camera'] = $row['reverse_camera'];
        $data['specs']['cruise_control'] = $row['cruise_control'];
        $data['specs']['adaptive_cruise_control'] = $row['adaptive_cruise_control'];
        $data['specs']['traction_control'] = $row['traction_control'];
        $data['specs']['drl'] = $row['drl'];
        $data['specs']['fog_lamps'] = $row['fog_lamps'];
        $data['specs']['alloy_rims'] = $row['alloy_rims'];
    }
    
    return $data;
}

function getMakes(){
    global $conn;
    $data = array();
    $i = 0;
    $dataQuery = mysqli_query($conn, "SELECT * from makes WHERE active = 1");
    while($row = mysqli_fetch_assoc($dataQuery)){
        $data[$i]['id']         = $row['id'];
        $data[$i]['make_title'] = $row['make_title'];
        $data[$i]['active']     = $row['active'];
        $i++;
    }

    return $data;
}

function getModels(){
    global $conn;
    $data = array();
    $i = 0;
    $dataQuery = mysqli_query($conn, "SELECT * from models WHERE make_id = ".$_REQUEST['make_id']." AND  active = 1");
    while($row = mysqli_fetch_assoc($dataQuery)){
        $data[$i]['id']          = $row['id'];
        $data[$i]['make_id']     = $row['make_id'];
        $data[$i]['model_title'] = $row['model_title'];
        $data[$i]['active']      = $row['active'];
        $i++;
    }

    return $data;
}

function getTrims(){
    global $conn;
    $data = array();
    $i = 0;
    $dataQuery = mysqli_query($conn, "SELECT * from trims WHERE model_id = ".$_REQUEST['model_id']."");
    while($row = mysqli_fetch_assoc($dataQuery)){
        $data[$i]['id']         = $row['id'];
        $data[$i]['model_id']   = $row['model_id'];
        $data[$i]['trim_title'] = $row['trim_title'];
        $data[$i]['active']     = $row['active'];
        $i++;
    }
    return $data;
}

function getYears(){
    $years = range(1980,date("Y"));

    return $years;
}

function getBodies(){
    global $conn;
    $data = array();
    $i = 0;
    $dataQuery = mysqli_query($conn, "SELECT * from body_types");
    while($row = mysqli_fetch_assoc($dataQuery)){
        $data[$i]['id']         = $row['id'];
        $data[$i]['body_type_title'] = $row['body_type_title'];
        $i++;
    }
    return $data;
}

function getColors(){
    global $conn;
    $data = array();
    $i = 0;
    $dataQuery = mysqli_query($conn, "SELECT id, color_title, color_type_id from colors");
    while($row = mysqli_fetch_assoc($dataQuery)){
        if ($row['color_type_id'] == 1) {
            $data['exterior'][$i]['id']         = $row['id'];
            $data['exterior'][$i]['color_title'] = $row['color_title'];
        }else{
            $data['interior'][$i]['id']         = $row['id'];
            $data['interior'][$i]['color_title'] = $row['color_title'];
        }
        $i++;
    }
    return $data;
}

function getTransmissions(){
    global $conn;
    $data = array();
    $i = 0;
    $dataQuery = mysqli_query($conn, "SELECT * from transmissions");
    while($row = mysqli_fetch_assoc($dataQuery)){
        $data[$i]['id']                 = $row['id'];
        $data[$i]['transmission_title'] = $row['transmission_title'];
        $i++;
    }
    return $data;
}

function getDrives(){
    global $conn;
    $data = array();
    $i = 0;
    $dataQuery = mysqli_query($conn, "SELECT * from drives");
    while($row = mysqli_fetch_assoc($dataQuery)){
        $data[$i]['id']          = $row['id'];
        $data[$i]['drive_title'] = $row['drive_title'];
        $i++;
    }
    return $data;
}

function getFuels(){
    global $conn;
    $data = array();
    $i = 0;
    $dataQuery = mysqli_query($conn, "SELECT * from fuels");
    while($row = mysqli_fetch_assoc($dataQuery)){
        $data[$i]['id']                 = $row['id'];
        $data[$i]['fuel_title'] = $row['fuel_title'];
        $i++;
    }
    return $data;
}

function getSteerings(){
    global $conn;
    $data = array();
    $i = 0;
    $dataQuery = mysqli_query($conn, "SELECT * from steering");
    while($row = mysqli_fetch_assoc($dataQuery)){
        $data[$i]['id']                 = $row['id'];
        $data[$i]['steering_title'] = $row['steering_title'];
        $i++;
    }
    return $data;
}

?>