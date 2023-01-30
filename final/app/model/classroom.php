<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");
require_once "../../common/db.php";
require_once "../../common/define.php";

class classroom
{
	public $id;
	public $name;
	public $avatar;
	public $description;
	public $building;
	public $updated;
	public $created;
}

/**
 *	Create new classroom
 */
function createClassroom(classroom $classroom)
{
	try {
		global $connection;

		if (mysqli_connect_errno()) {
			die("Error: " . mysqli_connect_error());
		}

		$sql = "INSERT INTO classrooms (name, avatar, description, building, updated, created) 
                VALUES (?, ?, ?, ?, ?, ?)";

		$stmt = mysqli_stmt_init($connection);

		if (!mysqli_stmt_prepare($stmt, $sql)) {
			die(mysqli_error($connection));
		}

		$now = date('Y-m-d H:i:s');
		$classroom->updated = $now;
		$classroom->created = $now;

		mysqli_stmt_bind_param(
			$stmt,
			"ssssss",
			$classroom->name,
			$classroom->avatar,
			$classroom->description,
			$classroom->building,
			$classroom->updated,
			$classroom->created
		);

		mysqli_stmt_execute($stmt);

		return mysqli_insert_id($connection);
	} catch (Exception $e) {
		throw $e;
	}
}

/**
 *	Tìm kiếm lớp học bằng từ khoá
 */
function searchByName($classroomName)
{
	global $local;
	global $user;
	global $pass;
	global $db;
	$connection = new mysqli($local, $user, $pass, $db);

	$classroomName = "%$classroomName%";
	$sql = "SELECT id, name, building, description FROM classrooms WHERE name like ?";
	$stmt = $connection->prepare($sql);
	$stmt->bind_param('s', $classroomName);
	$stmt->execute();
	$result = $stmt->get_result();

	return $result->fetch_all(MYSQLI_ASSOC);
}
/**
 *	Tìm kiếm lớp học bằng từ khoá và toà nhà
 */
function searchClassroom($classroomName, $building)
{
	global $local;
	global $user;
	global $pass;
	global $db;
	$connection = new mysqli($local, $user, $pass, $db);

	$classroomName = "%$classroomName%";
	$sql = "SELECT id, name, building, description FROM classrooms WHERE name like ? and building = ?";
	$stmt = $connection->prepare($sql);
	$stmt->bind_param('ss', $classroomName, $building);
	$stmt->execute();
	$result = $stmt->get_result();

	return $result->fetch_all(MYSQLI_ASSOC);
}
/**
 *	Tìm kiếm lớp học bằng toà nhà
 */
function searchByBuilding($building)
{
	global $local;
	global $user;
	global $pass;
	global $db;
	$connection = new mysqli($local, $user, $pass, $db);

	$sql = "SELECT id, name, building, description FROM classrooms WHERE building = ?";
	$stmt = $connection->prepare($sql);
	$stmt->bind_param('s', $building);
	$stmt->execute();
	$result = $stmt->get_result();

	return $result->fetch_all(MYSQLI_ASSOC);
}
/**
 *	Lấy tất cả dữ liệu
 */
function getAllClassroom()
{
	global $local;
	global $user;
	global $pass;
	global $db;
	$connection = new mysqli($local, $user, $pass, $db);

	$sql = "SELECT id, name, building, description FROM classrooms";
	$result = $connection->query($sql);

	return $result->fetch_all(MYSQLI_ASSOC);
}
/**
 *	Xoá lớp học
 */
function deleteClassroom($id)
{
	global $local;
	global $user;
	global $pass;
	global $db;
	$connection = new mysqli($local, $user, $pass, $db);

	$sql = "DELETE FROM classrooms WHERE id = ?";
	$stmt = $connection->prepare($sql);
	$stmt->bind_param('i', $id);
	$stmt->execute();
	$result = $stmt->get_result();

	return $result;
}
/**
 *	Lấy dữ liệu lớp học bằng id
 */
function searchById($id)
{
	global $local;
	global $user;
	global $pass;
	global $db;
	$connection = new mysqli($local, $user, $pass, $db);

	$sql = "SELECT name FROM classrooms WHERE id = ?";
	$stmt = $connection->prepare($sql);
	$stmt->bind_param('i', $id);
	$stmt->execute();
	$result = $stmt->get_result();

	return $result->fetch_all(MYSQLI_ASSOC);
}

/**
 * Cập nhật dữ liệu lớp học, trả về kết quả của truy vấn (thành công hay thất bại)
 */
function set_data(string $cid, string $cname, string $cbuilding, string $cdescription, string $cavatar): bool
{
	global $local;
	global $user;
	global $pass;
	global $db;
	$connection = new mysqli($local, $user, $pass, $db);

	// Kiểm tra kết nối
	if ($connection->connect_error) {
		die("Connection failed: " . $connection->connect_error);
	}

	$cupdated = date("Y-m-d H:i:s", time());

	$stmt = $connection->prepare("UPDATE `classrooms` SET `name` = ?, `building` = ?, `avatar` = ?, `description` = ?, `updated` = ? WHERE `classrooms`.`id` = ?;");
	$stmt->bind_param("ssssss", $cname, $cbuilding, $cavatar, $cdescription, $cupdated, $cid);

	$result = $stmt->execute();
	$stmt->close();
	$connection->close();
	return $result;
}


/**
 * Lấy dữ liệu lớp học từ database bằng id
 */
function get_data(string $get_id): array
{
	global $local;
	global $user;
	global $pass;
	global $db;
	$connection = new mysqli($local, $user, $pass, $db);

	$stmt = $connection->prepare("SELECT * FROM `classrooms` WHERE `id` = ?");
	$stmt->bind_param("i", $get_id);
	$stmt->execute();

	$kq = array(
		"name" => "",
		"building" => "",
		"description" => "",
		"avatar" => "",
	);
	$result = $stmt->get_result();
	while ($row = $result->fetch_array(MYSQLI_NUM)) {
		$kq["name"] = $row[1];
		$kq["building"] = $row[4];
		$kq["description"] = $row[3];
		$kq["avatar"] = $row[2];
	}

	$connection->close();
	return $kq;
}
function getNameClassroom()
{
	global  $connection;
	$sql = "Select id,name from classrooms";
	$result = $connection->query($sql);
	$data = [];
	if ($result && $result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$data[$row['id']] = $row['name'];
		}
	}

	return $data;
}
