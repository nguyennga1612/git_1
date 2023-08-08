<?php
use app\config\DB;
class district
{
    static function get_id_district($post)
    {
        $list = [];
        $id = $post['province'];
        $sql = 'SELECT * FROM district WHERE province_id  =:province';
        $db = DB::getInstance();
        $statement = $db->prepare($sql);
        $statement->execute([
            ':province' => $id
        ]);
        $list = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $list;
    }
}
?>