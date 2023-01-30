<?php
require_once "../../model/teacher.php";
session_start();
?>

<?php
// declaration

// fields validation
function validate_data()
{
    $error = [];    // error string array
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST["confirm"])) {

            // name validation
            if (empty($_POST["name"])) {
                $error["name"] = "Hãy nhập tên giáo viên";
            } elseif (strlen($_POST["name"]) > 100) {
                $error["name"] = "Không nhập quá 100 ký tự";
            } else {
                $_SESSION["name"] = $_POST["name"];
            }

            // specialized validation
            if ($_POST["specialized"] == "None") {
                $error["specialized"] = "Hãy chọn chuyên ngành";
            } else {
                $_SESSION["specialized"] = $_POST["specialized"];
            }

            // degree validation
            if ($_POST["degree"] == "None") {
                $error["degree"] = "Hãy chọn bằng cấp";
            } else {
                $_SESSION["degree"] = $_POST["degree"];
            }

            // description validation
            if (empty($_POST["description"])) {
                $error["description"] = "Hãy nhập mô tả chi tiết";
            } elseif (strlen($_POST["description"]) > 1000) {
                $error["description"] = "Không nhập quá 1000 ký tự";
            } else {
                $_SESSION["description"] = $_POST["description"];
            }

            // image validation
            if (!file_exists($_FILES["avatar"]["tmp_name"])) {
                $error["avatar"] = "Hãy chọn avatar";
            } elseif (@getimagesize($_FILES["avatar"]["tmp_name"]) == false) {
                $error["avatar"] = "Hãy chọn tệp tin là ảnh";
            } else {
                $target_dir =  "../../../assets/avatar/temp/";

                // move and rename file
                $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
                print_r($_FILES["avatar"]["tmp_name"]);
                move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);
                $extension = end(explode(".", $target_file));
                $id = $_SESSION["teacher_edit_id"];
                $extension = "jpeg";
                $new_target_file =  $target_dir . "avatar_$id." . $extension;
                rename($target_file, $new_target_file);

                $_SESSION["avatar"] = $new_target_file;
            }

            if (empty($error)) {
                // redirect to confirm
                header("location: ../../controller/teacher/teacher_edit.confirm.php");
            }
        } else if (empty($_SESSION)) {
            // redirect to search
            header("location: ../../controller/teacher/teacher_search.php");
        }

        return $error;
    }
}

// get data for viewing
function get_data_for_view()
{
    $_SESSION["teacher_edit_id"] = 1;
    $data = getTeacher($_SESSION["teacher_edit_id"]);    // cần truyền id của giáo viên muốn sửa thông tin vào đây
    if (isset($_SESSION["name"])) {
        $data["name"] = $_SESSION["name"];
    }
    if (isset($_SESSION["specialized"])) {
        $data["specialized"] = $_SESSION["specialized"];
    }
    if (isset($_SESSION["degree"])) {
        $data["degree"] = $_SESSION["degree"];
    }
    if (isset($_SESSION["avatar"])) {
        $data["avatar"] = $_SESSION["avatar"];
    }
    if (isset($_SESSION["description"])) {
        $data["description"] = $_SESSION["description"];
    }
    return $data;
}
?>

<?php
// process
$error = validate_data();
$data = get_data_for_view();
require_once "../../view/teacher/teacher_edit.input.php";
?>
