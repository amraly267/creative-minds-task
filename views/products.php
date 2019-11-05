<?php
require_once 'layout/header.php';
require_once '../controllers/productsCtrl.php';

$productsObject = new productsCtrl();
$products = json_decode($productsObject->getTopProducts(), true);
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Products</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Top 10 Products</h3>
                            <br>
                            <div class="card-tools col-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control float-right dateRange" name="dateRange">
                                    <button class="btn btn-success submit">Apply</button>
                                </div>
                                <p class="text-danger dateErrorMsg"></p>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product ID</th>
                                    <th>Product Name</th>
                                    <th>Total Purchases</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $serial = 1;
                                foreach ($products as $product)
                                {
                                ?>
                                    <tr>
                                        <td><?php echo $serial++; ?></td>
                                        <td><?php echo $product['id']; ?></td>
                                        <td><?php echo $product['name']; ?></td>
                                        <td><?php echo $product['total_purchase']; ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                            <h5 class="card-title text-primary noResults"></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
require_once 'layout/footer.php';
?>
