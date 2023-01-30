<?php
session_start();
include '../../model/device_transaction.php';
include '../../model/classroom.php';
include '../../model/teacher.php';
include '../../model/device.php';
if(isset($_POST['confirm'])){
    updateDate( $_SESSION['id']);
}
if(isset( $_POST['popupValue'])){
    $isPopup=true;
    $_SESSION['id']= $_POST['popupValue'];
}
if(isset($_POST['cancel'])){
    $isPopup=null;
}

$teachers = getAllTeachers();
$classrooms= getAllClassroom();
$devices = getAllDevice();

$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$key_teacher = isset($_GET['teacher']) ? $_GET['teacher'] : '';
$key_classroom = isset($_GET['classroom']) ? $_GET['classroom'] : '';


$result=searchReturnDevice($keyword, $key_classroom,$key_teacher);
include_once '../../view/device_transaction/device_return.php';

?>