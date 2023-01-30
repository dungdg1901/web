<?php
include_once("../../model/classroom.php");
include_once("../../common/define.php");

$input = new classroom;
$temp_des = "../../../assets/avatar/temp/";
$classroom_des = "../../../assets/avatar/classroom/";

function console_log($data)
{
    $output = json_encode($data);

    echo "<script>console.log('{$output}' );</script>";
}

function move_avatar(classroom $classroom)
{
    global $temp_des;
    global $classroom_des;

    $from = $temp_des . $classroom->avatar;

    $destination = $classroom_des . $classroom->avatar;

    if (!file_exists($destination)) {
        mkdir($classroom_des, 0770, true);
    }

    rename($from, $destination);
}

session_start();

if (isset($_SESSION['classroom-add-input'])) {
    $input = $_SESSION['classroom-add-input'];
}

console_log($input);

$building = $buildings[$input->building];
$avatar_des = $temp_des . $input->avatar;

if (isset($_POST['confirm'])) {

    $input->id = createClassroom($input);

    move_avatar($input);

    header('Location: classroom_add.complete.php');

    session_destroy();
}

if (isset($_POST['fix'])) {
    header('Location: classroom_add.input.php');
}

include '../../view/classroom/classroom_add.confirm.php';
