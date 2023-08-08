<?php
use app\config\DB;
class province
{
    public function all()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM province');
        $list = $req->fetchAll();
        return $list;
    }
}
?>