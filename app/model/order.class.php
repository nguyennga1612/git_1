<?php
use app\config\DB;
class order
{
    public function create_order($post)
    {
        $customer = $post['customer'];
        $code_orders = rand(100,10000000);
        $_SESSION['code_orders'] = $code_orders;
        $province = $post['province'];
        $district = $post['district'];
        $ward = $post['ward'];
        $address = $post['address'];
        $phone = $post['phone'];
        $payment_status = $post['payment_status'];
        $delivery_statusstatus = $post['delivery_statusstatus'];

        $sql = 'INSERT INTO orders(code_orders, customer_id, phone, province_id, district_id, ward_id, address_detail, payment_status, status)
        VALUES (:code_orders, :customer, :phone, :province, :district, :ward, :address, :payment_status, :delivery_statusstatus)';
        $db = DB::getInstance();
        $statement = $db->prepare($sql);
        $a = $statement->execute([
            ':code_orders' => $code_orders,
            ':customer'  =>  $customer,
            ':province'  =>  $province,
            ':district' => $district,
            ':ward'  => $ward,
            ':address'  => $address,
            ':phone'  => $phone,
            ':payment_status'  => $payment_status,
            ':delivery_statusstatus'  => $delivery_statusstatus
        ]);
        if($a)
        {
            return true;
        }
    }
    public function get_order($id)
    {
        $list = [];
        $sql = 'SELECT custormers.name AS name, phone, address_detail,
        province._name AS name2, district._name AS name3, ward._name AS name4,
        payment_status, status, custormers.custormer_id as id,
        province.province_id as id2 , district.district_id as id3, 
        ward.ward_id as id4
        FROM orders 
        JOIN custormers ON custormers.custormer_id  = orders.customer_id 
        JOIN province ON province.province_id  = orders.province_id 
        JOIN district ON district.district_id  = orders.district_id 
        JOIN ward ON ward.ward_id  = orders.ward_id 
        WHERE orders.code_orders =:id';
        $db = DB::getInstance();
        $statement = $db->prepare($sql);
        $statement->execute([
            ':id' => $id
        ]);
        $list = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $list;
    }
    public function update_order($post, $id)
    {
        $customer = $post['customer'];
        $province = $post['province'];
        $district = $post['district'];
        $ward = $post['ward'];
        $address = $post['address'];
        $phone = $post['phone'];
        $payment_status = $post['payment_status'];
        $delivery_statusstatus = $post['delivery_statusstatus'];
        $sql = 'UPDATE orders set customer_id =:customer, phone =:phone,  province_id =:province, district_id =:district, ward_id = :ward, address_detail =:address,  payment_status =:payment_status, status =:delivery_statusstatus WHERE code_orders =:id';
        $db = DB::getInstance();
        $statement = $db->prepare($sql);
        $a = $statement->execute([
            ':id' => $id,
            ':customer'  =>  $customer,
            ':province'  =>  $province,
            ':district' => $district,
            ':ward'  => $ward,
            ':address'  => $address,
            ':phone'  => $phone,
            ':payment_status'  => $payment_status,
            ':delivery_statusstatus'  => $delivery_statusstatus
        ]);
        if($a)
        {
            header("Location: " . ROOT . "admin_order/edit_order/$id");
        }
    }
    public function all()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT orders.order_id,orders.code_orders,custormers.name,orders.total,orders.order_date, orders.status, orders.phone
        FROM orders, custormers WHERE custormers.custormer_id=orders.customer_id ORDER BY orders.order_id DESC');
        $list = $req->fetchAll();
        return $list;
    }
    public function allOrderDetails($order_id)
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->prepare('SELECT orders.order_id,orders.code_orders,custormers.name,orders.phone,orders.total,orders.order_date, orders.status FROM ecommerce.orders, ecommerce.custormers WHERE custormers.custormer_id=orders.customer_id and code_orders=:id;');
        $req->execute(array('id' => $order_id));
        $list = $req->fetchAll();
        return $list;
    }
    public function Address($order_id)
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->prepare('SELECT orders.status, province._name as nameProvince, district._name as nameDistrict, ward._name as nameWard, orders.address_detail
        FROM ecommerce.orders,ecommerce.province, ecommerce.district,ecommerce.ward
        WHERE orders.ward_id=ward.ward_id and ward.district_id=district.district_id and province.province_id=district.province_id and orders.code_orders=:id ;');
        $req->execute(array('id' => $order_id));
        $list = $req->fetchAll();
        return $list;
    }
    public function OrderDetailsProduct($order_id)
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->prepare('SELECT products.name, products.price,order_detail.quantity, orders.total
        FROM ecommerce.orders, ecommerce.order_detail, ecommerce.products
        WHERE  orders.code_orders=order_detail.code_orders and order_detail.product_id=products.product_id and orders.code_orders=:id ;');
        $req->execute(array('id' => $order_id));
        $list = $req->fetchAll();
        return $list;
    }
    public function DeleteOrder($code_orders){
        $db = DB::getInstance();
        $req = $db->prepare('DELETE orders, order_detail FROM orders INNER JOIN order_detail ON 
        order_detail.code_orders = orders.code_orders WHERE orders.code_orders=:id ;');
        $req->execute(array('id' => $code_orders));
        header("Location: " . ROOT . "admin_order/index");
    }
    public function select_total($id)
    {
        $sql = 'select SUM(quantity*price) as total FROM orders join order_detail 
        on orders.code_orders = order_detail.code_orders
        JOIN products ON products.product_id = order_detail.product_id
        where order_detail.code_orders =:code_orders';
        $db = DB::getInstance();
        $statement = $db->prepare($sql);
        $statement->execute([
            ':code_orders' => $id
        ]);
        $list = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $list;

    }
    
}
?>