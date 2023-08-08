<?php $this->view("admin/layouts/main", $data) ?>
<div class="app-main" id="main">
    <!-- begin container-fluid -->
    <div class="container-fluid">
        <!-- begin row -->
        <div class="row">
            <div class="col-md-12 m-b-30">
                <!-- begin page title -->
                <div class="d-block d-sm-flex flex-nowrap align-items-center">
                    <div class="page-title mb-2 mb-sm-0">
                        <h1>Information order</h1>
                    </div>
                    <div class="ml-auto d-flex align-items-center">
                        <nav>
                            <ol class="breadcrumb p-0 m-b-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html"><i class="ti ti-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    Dashboards
                                </li>
                                <li class="breadcrumb-item">
                                    Order Management
                                </li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">View</li>
                            </ol>
                        </nav>

                    </div>

                </div>

                <!-- end page title -->
            </div>
        </div>
        <!-- end row -->
        <!-- begin row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="datatable-wrapper table-responsive">
                        <?php foreach($data['order'] as $order_details): ?>
                                <h4>Code orders: <?=$order_details['code_orders']?></h4>
                                <h4>Customer name: <?=$order_details['name']?></h4>
                                <h4>Phone number: <?=$order_details['phone']?></h4>
                                <h4>Payments: Payment on delivery</h4>
                                <h4>Total: <span style="color:red"><?= $data['total'][0]['total']?> VND</span></h4>
                                <?php  $total= $order_details['total']?>
                            <?php endforeach; ?>
                            <table class="display compact table table-striped table-bordered" style="text-align:center; color:black">
                                <thead>
                                    <tr>
                                        <th>Province</th>
                                        <th>District</th>
                                        <th>Ward</th>
                                        <th>Address</th>
                                        <th>Status</th>

                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($data['address'] as $order_address): ?>
                                    <tr>
                                        <td><?=$order_address['nameProvince']?></td>
                                        <td><?=$order_address['nameDistrict']?></td>
                                        <td><?=$order_address['nameWard']?></td>
                                        <td><?=$order_address['address_detail']?></td>
                                        <td><b>
                                            <?php if($order_address['status']==0): ?>
                                                Waiting for progressing
                                            <?php elseif($order_address['status']==1): ?>
                                                Delivering
                                            <?php elseif($order_address['status']==2): ?>
                                                Delivered
                                            <?php elseif($order_address['status']==3): ?>
                                                Returns
                                            <?php endif; ?>
                                        </b></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <h3 style="text-align:center">Chi tiết đơn hàng</h3>
                    <div class="card-body">
                        <div class="datatable-wrapper table-responsive">
                            <table class="display compact table table-striped table-bordered" style="text-align:center; color:black">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>product</th>
                                        <th>Price</th>
                                        <th>Quantily</th>
                                        <th>Into money</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $stt = 0; ?>
                                    <?php foreach($data['order_details_product'] as $order_details_product):
                                        $price=$order_details_product['price']; $quantity=$order_details_product['quantity'];
                                        $intoMoney=$price*$quantity;
                                    ?>
                                        <tr>
                                            <td><?=$stt+1?></td>
                                            <td><?=$order_details_product['name']?></td>
                                            <td><?=number_format($price, 0, ",", ".")?> VND</td>
                                            <td><?=$quantity?></td>
                                            <td><?=number_format($intoMoney, 0, ",", ".")?> VND</td>
                                        </tr>
                                        <?php $stt = $stt + 1; ?>
                                    <?php endforeach; ?>
                                        <tr>
                                            <td colspan="5" style="text-align:left;font-size:15px;"><b>Total: </b><?= $data['total'][0]['total']?> VND</td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container-fluid -->
</div>
<!-- end app-main -->
</div>
<!-- end app-container -->
<!-- begin footer -->

<!-- end footer -->
</div>
<!-- end app-wrap -->
</div>
<!-- end app -->

<!-- plugins -->
<script src="<?php echo  ROOT ?>assets/admin/js/vendors.js"></script>

<!-- custom app -->
<script src="<?php echo  ROOT ?>assets/admin/js/app.js"></script>
</body>


</html>