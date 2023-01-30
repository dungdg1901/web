
<?php
include_once("../../model/device.php");
$dafault_avatar = "../../../assets/avatar/device/default.png";

$device_id = isset($_REQUEST['sua']) ? $_REQUEST['sua'] : '';
$model_device= new Device();
$device = $model_device->getDevice($device_id);

$device_name = $device['name'];
$device_description = $device['description'];
$device_avatar = (!empty($_POST['device_ava']))? $_POST['device_ava']: $device['avatar'];
$device_avatar_name= 'avatar_device_'.$device_id;

session_start();
if(!empty($_SESSION['fix_status']) and $_SESSION['fix_status'] ){
    $device_name =  $_SESSION['fix_device_name'];
    $device_description =  $_SESSION['fix_device_description'];
    $device_avatar = $_SESSION['fix_device_avatar'];
    $device_img_name = $_SESSION['fix_device_img_name ']; 
    $_SESSION['fix_status'] = False;
}

function upload($device_avatar_name)
{
    $imageName = $_FILES['device_avatar']['name'];
    $target_dir = '../../../assets/avatar/tmp/';
    if (!is_dir($target_dir)) {
        mkdir($target_dir,0777,true);
    }
    $path_ext = pathinfo($imageName, PATHINFO_EXTENSION);
    
    $file_name = $device_avatar_name ."." . $path_ext;
    $target_path  = $target_dir.basename($file_name);
    if (move_uploaded_file($_FILES['device_avatar']['tmp_name'], $target_path)) {
        return $target_path;
    }
};

if (!empty($_POST["submit"]))
{
    $check = true;
    $device_name = (!empty($_POST["device_name"])) ? $_POST["device_name"] : "";
    $device_description = (!empty($_POST["device_description"])) ? $_POST["device_description"] : "";
    $device_avatar = (!empty($_FILES['device_avatar']['name'])) ? upload($device_avatar_name) :  $_POST['device_ava'] ;
    // Check name
    if(empty($device_name))
    {
        $check = false;
        $validate_device = "Hãy nhập tên thiết bị!";
    }
    // Check descriptions
    if(empty($device_description) or strlen($device_description)>1000)
    {
        $check = false;
        if(strlen($device_description)>1000)
        {
            $validate_description = "Không nhập quá 1000 ký tự.";;
        }else{
            $validate_description = "Hãy mô tả thiết bị!";
        }
    }
    // Check avatar
    if(empty($device_avatar)or $device_avatar == $dafault_avatar){
        $check = false;
        $validate_avatar = "Hãy thêm ảnh thiết bị!";
    }

    if ($check) {
        session_start();
        $_SESSION["device_id"] = $device_id;
        $_SESSION['device_name'] = $device_name;
        $_SESSION['device_description'] = $device_description ;
        $_SESSION['device_avatar'] =  $device_avatar  ;
        $_SESSION['device_img_name'] =  (!empty($_FILES['device_avatar']['name'])) ? $_FILES['device_avatar']['name'] :  "";
        header('Location: device_edit.confirm.php');
    }
}

include '../../view/device/device_edit.input.php';
