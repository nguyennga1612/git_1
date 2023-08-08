<?php $this->view("admin/layouts/main", $data) ?>
<div class="app-container">
    <!-- begin app-nabar -->
    
    <!-- end app-navbar -->
    <!-- begin app-main -->
    <div class="app-main" id="main">
        <!-- begin container-fluid -->
        <div class="container-fluid">
            <!-- begin row -->
            <div class="row">
                <div class="col-md-12 m-b-30">
                    <!-- begin page title -->
                    <div class="d-block d-sm-flex flex-nowrap align-items-center">
                        <div class="page-title mb-2 mb-sm-0">
                            <h1>List order</h1>
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
                                    <li class="breadcrumb-item active text-primary" aria-current="page">Order Management</li>
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
                    <div class="row">
                        <div class="col-lg-8">

                        </div>
                        <div class="col-lg-4" align="right">
                            <a href="<?php echo ROOT?>admin_order/add_order" class="btn btn-primary" style="margin-bottom:20px;">Add order</a>
                        </div>

                    </div>

                    <div class="card card-statistics">
                        <div class="card-body">
                            <div class="datatable-wrapper table-responsive">
                                <table class="display compact table table-striped table-bordered" style="text-align:center; color:black">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Code orders</th>
                                            <th>Customer name</th>
                                            <th>Phone</th>
                                            <th>Order date</th>
                                            <th>Status</th>
                                            <th>View</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $stt = 0; ?>
                                        <?php foreach($data['order'] as $order): ?>
                                            <tr>
                                                <td><?=$stt+1?></td>
                                                <td><?=$order['code_orders']?></td>
                                                <td><?=$order['name']?></td>
                                                <td><?=$order['phone']?></td>
                                                <td><?=$order['order_date'] ?></td>
                                                <td>
                                                    <?php if($order['status']==0): ?>
                                                        Waiting for progressing
                                                    <?php elseif($order['status']==1): ?>
                                                        Delivering
                                                    <?php elseif($order['status']==2): ?>
                                                        Delivered
                                                    <?php elseif($order['status']==3): ?>
                                                        Returns
                                                    <?php endif; ?>
                                                </td>
                                                <td><a href="<?php echo  ROOT ?>admin_order/view_order/<?=$order['code_orders'] ?>"><i class="fa fa-eye" style="font-size:20px;color:#0033FF"></i></a></td>
                                                <td><a href="<?php echo ROOT?>admin_order/edit_order/<?=$order['code_orders'] ?>"><i class="fa fa-edit" style="font-size:20px;color:#0033FF"></i></a></td>
                                                <td><a onclick="return confirm('Bạn có chắc muốn xóa đơn hàng này ?')" href="<?php echo ROOT?>/admin_order/delete_order/<?=$order['code_orders']?>"><i class="fa fa-trash" style="font-size:20px;color:#FF3333; cursor: pointer;"></i></a></td>
                                            </tr>
                                            <?php $stt = $stt + 1; ?>
                                        <?php endforeach; ?>
                                       
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
<!-- plugins -->
<script src="<?php echo  ROOT ?>assets/admin/js/vendors.js"></script>

<!-- custom app -->
<script src="<?php echo  ROOT ?>assets/admin/js/app.js"></script>
</body>


</html>