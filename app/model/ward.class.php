<?php
use app\config\DB;
class ward
{
    static function get_id_ward($post)
    {
        $list = [];
        $id = $post['district'];
        $sql = 'SELECT * FROM ward WHERE district_id  =:district';
        $db = DB::getInstance();
        $statement = $db->prepare($sql);
        $statement->execute([
            ':district' => $id
        ]);
        $list = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $list;
    }
}
?>