<?php $this->view("admin/layouts/main", $data);
?>
<style>
    .button {
        background-color: red;
        /* Green */
        border: none;
        color: white;
        padding: 10px 70px;
        text-align: center;
        text-decoration: none;

        font-size: 15px;
        margin: 4px 2px;
        transition-duration: 0.4s;
        cursor: pointer;
    }

    .button4 {
        background-color: white;
        color: black;
        border: 2px solid #e7e7e7;
    }

    .button4:hover {
        background-color: #e7e7e7;
    }
</style>

<div class="app-main" id="main">
    <!-- begin container-fluid -->
    <div class="container-fluid">
        <!-- begin row -->
        <div class="row">
            <div class="col-md-12 m-b-30">
                <!-- begin page title -->
                <div class="d-block d-sm-flex flex-nowrap align-items-center">
                    <div class="page-title mb-2 mb-sm-0">
                        <!-- <h1>Validation</h1> -->
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
                                <li class="breadcrumb-item active text-primary" aria-current="page">Add order</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- end page title -->
            </div>
        </div>
        <!-- end row -->
        <!-- start Validation row -->
        <?php
        if(!empty($data['error']))
        {
        ?>
        <div class="row formavlidation-wrapper" style="margin-bottom: 10px;">
            <div class="col-xl-1"></div>
            <div class="col-xl-10">
                <div class="alert alert-danger" role="alert">
                    <?php
                        echo $data['error'];
                    ?>
                </div>
            </div>
            <div class="col-xl-1"></div>
        </div>
        <?php
        }
        ?>
        <div class="row formavlidation-wrapper">

            <div class="col-xl-1"></div>
            <div class="col-xl-10">
                <div class="card card-statistics">
                    <div class="card-header">
                        <div class="card-heading">
                            <h4 class="card-title">Customer Information</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <input type="hidden" value="<?php echo ROOT ?>" class="form-control" id='root'>
                            <div class="form-group row">
                                <input type="hidden" value="<?php echo ROOT ?>" id='root'>
                                <label class="col-sm-2 col-form-label"> Customer name</label>
                                <div class="col-sm-10">
                                    <select class="js-basic-single form-control" style="color:black;" name="customer" id="customer">
                                        <option value="<?php echo  $data['order'][0]['id'] ?>"><?php echo  $data['order'][0]['name'] ?></option>
                                        <?php
                                        foreach ($data['user'] as $user) :
                                            echo '<option value="' . $user['custormer_id'] . '">' . $user['name'] . '</option>';
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Province</label>
                                <div class="col-sm-10">
                                    <select class="js-basic-single form-control" style="color:black;" name="province" id="province">
                                        <option value="<?php echo  $data['order'][0]['id2'] ?>"><?php echo  $data['order'][0]['name2'] ?></option>
                                        <?php
                                        foreach ($data['province'] as $province) :
                                            echo '<option value="' . $province['province_id'] . '">' . $province['_name'] . '</option>';
                                        endforeach;
                                        ?>
                                    </select>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">District</label>
                                <div class="col-sm-10">
                                    <select class="js-basic-single form-control" style="color:black;" name="district" id="district">
                                        <option value="<?php echo  $data['order'][0]['id3'] ?>"><?php echo  $data['order'][0]['name3'] ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Ward</label>
                                <div class="col-sm-10">
                                    <select class="js-basic-single form-control" style="color:black;" name="ward" id="ward">
                                        <option value="<?php echo  $data['order'][0]['id4'] ?>"><?php echo  $data['order'][0]['name4'] ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <input type="text" value="<?php echo  $data['order'][0]['address_detail'] ?>" class="form-control" id="address" name="address" placeholder="House number, street...." />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    <input type="number" value="<?php echo  $data['order'][0]['phone'] ?>" class="form-control" id="phone" name="phone" placeholder="Phone" />
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-1"></div>
        </div>
        <div class="row formavlidation-wrapper" style="margin-top:-20px;">
            <div class="col-xl-1"></div>
            <div class="col-xl-10">
                <div class="card card-statistics">
                    <div class="card-header">
                        <div class="card-heading">
                            <h4 class="card-title">Products</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">Choose</th>
                                    <th scope="col">Products</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>

                                </tr>
                            </thead>
                            <tbody id='table_cart'>
                                <?php
                                foreach ($data['order_detail'] as $product) {
                                    echo '<tr id="total' . $product['product_id'] . '">
                                    <td><input type="checkbox" name="id[' . $product['product_id'] . ']" value="' . $product['product_id'] . '" checked></td>
                                    <td style="display: flex; align-items: center; "><img src="' . ROOT . 'assets/admin/img/product/' . $product['image'] . '" width="100" height="100">
                                        <p>' . $product['name'] . '</p>
                                    </td>
                                    <td>' . $product['price'] . 'đ</td>
                                    <td><input type="number" class="form-control" value="' . $product['quantity'] . '" name="quantity[' . $product['product_id'] . ']" style="width: 50px;"></td>
                                </tr>';
                                }
                                if(!empty($data['$product']))
                                {
                                    foreach ($data['$product'] as $product) {
                                        echo '<tr id="total' . $product['product_id'] . '">
                                        <td><input type="checkbox" name="id[' . $product['product_id'] . ']" value="' . $product['product_id'] . '" ></td>
                                        <td style="display: flex; align-items: center; "><img src="' . ROOT . 'assets/admin/img/product/' . $product['image'] . '" width="100" height="100">
                                            <p>' . $product['name'] . '</p>
                                        </td>
                                        <td>' . $product['price'] . 'đ</td>
                                        <td><input type="number" class="form-control" value="1" name="quantity[' . $product['product_id'] . ']" style="width: 50px;"></td>
                                    </tr>';
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-1"></div>
        </div>
        <div class="row formavlidation-wrapper" style="margin-top:-20px;">
            <div class="col-xl-1"></div>
            <div class="col-xl-10">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Payment status</label>
                            <div class="col-sm-10">
                                <select class="js-basic-single form-control" style="color:black;" name="payment_status" id="payment_status">
                                   <?php
                                    if($data['order'][0]['payment_status'] == 0)
                                    {
                                        echo '<option value="0">Unpaid</option>';
                                    }
                                    else
                                    {
                                        echo '<option value="1">Paid</option>';
                                    }
                                   ?>
                                   <option value="0">Unpaid</option>
                                   <option value="1">Paid</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Delivery status</label>
                            <div class="col-sm-10">
                                <select class="js-basic-single form-control" style="color:black;" name="delivery_statusstatus" id="delivery_statusstatus">
                                <?php
                                  $favcolor = $data['order'][0]['status'];
                                    switch ($favcolor) {
                                    case 0:
                                        echo '<option value="0">Waiting for progressing</option>';
                                        break;
                                    case 1:
                                        echo '<option value="1">Delivering</option>';
                                        break;
                                    case 2:
                                        echo '<option value="2">Delivered</option>';
                                        break;
                                    case 3:
                                        echo '<option value="3">Returns</option>';
                                        break;   
                                    }
                                    ?>
                                    <option value="0">Waiting for progressing</option>
                                    <option value="1">Delivering</option>
                                    <option value="2">Delivered</option>
                                    <option value="3">Returns</option>
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                        <div class="card-heading" style="float: right;">
                            <button type="submit" id="submit" class="button button3">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
            <div class="col-xl-1"></div>
        </div>
        <!-- end Validation row  -->
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
<script>
    $(document).ready(function() {
        district();
        ward();
    });

    function district() {
        $(document).on('input', '#province', function() {
            var province = $('#province').val();
            var root = $('#root').val();
            $.ajax({
                url: root + 'ajax_address/get_district',
                method: "post",
                data: {
                    province: province
                },
                success: function(data) {
                    $('#ward').html('<option value="">--Ward--</option>');
                    $('#district').html(data);
                }
            });
        });
    }

    function ward() {
        var root = $('#root').val();
        $(document).on('input', '#district', function() {
            var district = $('#district').val();
            console.log(district);
            $.ajax({
                url: root + 'ajax_address/get_ward',
                method: "post",
                data: {
                    district: district
                },
                success: function(data) {
                    console.log(data);
                    $('#ward').html(data);
                }
            });
        });
    }
    
</script>
<!-- custom app -->
<script src="<?php echo  ROOT ?>assets/admin/js/app.js"></script>
</body>

</html>