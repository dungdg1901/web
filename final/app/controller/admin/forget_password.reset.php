<?php

include '../../common/db.php';
include '../../model/admin.php';

$result = get_token();
$nameList = array();

for ($i = 0; $i < count($result); $i++) {
    $nameList[$i] = get_name($result[$i][0]);
}

$err = array();

for ($i = 0; $i < count($result); $i++) {
    if(isset($_POST['reset_password'.$i])){
        if(!empty($_POST['new_password'.$i])){
            $new_password = $_POST['new_password'.$i];
            if(strlen($new_password) < 6){
                $err[$i] = "Hãy nhập mật khẩu có tối thiểu 6 ký tự!";
            }else {
                $err[$i] = "";
                update_password($new_password,$result[$i][1]);
                header('Location: ../../../login.php');
            }
        }else {
            $err[$i] = "Hãy nhập mật khẩu mới!";
        }
        
    }
    else {
        $err[$i] = "";
    }
}

include_once '../../view/admin/forget_password.reset.php'
?>