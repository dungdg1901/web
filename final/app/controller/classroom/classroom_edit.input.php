<?php
require_once "../../model/classroom.php";
session_start();
?>

<?php
/**
 * Kiểm tra dữ liệu trước khi làm bất cứ thứ gì
 */
function validate_data()
{
	$es = [];
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// Nếu trang này được tải bằng nút "sửa" thì kiểm tra giá trị.
		if (isset($_POST["confirm_edit"])) {
			// Khu kiểm tra tên
			if (empty($_POST["name"])) {
				$es["name"] = 'Hãy nhập tên phòng học.';
			} else if (strlen($_POST["name"]) > 100) {
				$es["name"] = 'Không nhập quá 100 ký tự.';
			}

			// Khu kiểm tra tòa nhà
			if (!isset($_POST["building"])) {
				$es["building"] = 'Hãy chọn tòa nhà.';
			}

			// Khu kiểm tra mô tả
			if (empty($_POST["description"])) {
				$es["description"] = 'Hãy nhập mô tả chi tiết';
			} else if (strlen($_POST["building"]) > 1000) {
				$es["description"] = 'Không nhập quá 1000 ký tự.';
			}

			// Khu kiểm tra ảnh
			if (!empty($_FILES["avatar"]["name"])) {
				$filename = $_FILES["avatar"]["tmp_name"];
				$fileinfo = finfo_open(FILEINFO_MIME_TYPE);
				$filetype = finfo_file($fileinfo, $filename);
				if (!str_starts_with($filetype, "image/")) {
					$es["avatar"] = 'Hãy chọn avatar';
				}
			} else if (empty($_POST["avatar_string"])) {
				$es["avatar"] = 'Hãy chọn avatar';
			}

			// Khu điều hướng
			if (empty($es)) {
				$_SESSION["name"] = $_POST["name"];
				$_SESSION["building"] = $_POST["building"];
				$_SESSION["description"] = $_POST["description"];
				if (!empty($_FILES["avatar"]["name"])) {
					$files = $_FILES["avatar"]["tmp_name"];

					$file_fullname = $_FILES["avatar"]["name"];
					$file_ext = pathinfo($file_fullname, PATHINFO_EXTENSION);
					$file_name = pathinfo($files, PATHINFO_FILENAME);

					$_SESSION["avatar"] = $file_name . date("_YmdHis.", time()) . $file_ext;
					$path = "../../../assets/avatar/temp/" . $_SESSION["avatar"];
					move_uploaded_file($files, $path);
				} else if (isset($_POST["avatar_string"])) {
					$_SESSION["avatar"] = $_POST["avatar_string"];
				}

				header("Location: classroom_edit.confirm.php");
			}
		} else {
			header("Location: ../");
		}
	} else if ($_SERVER["REQUEST_METHOD"] == "GET") {
		if (isset($_GET["id"])) {
			$cid = $_GET["id"];
			// Nếu chưa có sẵn id thì tạo mới, có sẵn rồi mà khác thì cũng tạo mới, có sẵn rồi mà giống thì mới giữ nguyên
			if (!isset($_SESSION["classroom_edit_id"])) {
				$_SESSION["classroom_edit_id"] = $cid;
			} else if ($cid != $_SESSION["classroom_edit_id"]) {
				$_SESSION = [];
				$_SESSION["classroom_edit_id"] = $cid;
			}
		}
	} else if (empty($_SESSION)) {	// Nếu không phải POST GET gì thì nó cũng phải xuất hiện từ đâu đó (có session). Nếu xuất hiện từ hư vô thì biến về trang chủ.
		header("Location: ../");
	}

	return $es;
}


/**
 * Đơn giản là copy ảnh từ thư mục chuẩn sang temp.
 */
function prepare_image(string $img_name): bool
{
	$from = "../../../assets/avatar/classroom/" . $img_name;
	$to = "../../../assets/avatar/temp/" . $img_name;
	if (file_exists($from) && !file_exists($to)) {
		return copy($from, $to);
	} else return false;
}


/**
 * Lấy data từ database xuống cho view. Session đang có sẵn cái nào thì ghi đè cái đấy.
 */
function get_data_for_view()
{
	$data = get_data($_SESSION["classroom_edit_id"]);
	if (isset($_SESSION["name"])) {
		$data["name"] = $_SESSION["name"];
	}
	if (isset($_SESSION["building"])) {
		$data["building"] = $_SESSION["building"];
	}
	if (isset($_SESSION["description"])) {
		$data["description"] = $_SESSION["description"];
	}
	if (isset($_SESSION["avatar"])) {
		$data["avatar"] = $_SESSION["avatar"];
	}
	return $data;
}
?>


<?php
$es = validate_data();
$res = get_data_for_view();
prepare_image($res["avatar"]);
require_once "../../view/classroom/classroom_edit.input.php";
?>
