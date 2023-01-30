<?php
include '../../common/db.php';
class Device
{
    public $id;
    public $name;
    public $avatar;
    public $description;
    public $updated;
    public $created;

    public function __construct()
    {
    }

    public function updateDevice($_id, $_name, $_avatar, $_description)
    {
        try {
            global  $connection;
            $sql = " UPDATE`devices` SET  `name` = '$_name',`avatar`= '$_avatar',`description`= '$_description'  WHERE `id` = '$_id' ";
            $result = mysqli_query($connection, $sql);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getDevice($_id)
    {
        try {
            global  $connection;

            $sql = "SELECT * FROM `devices` WHERE `id` = '$_id'";
            $result = mysqli_query($connection, $sql);

            $device = array("id" => $_id);
            while ($row = mysqli_fetch_assoc($result)) {
                $device["name"] = $row["name"];
                $device["avatar"] = $row["avatar"];
                $device["description"] = $row["description"];
            }
            return $device;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function add_device($name, $avatar, $description){
        try {
            global  $connection;
            $stmt = $connection->prepare("INSERT INTO devices (name, avatar, description, created) VALUES (?,?,?, NOW())");
			$stmt->execute([$name,$avatar,$description]);
        }
        catch (Exception $e) {
            throw $e;
        }
    }

}


function getNamedevicebyID($id){
    global  $connection;
    $sql = "Select name from devices where id = '$id'";
    $result = $connection->query($sql);
    $data = '';
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
        $data = $row['name'];
        }
    } 
  
return $data;
}

function searchDeviceByName($deviceName) {
    global $connection;
    $sql="SELECT devices.id as id, devices.name as name FROM devices inner join device_transactions on devices.id != device_transactions.device_id
    and devices.name like '%$deviceName%'";
    $result = $connection->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}
function searchDevice($deviceName){
    global $connection;
    $sql = "SELECT devices.id as id, devices.name as name FROM devices join device_transactions on devices.id =device_transactions.device_id and devices.name like '%$deviceName%'
    where device_transactions.returned_date <> ''
    ";
    $result = $connection->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}
function getDevice($deviceName){
    global $connection;
    $sql = "SELECT devices.id as id, devices.name as name FROM devices join device_transactions on devices.id =device_transactions.device_id and devices.name like '%$deviceName%'
    Where device_transactions.returned_date is null";
    $result = $connection->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}
function getAllDevice(){
    global $connection;
    $sql = "SELECT devices.id, devices.name, device_transactions.returned_date FROM devices join device_transactions on devices.id = device_transactions.device_id";
    $result = $connection->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}
// function getAllDevice(){
//     global $connection;
//     $sql = "SELECT device.id as id ,device.name as name, device_transactions.returned_date as date  FROM device join device_transactions on device.id =device_transactions.device_id";
//     $result = $connection->query($sql);
//     return $result->fetch_all(MYSQLI_ASSOC);
// }
function deleteDevice($id){
    global $connection;
    $sql = "DELETE FROM devices WHERE id='$id'";
    $result = $connection->query($sql);
    return $result;
}
function searchDeviceById($id){
    global $connection;
    $sql="SELECT devices.name as name FROM devices WHERE id='$id'";
    $result = $connection->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

?>
