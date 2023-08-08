<?php
use app\config\DB;
class order_detail
{
    public function create_order_detail($post)
    {
        $code_orders =  $_SESSION['code_orders'];
        $b = array_intersect_key($post['quantity'], $post['id']);
        $a = $post['id'];
        $data2 = [];
        foreach(array_keys($a) as $i) {
            echo $c = $code_orders.' '.$a[$i].' '.$b[$i];
            $data2[] = explode(" ",$c);
        }
        $sql = "INSERT INTO order_detail(code_orders, product_id , quantity)
        VALUES (?, ? , ?)";
        $db = DB::getInstance();
        $stmt=  $db->prepare($sql);
        foreach($data2 as $row){
            $stmt->execute($row); 
        }
        if($stmt)
        {
            $_SESSION['success'] = 'Order creation successful';
            return true;
        }
    }
    public function create_order_detail_new($post, $id)
    {
        $code_orders =  $id;
        $b = array_intersect_key($post['quantity'], $post['id']);
        $a = $post['id'];
        $data2 = [];
        foreach(array_keys($a) as $i) {
            echo $c = $code_orders.' '.$a[$i].' '.$b[$i];
            $data2[] = explode(" ",$c);
        }
        $sql = "INSERT INTO order_detail(code_orders, product_id , quantity)
        VALUES (?, ? , ?)";
        $db = DB::getInstance();
        $stmt=  $db->prepare($sql);
        foreach($data2 as $row){
            $stmt->execute($row); 
        }
        if($stmt)
        {
            header("Location: " . ROOT . "admin_order/edit_order/$id");
        }
    }
    public function get_order_detail($id)
    {
        $list = [];
        $sql = 'SELECT * FROM order_detail JOIN products
        ON products.product_id  = order_detail.product_id 
        WHERE order_detail.code_orders =:id';
        $db = DB::getInstance();
        $statement = $db->prepare($sql);
        $statement->execute([
            ':id' => $id
        ]);
        $list = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $list;
    }
    public function delete_order_detail($id)
    {
        $sql = 'DELETE FROM order_detail WHERE code_orders =:id';
        $db = DB::getInstance();
        $statement = $db->prepare($sql);
        $a = $statement->execute([
            ':id' => $id
        ]);
        if($a)
        {
            return true;
        }
    }
}
?>