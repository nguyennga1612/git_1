<?php
class admin_login extends controller
{
   public function dangnhap(){
       $username = $_POST['name'];
       $password = $_POST['password'];

       $table_admin = 'admin';
       $loginmodel = $this->load_model('admin');

       $count = $loginmodel->login($table_admin,$username,$password);

       if($count == 1){
        $result = $loginmodel->getLogin($table_admin,$username,$password);
           session_start();
           $_SESSION['AdminLoginId'] = $username;
           header("Location:" . ROOT . "/admin_login/login");
       }else{
            if($username == ''){
                $_SESSION['thongbao']="Chưa nhập username";
                header("Location:" . ROOT . "index");
            }else if($password == ''){
                $_SESSION['thongbao']="Chưa nhập password";
                header("Location:" . ROOT . "index");
            }
            else{
                $_SESSION['thongbao']="Tài khoản hoặc mật khẩu chưa đúng";
                header("Location:" . ROOT . "index");
            }
       }
    //    header("Location:" . ROOT . "index");
   }
    public function login()
    {
        $data['title'] = 'Home';
        $this->view("admin/home", $data);
    }
    public function index(){
        $data['title'] = 'Login';
        $this->view("admin/index", $data);
    }
}
?>