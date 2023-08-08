<?php
class ajax_address extends controller{
    public function get_district()
    {
        if(isset($_POST['province'])) {
            $district = $this->load_model('district');
            $datas = $district->get_id_district($_POST);
            echo '<option value="">-- Ditrict --</option>';
            foreach($datas as $data)
            {
               echo '<option value="'.$data['district_id'].'">'.$data['_prefix'].' '.$data['_name'].'</option>';
            } 
        }
    }
    public function get_ward()
    {
        if(isset($_POST['district'])) {
            $district = $this->load_model('ward');
            $datas = $district->get_id_ward($_POST);
            echo '<option value="">-- Ward --</option>';
            foreach($datas as $data)
            {
               echo '<option value="'.$data['ward_id'].'">'.$data['_prefix'].' '.$data['_name'].'</option>';
            } 
        }
    }
}
?>