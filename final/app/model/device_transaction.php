<?php
include '../../common/db.php';
class Device_transaction{
    public $id;
    public $device_id;
    public $teacher_id;
    public $classroom_id;
    public $comment;
    public $start_transaction_plan;
    public $end_transaction_plan;
    public $returned_date;
    public $updated;
    public $created;
    
    public function __construct()
    {
        
    }
    // public function __construct($_id,$_device_id,$_teacher_id,$_classroom_id,$_comment,$_start_transaction_plan,$_end_transaction_plan
    // ,$_returned_date,$_updated,$_created){
    //     $this->id = $_id;
    //     $this->device_id = $_device_id;
    //     $this->teacher_id = $_teacher_id;
    //     $this->classroom_id = $_classroom_id;
    //     $this->comment = $_comment;
    //     $this->start_transaction_plan = $_start_transaction_plan;
    //     $this->end_transaction_plan = $_end_transaction_plan;
    //     $this->returned_date = $_returned_date;
    //     $this->updated = $_updated;
    //     $this->created = $_created;
    // }
    public function createNewRecord( $_device_id,$_teacher_id,$_classroom_id,$_start_transaction_plan,$_end_transaction_plan ) {
        try {
            //$this->validateTaskParams($name, $email, $task);
            global  $connection;
            $stmt = $connection->prepare("INSERT INTO device_transactions (device_id, teacher_id, classroom_id, start_transaction_plan,end_transaction_plan) VALUES (?,?,?,?,?)");
			$stmt->execute([$_device_id,$_teacher_id,$_classroom_id,$_start_transaction_plan,$_end_transaction_plan]);
        }
        catch (Exception $e) {
            throw $e;
        }
    }
}

function updateDate($id){
    global $connection;
    $sql="UPDATE device_transactions SET returned_date = CURRENT_TIMESTAMP WHERE id='$id'";
    $connection->query($sql);
}

function searchReturnDevice($keyword, $key_classroom,$key_teacher){
    
    global $connection;
    $sql = "SELECT devices.id, devices.name, devices.description, dvt.teacher_id, dvt.classroom_id, dvt.comment, dvt.start_transaction_plan, dvt.end_transaction_plan, dvt.returned_date FROM devices LEFT JOIN device_transactions dvt ON devices.id = dvt.device_id";
    if($keyword != "" or $key_classroom !="" or $key_teacher!=""){
        // $sql = $sql . " Where (device.name LIKE '%" . $keyword . "%'" . " or device.description LIKE '%" . $keyword . "%')";
    
        $keyword_sql = "";
        $key_class_sql = "";
        $key_teacher_sql = "";
        $check_and1="";
        $check_and2="";

        if ($keyword != "") {
            if (!empty($key_classroom)  || !empty($key_teacher)){
                $check_and1=" and ";
            }
            $keyword_sql = "devices.name LIKE '%" . $keyword . "%'" . " or devices.description LIKE '%" . $keyword . "%'" . $check_and1;
            
        }

        if ($key_classroom != "") {
            if (!empty($key_teacher)){
                $check_and2=" and ";
            }
            $key_class_sql = "classroom_id = " . $key_classroom . $check_and2;
        }

        if ($key_teacher!="") {
            $key_teacher_sql = "teacher_id = " . $key_teacher;
        }

        $sql1 = "
                WHERE 
                 $keyword_sql
                
                 $key_class_sql 
                
                 $key_teacher_sql
                ";
        $sql =  $sql . $sql1. " order by device_id DESC";
    }
    else
        $sql = $sql . " order by device_id DESC";



$result = $connection->query($sql);
return $result->fetch_all(MYSQLI_ASSOC);
}

function get_device_bykeywordandstatus($keyword,$khoa){
    $sql = "SELECT devices.id,devices.name,device_transactions.returned_date FROM devices LEFT JOIN device_transactions ON devices.id = device_transactions.device_id";
    $x = 0;
    $keyword = mysqli_real_escape_string($GLOBALS['connection'], $keyword);
    $khoa = mysqli_real_escape_string($GLOBALS['connection'], $khoa);
    if($keyword != ""){
        $sql = $sql . " Where (devices.name LIKE '%" . $keyword . "%'" . " or devices.description LIKE '%" . $keyword . "%')";
        $x+=1;
    }
    if($khoa != ""){
        if ($x=="001"){
            $sql = $sql . " and ";
        }else if($x == "002"){
            $sql = $sql . " Where";
        }
        if($khoa == 1){
            $sql = $sql . " device_transactions.returned_date IS NULL ";
        }else if($khoa == 2){
            $sql = $sql . " device_transactions.returned_date IS NOT NULL ";
        }
    }
    
    $sql = $sql . " order by devices.id DESC";
    $result = mysqli_query($GLOBALS['connection'], $sql);
    $device_search = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $device_search;
}

// Các hàm cho device_history.php
function get_all_transactions()
{
    global $connection;
    $query = "SELECT * FROM device_transactions ORDER BY id DESC";
    $result = mysqli_query($connection, $query);
    $device_transactions = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $device_transactions;
}

function search_transactions($device, $teacher_id)
{
    global $connection;
    $device = mysqli_real_escape_string($connection, $device);
    $teacher_id = mysqli_real_escape_string($connection, $teacher_id);

    $query = "SELECT * FROM device_transactions, devices WHERE device_transactions.device_id = devices.id AND devices.name LIKE '%$device%' AND IF('$teacher_id' = '', 1, device_transactions.teacher_id = '$teacher_id') ORDER BY device_transactions.id DESC";
    $result = mysqli_query($connection, $query);
    $device_transactions = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $device_transactions;
}

?>
