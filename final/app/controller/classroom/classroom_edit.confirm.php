<?php
require_once "../../model/classroom.php";
session_start();
maybe_redirect();
?>

<?php
/**
 * Xử lý lúc bắt đầu tải trang, xem có cần chuyển trang đi đâu hay không
 */
function maybe_redirect()
{
	if ($_SERVER["REQUEST_METHOD"] == "POST") {	// Nếu trang này được tải lại bằng nút bấm (không phải chuyển từ input sang)
		if (isset($_POST["edit"])) {	// Nếu đó là nút bấm quay xe
			header("Location: classroom_edit.input.php?id=" . $_SESSION["classroom_edit_id"]);
		} else	// Nếu đó là nút bấm xác nhận
		{
			$cid = $_SESSION["classroom_edit_id"];
			$cname = $_SESSION["name"];
			$cbuilding = $_SESSION["building"];
			$cdescription = $_SESSION["description"];
			$cavatar = $_SESSION["avatar"];
			// Thực hiện truy vấn, nếu truy vấn thành công thì...
			if (set_data($cid, $cname, $cbuilding, $cdescription, $cavatar)) {
				// ... chuyển ảnh từ temp về thư mục chuẩn
				$from = "../../../assets/avatar/temp/" . $_SESSION["avatar"];
				$to = "../../../assets/avatar/classroom/" . $_SESSION["avatar"];
				rename($from, $to);
			}

			// Dù thành công hay thất bại thì vẫn về màn hình hoàn thành
			header("Location: classroom_edit.complete.php");
		}
	} else if (empty($_SESSION)) {	// Nếu không thì hy vọng là trang này tải lúc vẫn còn trong phiên. Không thì về trang chủ.
		header("Location: ../");
	}
}
?>

<?php
require_once "../../view/classroom/classroom_edit.confirm.php";
?>