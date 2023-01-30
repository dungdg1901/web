<?php
require_once "../../model/teacher.php";
session_start();
if (empty($_SESSION)) {
    // redirect to search
    header("location: ../../controller/teacher/teacher_search.php");
} else {
    session_destroy();
}
?>

<?php
// declaration
?>

<?php
// process
require_once "../../view/teacher/teacher_edit.complete.php";
?>
