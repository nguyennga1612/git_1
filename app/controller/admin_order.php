<?php
class admin_order extends controller
{
    public function index()
    {
        $data['title'] = 'Order Management';
        $order = $this->load_model('order');
        $data['order'] = $order->all();
        $this->view("admin/order", $data);
    }
    public function add_order()
    {
        $data['title'] = 'Add order';
        $user = $this->load_model('user');
        $data['user'] = $user->all();
        $province = $this->load_model('province');
        $data['province'] = $province->all();
        $product = $this->load_model('product');
        $data['product'] = $product->all();
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(!isset($_POST['id']) || count($_POST['id'])< 1) {
                $data['error'] = 'Please select at least 1 choice';
            }
            elseif($_POST['customer'] == '' || $_POST['province']  == ""|| $_POST['district'] == ""|| $_POST['ward'] == ""||  $_POST['ward'] =="" ||  $_POST['address'] =="" ||  $_POST['address'] =="phone")
            {
                $data['error']= 'Please enter full information';
            }
            else
            {
                $order = $this->load_model("order");
                $success = $order->create_order($_POST);
                if($success == true)
                {
                    $order_detail = $this->load_model("order_detail");
                    $order_detail->create_order_detail($_POST);
    
                }   
            }
        }
        $this->view("admin/add_order", $data);
    }
    public function edit_order($id)
    {
        $data['title'] = 'Edit order';
        $province = $this->load_model('province');
        $data['province'] = $province->all();
        $user = $this->load_model('user');
        $data['user'] = $user->all();
        $order = $this->load_model("order");
        $data['order'] = $order->get_order($id);
        $order_detail = $this->load_model("order_detail");
        $data['order_detail'] = $order_detail->get_order_detail($id);
        $product = $this->load_model("product");
        $data['$product'] = $product->get_product($id);
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(!isset($_POST['id']) || count($_POST['id'])< 1) {
                $data['error'] = 'Please select at least 1 choice';
            }
            elseif($_POST['customer'] == '' || $_POST['province']  == ""|| $_POST['district'] == ""|| $_POST['ward'] == ""||  $_POST['ward'] =="" ||  $_POST['address'] =="" ||  $_POST['address'] =="phone")
            {
                $data['error']= 'Please enter full information';
            }
            else
            {
                $success = $order_detail->delete_order_detail($id);
                $order->update_order($_POST, $id);
                if($success == true)
                {
                    $order_detail->create_order_detail_new($_POST, $id);
                }
            }
        }
        $this->view("admin/edit_order", $data);
    }
    public function view_order($id)
    {
        $data['title'] = 'View order';
        $order = $this->load_model('order');
        $data['order'] = $order->allOrderDetails($id);
        $data['address'] = $order->Address($id);
        $data['order_details_product'] = $order->OrderDetailsProduct($id);
        $data['total'] = $order->select_total($id);
        $this->view("admin/view_order", $data);
    }
    public function delete_order($code_id){
        $data['title'] = 'Order Management';
        $order = $this->load_model('order');
        $data['order'] = $order->DeleteOrder($code_id);
        $this->view("admin/order", $data);

    }
}
?>