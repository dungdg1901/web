<?php

include_once("../../model/classroom.php");
include_once("../../common/define.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$input = new classroom;
$errors = new classroom;

$temp_des = "../../../assets/avatar/temp/";

function console_log($data)
{
    $output = json_encode($data);

    echo "<script>console.log('{$output}' );</script>";
}

function init_data()
{
    global $input;

    if (isset($_SESSION['classroom-add-input'])) {
        $input = $_SESSION['classroom-add-input'];
    }
}

function is_valid_length($str, $maxlength = 100)
{
    return strlen($str) <= $maxlength;
}

function is_valid_picture($path)
{
    $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
    );

    $file_extension = pathinfo($path, PATHINFO_EXTENSION);

    if (!in_array($file_extension, $allowed_image_extension)) {
        return false;
    }

    return true;
}

function validate()
{
    global $errors;
    global $avatar;
    global $temp_des;

    if (empty($_POST["name"])) {
        $errors->name = "Hãy nhập tên phòng học.";
    } else if (!is_valid_length($_POST["name"])) {
        $errors->name = "Không nhập quá 100 ký tự.";
    }

    if (empty($_POST["building"])) {
        $errors->building = "Hãy chọn tòa nhà.";
    }

    if (empty($_POST["description"])) {
        $errors->description = "Hãy nhập mô tả chi tiết.";
    } else if (!is_valid_length($_POST["name"], 1000)) {
        $errors->description = "Không nhập quá 1000 ký tự.";
    }

    if (empty($avatar) || !file_exists($temp_des . $avatar)) {

        if (!file_exists($_FILES["avatar"]["tmp_name"])) {
            $errors->avatar = "Hãy chọn avatar";
        } else if (!is_valid_picture($_FILES["avatar"]["name"])) {
            $errors->avatar = "Chỉ chấp nhận ảnh .png, .jpg và .jpeg.";
        }
    }
}

function is_valid()
{
    global $errors;

    foreach ($errors as $value) {
        if (!is_null($value)) {
            return false;
        }
    }

    return true;
}

function handle_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

function get_avatar_name(classroom $input)
{
    $from = $_FILES["avatar"]["tmp_name"];

    if (!file_exists($from)) {
        return $input->avatar;
    }

    $file_extension = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
    $file_name = pathinfo($_FILES["avatar"]["name"], PATHINFO_FILENAME);
    $avatar = $file_name . "." . $file_extension;

    return $avatar;
}

function move_avatar(string $avatar_name)
{
    global $temp_des;

    $from = $_FILES["avatar"]["tmp_name"];

    if (!file_exists($from)) {
        return;
    }

    $destination = $temp_des . $avatar_name;

    if (!file_exists($destination)) {
        mkdir($temp_des, 0770, true);
    }

    move_uploaded_file($from, $destination);
}

init_data();

$avatar = isset($input->avatar) ? $input->avatar : "";

if (isset($_POST['submit'])) {

    validate();

    foreach ($input as $key => $value) {
        if (isset($_POST[$key])) {
            $input->$key = handle_input($_POST[$key]);
        }
    }

    $input->avatar = $avatar;

    $file_name = get_avatar_name($input);

    $input->avatar = $file_name;
    $avatar = $file_name;

    $_SESSION['classroom-add-input'] = $input;

    if (is_valid()) {
        move_avatar($file_name);

        header('Location: classroom_add.confirm.php');
    }
}

include '../../view/classroom/classroom_add.input.php';
