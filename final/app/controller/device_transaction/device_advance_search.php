<?php
    session_start();
    include '../../common/db.php';
    include "../../common/define.php";
    include '../../model/device_transaction.php';
    
    
    if (isset($_SESSION['message'])) {
        echo '<script type="text/javascript">alert("' . $_SESSION['message'] . '");</script>';
        unset($_SESSION['message']);
    }

    if(isset($_GET['search'])){
        $q = isset($_GET['search']) ? $_GET['search'] : null;
        $a = get_device_bykeywordandstatus($q,"");
        $hint = "<a>Gợi ý: </a>";
        if(sizeof($a)!=0){
            for($i=0; $i < min(5,sizeof($a)); $i++){
                if ($hint=="") {
                    $hint = "<a >" . $a[$i]['name'] . "</a>";
                } else {
                    $hint=$hint . "<br /><a>" . $a[$i]['name'] . "</a>";
                }
            } 
            
        }
        else {
            $hint = $hint . "<br /><a>Không tìm thấy thiết bị, vui lòng nhập lại tên.</a>";
        }
        echo $hint;
        
    }
    $keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';
    $khoa = isset($_POST['type']) ? $_POST['type'] : '';
    $result = get_device_bykeywordandstatus($keyword,$khoa);
?>