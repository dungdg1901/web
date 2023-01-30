<?php
session_start();

$device_name = isset($_SESSION['device_name']) ? $_SESSION['device_name'] : "";
$device_description = isset($_SESSION['device_description']) ? $_SESSION['device_description'] : "";
if (isset($_SESSION['device_name']) || isset($_SESSION['device_description']) || isset($_SESSION['file_name_new']) || isset($_SESSION['file_destination'])) {
    if (isset($_SESSION['file_destination']) && file_exists($_SESSION['file_destination'])) {
        unlink($_SESSION['file_destination']);
    }
    session_unset();
}
// $device_avatar = "";
if (isset($_POST["submit_device"])) {
    $error = array();
    if (empty($_POST["device_name"])) {
        $error['name'] = "Hãy nhập tên thiết bị";
    } else {
        $device_name = $_POST["device_name"];
    }

    if (empty($_POST["device_description"])) {
        $error['description'] = "Hãy nhập mô tả chi tiết";
    } else {
        $device_description = $_POST["device_description"];
    }

    $file = $_FILES['choose_file'];
    $file_error = $file['error'];
    $file_name = $file['name'];
    $file_tmp_name = $file['tmp_name'];
    $file_ext = explode('.', $file_name);
    $file_actual_ext = strtolower(end($file_ext));
    $allowed = array('jpg', 'jpeg', 'png');
    if (in_array($file_actual_ext, $allowed)) {
        if ($file_error === 0) {
            if (empty($error)) {
                $file_name_new = uniqid('', true) . "." . $file_actual_ext;
                $file_destination = '../../../assets/avatar/temp/' . $file_name_new;
                move_uploaded_file($file_tmp_name, $file_destination);
            }
        } else {
            $error['img_err'] = 'Sai kiểu file';
        }
    } else {
        $error['img_err'] = 'Hãy chọn avatar';
    }
    if (empty($error)) {
        $_SESSION['device_name'] = $device_name;
        $_SESSION['device_description'] = $device_description;
        $_SESSION['file_name_new'] = $file_name_new;
        $_SESSION['file_destination'] = $file_destination;
        header('location: device_add.confirm.php');
    }
}
// session_unset();
include '../../view/device/device_add.input.php';
?>