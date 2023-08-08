<?php
use app\config\DB;
class user
{
    public function all()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM custormers ORDER BY custormer_id DESC');
        $list = $req->fetchAll();
        return $list;
    }
}
?>