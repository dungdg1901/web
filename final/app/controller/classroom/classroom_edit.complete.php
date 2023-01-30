<?php
session_start();
if (empty($_SESSION)) {	// Nếu phiên này không có gì (tự dưng chuyển qua đây chăng) thì tự động về trang chủ
	header("Location: ../");
} else {	// Không thi ở lại
	session_destroy();
}
?>

<?php
require_once "../../view/classroom/classroom_edit.complete.php";
?>