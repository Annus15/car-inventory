<?php
    include('connection.php');
    include('header.php');

    $stockID = $_GET['stock_id'];
    $getStock = getStockById($stockID);
    $stock = array('power_doors', 'power_windows', 'abs', 'airbags', 'key_less_entry', 'push_start', 'leather_seats', 'power_seats', 'audio_player', 'cd_player', 'android_player', 'fm_radio', 'sun_roof', 'parking_sensors', 'auto_dimming', 'blind_spot_monitor', '360_camera', 'reverse_camera', 'cruise_control', 'adaptive_cruise_control', 'traction_control', 'drl', 'fog_lamps', 'alloy_rims');
?>
<style>
    .container {
        max-width: 1400px !important;
    }
</style>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 m-1">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><?= $getStock['stock_title'] ?></h4>
            </div>
            <div class="card-body">
                <!-- <div class="table-responsive"> -->

                    <table id="table-stock" class="table table-striped table-bordered va-middle text-center">

                        <tbody>
                            <tr>
                                <th>Stock ID</th>
                                <td>STK-00<?= $getStock['id'] ?></td>
                                <th>Make</th>
                                <td><?= $getStock['make_title'] ?></td>
                                <th>Model</th>
                                <td><?= $getStock['model_title'] ?></td>
                                <th>Trim</th>
                                <td><?= $getStock['trim_title'] ?></td>
                                <th>Year</th>
                                <td><?= $getStock['year'] ?></td>
                            </tr>
                            </tr>
                                <th>Body Type</th>
                                <td><?= $getStock['body_type_title'] ?></td>
                                <th>Exterior Color</th>
                                <td><?= $getStock['exterior_color'] ?></td>
                                <th>Interior Color</th>
                                <td><?= $getStock['interior_color'] ?></td>
                                <th>Transmission</th>
                                <td><?= $getStock['transmission_title'] ?></td>
                                <th>Drive</th>
                                <td><?= $getStock['drive_title'] ?></td>
                            </tr>
                            <tr>
                                <th>Fuel</th>
                                <td><?= $getStock['fuel_title'] ?></td>
                                <th>Engine .cc</th>
                                <td><?= $getStock['engine'] ?></td>
                                <th>Mileage</th>
                                <td><?= $getStock['mileage'] ?></td>
                                <th>Engine #</th>
                                <td><?= $getStock['engine_no'] ?></td>
                                <th>Chassis #</th>
                                <td><?= $getStock['chassis_no'] ?></td>
                            </tr>
                            <tr>
                                <th>Registration</th>
                                <td><?= $getStock['registration_date'] ?></td>
                                <th>Seats</th>
                                <td><?= $getStock['seats'] ?></td>
                                <th>Doors</th>
                                <td><?= $getStock['doors'] ?></td>
                                <th>Steering</th>
                                <td><?= $getStock['steering_title'] ?></td>
                                <th>Price USD</th>
                                <td><?= $getStock['price_usd'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                <?php
                                    foreach ($getStock['specs'] as $key => $specs) { 
                                        $columns = str_replace('_',' ',$key);
                                        ?>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 float-left">
                                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 float-left">
                                                <?= ($specs == 'on')? '&#10004;':'&#x2717;' ?>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 float-left">
                                                <?= ucwords($columns) ?>
                                            </div>
                                        </div>

                                <?php    }
                                ?>
                        </div>
                    </div>

                <!-- </div> -->

            </div>

        </div>

    </div>

<?php
    include('footer.php');
?>
