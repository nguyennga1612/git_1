<?php
class home extends controller
{
    public function index()
    {
        $data['title'] = 'Dashboards';
        $this->view("admin/index", $data);
    }
}
?>