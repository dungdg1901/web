<?php
require_once '../../model/device_transaction.php';
require_once '../../model/classroom.php';
require_once '../../model/teacher.php';
require_once '../../model/device.php';
date_default_timezone_set('Asia/Ho_Chi_Minh'); //set timezone vietnam
$classrooms = getNameClassroom();
$teachers = getNameTeacher();
$device_id = isset($_REQUEST['muon']) ?   $_REQUEST['muon']  : '';
//$device_id = 1; # dòng test, merge thì comment dòng này và uncomment dòng trên
if(empty($device_id)){
    // trường hợp ko có id của device thì về lại trang tìm kiếm
    header('Location: ../../view/device_transaction/device_advance_search.php'); 
    //header('Location: device_advance_search.php');
}
$device_name = getNamedevicebyID($device_id);

$teacher_id = '';
$classroom_id = '';
$start_transaction_plan = '';
$end_transaction_plan = '';
if (!empty($_POST['submit'])) {
    $check = true;
    $teacher_id      = isset($_POST['teacher_id']) ?   $_POST['teacher_id'] : '';
    $classroom_id    = isset($_POST['classroom_id']) ? $_POST['classroom_id'] : '';
    $start_transaction_plan    = isset($_POST['startDate']) ? $_POST['startDate'] : '';
    $end_transaction_plan    = isset($_POST['endDate']) ? $_POST['endDate'] : '';
    $current_time = time(); // thời gian hiện tại
    //code validate
    if(empty($teacher_id)){
        $check = false;
        $validate_teacher_id = "Hãy chọn tên giáo viên";
    }
    if(empty($classroom_id)){
        $check = false;
        $validate_classroom_id = "Hãy chọn lớp học";
    }
    if(empty($start_transaction_plan)){
        $check = false;
        $validate_start_transaction_plan = "Hãy nhập mô tả chi tiết ngày mượn";
    }
    if(empty($end_transaction_plan)){
        $check = false;
        $validate_end_transaction_plan = "Hãy nhập mô tả chi tiết ngày trả";
    }
    //validate thời gian mượn >= thời gian hiện tại
    $start_transaction_plan = strtotime($start_transaction_plan);
    if(!empty($start_transaction_plan) and $current_time>$start_transaction_plan){
        $check = false;
        $start_transaction_plan = '';
        $validate_time = "Thời gian mượn không hợp lý";
    }
    // validate thời gian mượn < thời gian trả
    $end_transaction_plan = strtotime($end_transaction_plan);
    if(!empty($start_transaction_plan) and !empty($end_transaction_plan) and $end_transaction_plan<$start_transaction_plan){
        $check = false;
        $validate_time = "Thời gian mượn và trả không hợp lý!";
        
    }
    if ($check) { //validate xong
        // format date 
        $start_transaction_plan = date('Y-m-d H:i', $start_transaction_plan);
        $end_transaction_plan = date('Y-m-d H:i', $end_transaction_plan);
        $device_transaction = new Device_transaction();
        $device_transaction->createNewRecord($device_id, $teacher_id, $classroom_id, $start_transaction_plan,$end_transaction_plan);
        // $device_transaction->createNewRecord(5, 5, $classroom_id, $start_transaction_plan, $end_transaction_plan); #dòng test
        // echo "<script type='text/javascript'>alert('Mượn thành công!')</script>";
        session_start();
        $_SESSION["message"] = 'Bạn đã mượn thành công thiết bị '.$device_name;
        //header('Location: device_advance_search.php');
        header('Location: ../../view/device_transaction/device_advance_search.php');
    }
}
include '../../view/device_transaction/device_transact.php';
