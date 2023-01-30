<?php
session_start();
include ('app/common/db.php');
include ('app/model/admin.php');
$error_loginid = $error_password =$error= '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(empty($_POST['login_id'])){
        $error_loginid = "Hãy nhập login id";
    } 
    else if(strlen($_POST['login_id']) < 4){
        $error_loginid = "Login id ít nhất 4 ký tự";
    }
    else if(empty($_POST['password'])){
        $error_password = "Hãy nhập mật khẩu";
    }
    else if(strlen($_POST['password']) < 6){
        $error_password = "Password ít nhất 6 ký tự";
    }
    else{
        $loginid = $_POST['login_id'];
        $password = $_POST['password'];
        $admin = new Admin();
        $result = $admin->login($loginid, $password);
        if($result){
            $_SESSION['login_id'] = $loginid;
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = date('Y-m-d H:i:s');
            $_SESSION['login_time'] = $date;
            header('Location: app/controller/home.php');
        }
        else{
            $error = "login id hoặc mật khẩu không đúng";
        }
    }
}
include ('app/view/login.php');
?>