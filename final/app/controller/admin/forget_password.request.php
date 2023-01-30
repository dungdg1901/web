<?php

include '../../common/db.php';
include '../../model/admin.php';

$err = "";
$micro="";

if(isset($_POST['reset-password'])){
    if (!empty($_POST['reset-input'])) {
        $login_id = $_POST["reset-input"];
        if(strlen($login_id) < 4){
            $err = "Hãy nhập login id tối thiểu 4 ký tự!";
        }else {
            $flag = get_id($login_id);
            if ($flag == false) {
                $err = "Không tồn tại login id!";
            }
            else {
                $micro = microtime(true);
                $update = update_token($login_id,$micro);
                header('Location: ../admin/forget_password.reset.php');
            }
        }
    }
    else {
        $err = "Hãy nhập login id!";
    }
}

include '../../view/admin/forget_password.request.php'

?>
