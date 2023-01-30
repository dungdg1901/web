<?php
require_once "../../model/teacher.php";
session_start();
maybe_redirect();
?>

<?php
// declaration
function maybe_redirect()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["edit"])) {
            # redirect back to input
            header("location: ../../controller/teacher/teacher_edit.input.php");
        } else {
            $id = $_SESSION["teacher_edit_id"];
            $name = $_SESSION["name"];
            $specialized = $_SESSION["specialized"];
            $degree = $_SESSION["degree"];
            $description = $_SESSION["description"];
            $avatar = $_SESSION["avatar"];

            $target_dir = "../../../assets/avatar/teacher/$id/";

            // checking whether file exists or not
            if (!file_exists($target_dir)) {
                // create a new file or directory
                mkdir($target_dir, 0777, true);
            }

            // move file
            $target_file = $target_dir . basename($avatar);
            rename($avatar, $target_file);
            $avatar = basename($target_file);

            setTeacher($id, $name, $specialized, $degree, $avatar, $description);

            # redirect to complete
            header("location: ../../controller/teacher/teacher_edit.complete.php");
        }
    } else if (empty($_SESSION)) {
        // redirect to search
        header("location: ../../controller/teacher/teacher_search.php");
    }
}
?>

<?php
// process
require_once "../../view/teacher/teacher_edit.confirm.php";
?>
