<?php
session_start();
include_once "../../model/device.php";
if(isset($_POST["deviceEdit"])){
    header('Location: ./device_edit.input.php?sua=' . $_POST["deviceEdit"]);
 }
 
if(isset($_POST['deleteDevice'])){
    $popUp=true;
    $_SESSION['deleteDevice']=$_POST['deleteDevice'];
    $_SESSION['name']=(searchById($_SESSION['deleteDevice'])[0])['name'];
    $allDevice=getAllDevice();
    include_once "../../view/device/device_search.php";
}
if(isset($_POST['confirm'])){
    deleteDevice($_SESSION['deleteDevice']);
}
if(isset($_POST["device_search"])){
        searchAllDevice();
    }else {
        allDevice();
    }

function allDevice(){
    $allDevice=getAllDevice();
    include_once "../../view/device/device_search.php";
}
function searchAllDevice(){
    $deviceName=$_POST["deviceKey"];
    $deviceStatus=$_POST["deviceStatus"];
    if($deviceStatus=="0") {
        $resultSearch=searchDevice($deviceName);
        if(!empty(searchDeviceByName($deviceName))){
        }
        include_once "../../view/device/device_search.php";
    }else {
        $resultSearch=getDevice($deviceName);
        include_once "../../view/device/device_search.php";
    }
}
function getStarted(){
    include_once "../../view/device/device_search.php";
}

?>