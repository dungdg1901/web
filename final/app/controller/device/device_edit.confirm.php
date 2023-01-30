<?php
    include_once("../../model/device.php");
    session_start();
    $device_id = $_SESSION["device_id"];
    $device_name = $_SESSION["device_name"];
    $device_description = $_SESSION["device_description"];
    $device_avatar = $_SESSION["device_avatar"];
    $device_img_name =  $_SESSION['device_img_name'];
    $device_avatar_name= 'avatar_device_'.$device_id;

    if (!empty($_POST["register"])) {
        $model_device= new Device();
        $destinationFilePath = '../../../assets/avatar/device/'.$device_id.'/';
        array_map( 'unlink', array_filter((array) glob($destinationFilePath.'*')));
        rename($device_avatar, $destinationFilePath.$device_avatar_name.'.'.pathinfo($device_avatar , PATHINFO_EXTENSION));
        $device = $model_device->updateDevice($device_id, $device_name, $destinationFilePath.$device_avatar_name.'.'.pathinfo($device_avatar , PATHINFO_EXTENSION), $device_description);
        header('Location: device_edit.complete.php');
    }

    if (!empty($_POST["fix"])) {
        session_start();
        $_SESSION['fix_status'] = True;
        $_SESSION['fix_device_name'] = $device_name;
        $_SESSION['fix_device_description'] = $device_description;
        $_SESSION['fix_device_avatar'] = $device_avatar;
        $_SESSION['fix_device_img_name '] = $device_img_name;
        header('Location: device_edit.input.php');
    }
    include '../../view/device/device_edit.confirm.php';
