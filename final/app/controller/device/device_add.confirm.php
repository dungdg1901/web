<?php
include_once('../../common/db.php');
require_once '../../model/device.php';
session_start();
if (!isset($_SESSION['device_name']) || !isset($_SESSION['device_description']) || !isset($_SESSION['file_name_new']) || !isset($_SESSION['file_destination'])) {
    session_unset();
    header('location: device_add.input.php');
}
if (isset($_POST["edit_device"])) {
    unlink($_SESSION['file_destination']);
    header('location: device_add.input.php');
}

if (isset($_POST["submit_device"])) {
    $device_name = $_SESSION['device_name'];
    $device_avatar = $_SESSION['file_name_new'];
    $device_description = $_SESSION['device_description'];
    // $sql = 'INSERT INTO device(name, avatar, description, created) VALUES ("' . $device_name . '","' . $device_avatar . '","' . $device_description . '",NOW())';
    // $connection->query($sql);
    $model_device= new Device();
    $model_device -> add_device($device_name, $device_avatar, $device_description);
    $file_destination = '../../../assets/avatar/device/' . $device_avatar;
    $file_tmp = $_SESSION['file_destination'];
    rename($file_tmp, $file_destination);
    unlink($file_tmp);
    session_unset();
    header('location: ../../view/device/device_add.complete.php');
}

include '../../view/device/device_add.confirm.php';

?>