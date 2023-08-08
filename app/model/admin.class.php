<?php
use app\config\DB;
class admin
{
    private $admin = "admin";
    public function login($table_admin,$username,$password)
    {
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM admin WHERE name = '$username' AND password = '$password' ");
        return $req->rowCount();
    }
    public function getLogin($table_admin,$username,$password)
    {
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM admin WHERE name = '$username' AND password = '$password' ");
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>