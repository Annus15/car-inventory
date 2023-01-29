<?php
    include('connection.php');
    include('header.php');

    $getMakes = getMakes();
    $searchStockData = array();
    if (isset($_POST['searchStock'])) {
        $searchStockData = $_POST;
    }
    $searchStock = searchStock($searchStockData);


?>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 m-1">
        <br>
        <h4> Welcome to Carnama | Car Inventory Management System </h4> 
        <br>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Search Stock</h4>
            </div>
            <!-- /.card-header -->
            <form method="POST">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 offset-md-2">
                            <div class="form-group">
                                <label>Make</label>
                                <select class="form-control select2 stock_make" name="stock_make" id="make_id" style="width: 100%;">
                                    <option selected="selected" value="">Select Make</option>
                                    <?php foreach ($getMakes as $key => $make) {   ?>
                                        <option value="<?= $make['id'] ?>"><?= $make['make_title'] ?></option>
                                    <?php    } ?>
                                </select>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Model</label>
                                <select class="form-control select2 stock_model" name="stock_model" id="model_id" style="width: 100%;">
                                    <option selected="selected" value="">Select Model</option>
                                </select>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                    <!-- /.card-body -->
                <div class="card-footer text-center">
                    <button type="submit" name="searchStock" class="btn btn-md btn-primary search-btn">
                        <span class="spinner-border spinner-border-sm search-spinner d-none" role="status" aria-hidden="true"></span>
                        <i class="fa fa-search search-icon"></i>&nbsp;&nbsp;Search
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 m-1">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Stock List</h4>
            </div>
            <div class="card-body">

                <div class="table-responsive">

                    <table id="table-stock" class="table table-striped table-hover va-middle text-center">

                        <thead>
                            <tr>

                                <th>S.No.</th>
                                <th>Stock ID</th>
                                <th>Stock Title</th>
                                <th>Stock Make</th>
                                <th>Stock Model</th>
                                <th>Stock Trim</th>
                                <th>Year</th>
                                <th>Actions</th>

                            </tr>
                        </thead>

                        <tbody>
                        <?php
                            if (!empty($searchStock)) {
                                $i = 1;
                                foreach ($searchStock as $key => $stock) {   ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td>STK-00<?= $stock['id'] ?></td>
                                    <td><?= $stock['stock_title'] ?></td>
                                    <td><?= $stock['make_title'] ?></td>
                                    <td><?= $stock['model_title'] ?></td>
                                    <td><?= $stock['trim_title'] ?></td>
                                    <td><?= $stock['year'] ?></td>
                                    <td class="align-middle">
                                        <div class="btn-group">
                                            <a class="btn btn-info" href="view.php?stock_id=<?= $stock['id'] ?>"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-primary" href="stock.php?update=<?= $stock['id'] ?>"><i class="fa fa-edit"></i></a>
                                            <a class="btn btn-danger" href="delete.php?stock_id=<?= $stock['id'] ?>"><i class="fa fa-trash"></i></a>
                                        </div>              
                                    </td>
                                </tr>
                            <?php
                                $i++;
                                }  
                            }
                            else{ ?>
                                <tr>
                                    <td colspan="8"><strong>No Records Found</strong></td>
                                </tr>
                        <?php    }
                        ?>
                        </tbody>
                    </table>

                </div>

            </div>

        </div>

    </div>
   
<?php
    include('footer.php');
?>

