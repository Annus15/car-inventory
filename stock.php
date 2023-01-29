<?php
    include('connection.php');
    include('header.php');

    $getMakes = getMakes();
    $getYears = getYears();
    $getBodies = getBodies();
    $getColors = getColors();
    $getTransmissions = getTransmissions();
    $getDrives = getDrives();
    $getFuels = getFuels();
    $getSteerings = getSteerings();
    $fieldname = 'create';
    $make_id = '';
    $model_id = '';
    $trim_id = '';
    if(isset($_GET['update'])){
        $stockID = $_GET['update'];
        $getStock = getStockById($stockID);
        $fieldname = 'update';
        $make_id = $getStock['mk'];
        $model_id = $getStock['mdl'];
        $trim_id = $getStock['trm'];
?>
<script>
    
    $(document).ready(function(){
        var make_id = '';
        var model_id = '';
        var trim_id = '';
        var selected = '';
        
        make_id = "<?php echo $make_id; ?>";
        model_id = "<?php echo $model_id; ?>";
        trim_id = "<?php echo $trim_id; ?>";
        selected = '';
        if(getModel(make_id, model_id) == 1){
            getTrim(model_id, trim_id);
        }
    });
</script>
<?php
    }
?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 m-1">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Add Stock</h4>
        </div>
        <div class="card-body">
            <!-- <h5 class="card-title"><img style="height:40px; margin-top: 40px;" src="/images/ads-alert-dark.png"></h5> -->
            <form action="scripts.php" name="ajax_form" id="ajax_form" method="post" class="form-horizontal">
                <input type="hidden" name="stock_id" value="<?= (isset($stockID))? $stockID : '' ?>" />
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Title</label>
                                <input type="text" name="stock_title" class="form-control form-control-md" value="<?= (!empty($getStock['stock_title']))? $getStock['stock_title']:'' ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Make</label>
                                <select class="form-control select2 form-control-sm stock_make" name="stock_make">
                                    <option>Select Make</option>
                                    <?php
                                        foreach ($getMakes as $key => $make) { 
                                            if (!empty($getStock['mk']) && $getStock['mk'] == $make['id']) {
                                                $selected = 'selected';
                                            }
                                            else{
                                                $selected = '';
                                            }
                                            ?>
                                            <option value="<?= $make['id'] ?>" <?= $selected ?>><?= $make['make_title'] ?></option>
                                    <?php    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Model</label>
                                <select class="form-control select2 form-control-sm stock_model" name="stock_model">
                                    <option>Select Model</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Trim</label>
                                <select class="form-control select2 form-control-sm stock_trim" name="stock_trim">
                                    <option value="">Select Trim</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Year</label>
                                <select class="form-control select2 form-control-sm" name="stock_year">
                                    <option>Select Year</option>
                                    <?php foreach ($getYears as $key => $year) {   
                                        if (!empty($getStock['year']) && $getStock['year'] == $year) {
                                            $selected = 'selected';
                                        }
                                        else{
                                            $selected = '';
                                        }
                                        ?>
                                        <option value="<?= $year ?>" <?= $selected ?>><?= $year ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Body</label>
                                <select class="form-control select2 form-control-sm" name="stock_body">
                                    <option>Select Body</option>
                                    <?php foreach ($getBodies as $key => $body_type) {   
                                        if (!empty($getStock['body_type_title']) && $getStock['body_type_title'] == $body_type['body_type_title']) {
                                            $selected = 'selected';
                                        }
                                        else{
                                            $selected = '';
                                        }
                                        ?>
                                        <option value="<?= $body_type['id'] ?>" <?= $selected ?>><?= $body_type['body_type_title'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Extrerior Color</label>
                                <select class="form-control select2 form-control-sm" name="stock_exterior_color">
                                    <option>Select Extrerior Color</option>
                                    <?php foreach ($getColors['exterior'] as $key => $exterior_color) { 
                                        if (!empty($getStock['exterior_color']) && $getStock['exterior_color'] == $exterior_color['color_title']) {
                                            $selected = 'selected';
                                        }
                                        else{
                                            $selected = '';
                                        }
                                        ?>
                                        <option value="<?= $exterior_color['id'] ?>" <?= $selected ?>><?= $exterior_color['color_title'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Interior Color</label>
                                <select class="form-control select2 form-control-sm" name="stock_interior_color">
                                    <option>Select Interior Color</option>
                                    <?php foreach ($getColors['interior'] as $key => $interior_color) {
                                        if (!empty($getStock['interior_color']) && $getStock['interior_color'] == $interior_color['color_title']) {
                                            $selected = 'selected';
                                        }
                                        else{
                                            $selected = '';
                                        }
                                        ?>
                                        <option value="<?= $interior_color['id'] ?>" <?= $selected ?>><?= $interior_color['color_title'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Transmission</label>
                                <select class="form-control select2 form-control-sm" name="stock_transmission">
                                    <option>Select Transmission</option>
                                    <?php foreach ($getTransmissions as $key => $transmission) {
                                        if (!empty($getStock['transmission_title']) && $getStock['transmission_title'] == $transmission['transmission_title']) {
                                            $selected = 'selected';
                                        }
                                        else{
                                            $selected = '';
                                        }
                                        ?>
                                        <option value="<?= $transmission['id'] ?>" <?= $selected ?>><?= $transmission['transmission_title'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Drive</label>
                                <select class="form-control select2 form-control-sm" name="stock_drive">
                                    <option>Select Drive</option>
                                    <?php foreach ($getDrives as $key => $drive) {
                                        if (!empty($getStock['drive_title']) && $getStock['drive_title'] == $drive['drive_title']) {
                                            $selected = 'selected';
                                        }
                                        else{
                                            $selected = '';
                                        }
                                        ?>
                                        <option value="<?= $drive['id'] ?>" <?= $selected ?>><?= $drive['drive_title'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Fuel</label>
                                <select class="form-control select2 form-control-sm" name="stock_fuel">
                                    <option>Select Fuel</option>
                                    <?php foreach ($getFuels as $key => $fuel) {  
                                        if (!empty($getStock['fuel_title']) && $getStock['fuel_title'] == $fuel['fuel_title']) {
                                            $selected = 'selected';
                                        }
                                        else{
                                            $selected = '';
                                        }
                                        ?>
                                        <option value="<?= $fuel['id'] ?>" <?= $selected ?>><?= $fuel['fuel_title'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Engine .cc</label>
                                <input type="number" name="stock_engine_size"  class="form-control form-control-sm" value="<?= (!empty($getStock['engine']))? $getStock['engine']:'' ?>"  />
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Mileage .km</label>
                                <input type="number" name="stock_mileage"  class="form-control form-control-sm" value="<?= (!empty($getStock['mileage']))? $getStock['mileage']:'' ?>" />
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Engine #</label>
                                <input type="text" name="stock_engine_no"  class="form-control form-control-sm" value="<?= (!empty($getStock['engine_no']))? $getStock['engine_no']:'' ?>" />
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Chassis #</label>
                                <input type="text" name="stock_chassis_no"  class="form-control form-control-sm" value="<?= (!empty($getStock['chassis_no']))? $getStock['chassis_no']:'' ?>" />
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Registration Date</label>
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input type="text" class="form-control form-control-sm datetimepicker-input" name="stock_regirtaton_date" data-target="#reservationdate" value="<?= (!empty($getStock['registration_date']))? $getStock['registration_date']:'' ?>" />
                                    
                                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        
                                    </div>
                                    <p>(YYYY-MM-DD)</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Seats</label>
                                <input type="number" name="stock_seats"  class="form-control form-control-sm" value="<?= (!empty($getStock['seats']))? $getStock['seats']:'' ?>" />
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Doors</label>
                                <input type="number" name="stock_doors"  class="form-control form-control-sm" value="<?= (!empty($getStock['doors']))? $getStock['doors']:'' ?>" />
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Steering</label>
                                <select class="form-control select2 form-control-sm" name="stock_steering">
                                    <option>Select Steering</option>
                                    <?php foreach ($getSteerings as $key => $steer) {  
                                        if (!empty($getStock['steering_title']) && $getStock['steering_title'] == $steer['steering_title']) {
                                            $selected = 'selected';
                                        }
                                        else{
                                            $selected = '';
                                        }
                                        ?>
                                        <option value="<?= $steer['id'] ?>" <?= $selected ?>><?= $steer['steering_title'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="form-control-label">Price (USD)</label>
                                <input type="number" name="stock_price_usd"  class="form-control form-control-sm" value="<?= (!empty($getStock['price_usd']))? $getStock['price_usd']:'' ?>" />
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <h5 class="form-control-label text-bold">Features & Specs</h5><hr>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12 m-1">
                            <div class="icheck-primary d-inline">
                                <?php
                                if (!empty($getStock['specs']['power_doors']) && $getStock['specs']['power_doors'] == 'on') {
                                    $selected = 'checked';
                                }
                                else{
                                    $selected = '';
                                }
                                ?>
                                <input type="checkbox" name="power_doors" id="checkboxPrimary1"  <?= $selected ?>/>
                                <label for="checkboxPrimary1">
                                    Power Door Locks
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12 m-1">
                            <div class="icheck-primary d-inline">
                                <?php
                                if (!empty($getStock['specs']['power_windows']) && $getStock['specs']['power_windows'] == 'on') {
                                    $selected = 'checked';
                                }
                                else{
                                    $selected = '';
                                }
                                ?>
                                <input type="checkbox" name="power_windows" id="checkboxPrimary2"  <?= $selected ?>/>
                                <label for="checkboxPrimary2">
                                    Airbags
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12 m-1">
                            <div class="icheck-primary d-inline">
                                <?php
                                if (!empty($getStock['specs']['abs']) && $getStock['specs']['abs'] == 'on') {
                                    $selected = 'checked';
                                }
                                else{
                                    $selected = '';
                                }
                                ?>
                                <input type="checkbox" name="abs" id="checkboxPrimary3"  <?= $selected ?>/>
                                <label for="checkboxPrimary3">
                                    ABS
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12 m-1">
                            <div class="icheck-primary d-inline">
                                <?php
                                if (!empty($getStock['specs']['airbags']) && $getStock['specs']['airbags'] == 'on') {
                                    $selected = 'checked';
                                }
                                else{
                                    $selected = '';
                                }
                                ?>
                                <input type="checkbox" name="airbags" id="checkboxPrimary4"  <?= $selected ?>/>
                                <label for="checkboxPrimary4">
                                    Power Windows
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12 m-1">
                            <div class="icheck-primary d-inline">
                                <?php
                                if (!empty($getStock['specs']['key_less_entry']) && $getStock['specs']['key_less_entry'] == 'on') {
                                    $selected = 'checked';
                                }
                                else{
                                    $selected = '';
                                }
                                ?>
                                <input type="checkbox" name="key_less_entry" id="checkboxPrimary5"  <?= $selected ?>/>
                                <label for="checkboxPrimary5">
                                    Key Less Entry
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12 m-1">
                            <div class="icheck-primary d-inline">
                                <?php
                                if (!empty($getStock['specs']['push_start']) && $getStock['specs']['push_start'] == 'on') {
                                    $selected = 'checked';
                                }
                                else{
                                    $selected = '';
                                }
                                ?>
                                <input type="checkbox" name="push_start" id="checkboxPrimary6"  <?= $selected ?>/>
                                <label for="checkboxPrimary6">
                                    Push Start
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12 m-1">
                            <div class="icheck-primary d-inline">
                                <?php
                                if (!empty($getStock['specs']['leather_seats']) && $getStock['specs']['leather_seats'] == 'on') {
                                    $selected = 'checked';
                                }
                                else{
                                    $selected = '';
                                }
                                ?>
                                <input type="checkbox" name="leather_seats" id="checkboxPrimary7"  <?= $selected ?>/>
                                <label for="checkboxPrimary7">
                                    Leather Seats
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12 m-1">
                            <div class="icheck-primary d-inline">
                                <?php
                                if (!empty($getStock['specs']['power_seats']) && $getStock['specs']['power_seats'] == 'on') {
                                    $selected = 'checked';
                                }
                                else{
                                    $selected = '';
                                }
                                ?>
                                <input type="checkbox" name="power_seats" id="checkboxPrimary8"  <?= $selected ?>/>
                                <label for="checkboxPrimary8">
                                    Power Seats
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12 m-1">
                            <div class="icheck-primary d-inline">
                                <?php
                                if (!empty($getStock['specs']['audio_player']) && $getStock['specs']['audio_player'] == 'on') {
                                    $selected = 'checked';
                                }
                                else{
                                    $selected = '';
                                }
                                ?>
                                <input type="checkbox" name="audio_player" id="checkboxPrimary9"  <?= $selected ?>/>
                                <label for="checkboxPrimary9">
                                    Audio Player
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12 m-1">
                            <div class="icheck-primary d-inline">
                                <?php
                                if (!empty($getStock['specs']['cd_player']) && $getStock['specs']['cd_player'] == 'on') {
                                    $selected = 'checked';
                                }
                                else{
                                    $selected = '';
                                }
                                ?>
                                <input type="checkbox" name="cd_player" id="checkboxPrimary10"  <?= $selected ?>/>
                                <label for="checkboxPrimary10">
                                    Android Player
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12 m-1">
                            <div class="icheck-primary d-inline">
                                <?php
                                if (!empty($getStock['specs']['android_player']) && $getStock['specs']['android_player'] == 'on') {
                                    $selected = 'checked';
                                }
                                else{
                                    $selected = '';
                                }
                                ?>
                                <input type="checkbox" name="android_player" id="checkboxPrimary11"  <?= $selected ?>/>
                                <label for="checkboxPrimary11">
                                    CD Player
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12 m-1">
                            <div class="icheck-primary d-inline">
                                <?php
                                if (!empty($getStock['specs']['fm_radio']) && $getStock['specs']['fm_radio'] == 'on') {
                                    $selected = 'checked';
                                }
                                else{
                                    $selected = '';
                                }
                                ?>
                                <input type="checkbox" name="fm_radio" id="checkboxPrimary12"  <?= $selected ?>/>
                                <label for="checkboxPrimary12">
                                    AM/FM Radio
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12 m-1">
                            <div class="icheck-primary d-inline">
                                <?php
                                if (!empty($getStock['specs']['sun_roof']) && $getStock['specs']['sun_roof'] == 'on') {
                                    $selected = 'checked';
                                }
                                else{
                                    $selected = '';
                                }
                                ?>
                                <input type="checkbox" name="sun_roof" id="checkboxPrimary13"  <?= $selected ?>/>
                                <label for="checkboxPrimary13">
                                    Sun Roof
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12 m-1">
                            <div class="icheck-primary d-inline">
                                <?php
                                if (!empty($getStock['specs']['parking_sensors']) && $getStock['specs']['parking_sensors'] == 'on') {
                                    $selected = 'checked';
                                }
                                else{
                                    $selected = '';
                                }
                                ?>
                                <input type="checkbox" name="parking_sensors" id="checkboxPrimary14"  <?= $selected ?>/>
                                <label for="checkboxPrimary14">
                                    Parking Sensors
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12 m-1">
                            <div class="icheck-primary d-inline">
                                <?php
                                if (!empty($getStock['specs']['auto_dimming']) && $getStock['specs']['auto_dimming'] == 'on') {
                                    $selected = 'checked';
                                }
                                else{
                                    $selected = '';
                                }
                                ?>
                                <input type="checkbox" name="auto_dimming" id="checkboxPrimary15"  <?= $selected ?>/>
                                <label for="checkboxPrimary15">
                                    Auto Dimming
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12 m-1">
                            <div class="icheck-primary d-inline">
                                <?php
                                if (!empty($getStock['specs']['blind_spot_monitor']) && $getStock['specs']['blind_spot_monitor'] == 'on') {
                                    $selected = 'checked';
                                }
                                else{
                                    $selected = '';
                                }
                                ?>
                                <input type="checkbox" name="blind_spot_monitor" id="checkboxPrimary16"  <?= $selected ?>/>
                                <label for="checkboxPrimary16">
                                    Blind Spot
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12 m-1">
                            <div class="icheck-primary d-inline">
                                <?php
                                if (!empty($getStock['specs']['360_camera']) && $getStock['specs']['360_camera'] == 'on') {
                                    $selected = 'checked';
                                }
                                else{
                                    $selected = '';
                                }
                                ?>
                                <input type="checkbox" name="360_camera" id="checkboxPrimary17"  <?= $selected ?>/>
                                <label for="checkboxPrimary17">
                                    360 Camera
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12 m-1">
                            <div class="icheck-primary d-inline">
                                <?php
                                if (!empty($getStock['specs']['reverse_camera']) && $getStock['specs']['reverse_camera'] == 'on') {
                                    $selected = 'checked';
                                }
                                else{
                                    $selected = '';
                                }
                                ?>
                                <input type="checkbox" name="reverse_camera" id="checkboxPrimary19"  <?= $selected ?>/>
                                <label for="checkboxPrimary19">
                                    Reverse Camera
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12 m-1">
                            <div class="icheck-primary d-inline">
                                <?php
                                if (!empty($getStock['specs']['cruise_control']) && $getStock['specs']['cruise_control'] == 'on') {
                                    $selected = 'checked';
                                }
                                else{
                                    $selected = '';
                                }
                                ?>
                                <input type="checkbox" name="cruise_control" id="checkboxPrimary20"  <?= $selected ?>/>
                                <label for="checkboxPrimary20">
                                    Cruise Control
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12 m-1">
                            <div class="icheck-primary d-inline">
                                <?php
                                if (!empty($getStock['specs']['adaptive_cruise_control']) && $getStock['specs']['adaptive_cruise_control'] == 'on') {
                                    $selected = 'checked';
                                }
                                else{
                                    $selected = '';
                                }
                                ?>
                                <input type="checkbox" name="adaptive_cruise_control" id="checkboxPrimary21"  <?= $selected ?>/>
                                <label for="checkboxPrimary21">
                                    Adaptive Cruise
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12 m-1">
                            <div class="icheck-primary d-inline">
                                <?php
                                if (!empty($getStock['specs']['traction_control']) && $getStock['specs']['traction_control'] == 'on') {
                                    $selected = 'checked';
                                }
                                else{
                                    $selected = '';
                                }
                                ?>
                                <input type="checkbox" name="traction_control" id="checkboxPrimary22"  <?= $selected ?>/>
                                <label for="checkboxPrimary22">
                                    Traction Control
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12 m-1">
                            <div class="icheck-primary d-inline">
                                <?php
                                if (!empty($getStock['specs']['drl']) && $getStock['specs']['drl'] == 'on') {
                                    $selected = 'checked';
                                }
                                else{
                                    $selected = '';
                                }
                                ?>
                                <input type="checkbox" name="drl" id="checkboxPrimary23"  <?= $selected ?>/>
                                <label for="checkboxPrimary23">
                                    DRLs
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12 m-1">
                            <div class="icheck-primary d-inline">
                                <?php
                                if (!empty($getStock['specs']['fog_lamps']) && $getStock['specs']['fog_lamps'] == 'on') {
                                    $selected = 'checked';
                                }
                                else{
                                    $selected = '';
                                }
                                ?>
                                <input type="checkbox" name="fog_lamps" id="checkboxPrimary24"  <?= $selected ?>/>
                                <label for="checkboxPrimary24">
                                    Fog Lamps
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12 m-1">
                            <div class="icheck-primary d-inline">
                                <?php
                                if (!empty($getStock['specs']['alloy_rims']) && $getStock['specs']['alloy_rims'] == 'on') {
                                    $selected = 'checked';
                                }
                                else{
                                    $selected = '';
                                }
                                ?>
                                <input type="checkbox" name="alloy_rims" id="checkboxPrimary25"  <?= $selected ?>/>
                                <label for="checkboxPrimary25">
                                    Alloy Rims
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-success btn-lg center" name="<?= $fieldname ?>" id="save_stock"><i class="fas fa-save"></i> <?= ucfirst($fieldname) ?></button>
                </div>
            </form>
        </div>
    </div>
</div>


   
<?php
    include('footer.php');
?>