<?php
use app\config\DB;
class product
{
    public function all()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM products');
        $list = $req->fetchAll();
        return $list;
    }
    public function get_id_product($post)
    {
        $list = [];
        $id = $post['id'];
        $quantity = $post['value'];
        $sql = 'SELECT price *:value as total, product_id, name, image, :value as value, 
        quantity, price FROM products WHERE product_id  =:id';
        $db = DB::getInstance();
        $statement = $db->prepare($sql);
        $statement->execute([
            ':id' => $id,
            ':value' => $quantity,
        ]);
        $list = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $list;
    }
    public function get_product($id)
    {
        $list = [];
        $sql = 'SELECT * FROM products
        WHERE products.product_id NOT IN 
        (SELECT order_detail.product_id
        FROM order_detail
        WHERE order_detail.code_orders =:id)';
        $db = DB::getInstance();
        $statement = $db->prepare($sql);
        $statement->execute([
            ':id' => $id
        ]);
        $list = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $list;
    }

}
?>