<?php
include_once "../../common/db.php";

date_default_timezone_set('Asia/Ho_Chi_Minh');
// CRUD

function add_teacher($name, $specialized, $degree, $teacher_image, $note) //CREAT
{
    global $connection;
    $date = date("Y-m-d H:i:s");
    $sql  = "INSERT INTO `teachers` (name, avatar, description, specialized, degree, created) VALUES('{$name}', '{$teacher_image}', '{$note}', '{$specialized}', '{$degree}', '{$date}')";
    $result = $connection->query($sql);
    return $result;
}

function get_all_teachers() //READ
{
    global $connection;

    $sql  = "SELECT * FROM teachers ORDER BY teachers.id DESC";

    $result = $connection->query($sql);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $row;
}

function get_teacher_name_by_id($id) //READ
{
    global $connection;

    $sql  = "SELECT name FROM teachers WHERE id = '$id'";

    $result = $connection->query($sql);
    $row = mysqli_fetch_assoc($result);

    return $row;
}

function search_teachers_by_specialized_and_keyword($specialized, $keyword) //READ
{
    global $connection;

    $sql  = "SELECT * FROM teachers WHERE teachers.specialized = '$specialized' 
    AND (teachers.name LIKE '%$keyword%' OR teachers.description LIKE '%$keyword%' OR teachers.degree LIKE '%$keyword%') ORDER BY teachers.id DESC";

    $result = $connection->query($sql);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $row;
}

function search_teachers_by_specialized($specialized) //READ
{
    global $connection;

    $sql  = "SELECT * FROM teachers WHERE teachers.specialized = '$specialized' ORDER BY teachers.id DESC";

    $result = $connection->query($sql);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $row;
}

function search_teachers_by_keyword($keyword) //READ
{
    global $connection;

    $sql  = "SELECT * FROM teachers WHERE teachers.name LIKE '%$keyword%' 
            OR teachers.description LIKE '%$keyword%' 
            OR teachers.degree LIKE '%$keyword%' ORDER BY teachers.id DESC";

    $result = $connection->query($sql);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $row;
}

function edit_teacher($params) //UPDATE
{
    global $connection;

    $sql = "UPDATE `teachers`
            SET ...
            WHERE ...";
    /*
    ....
    */
    return true;
}

function delete_teacher($id) //DELETE
{
    global $connection;

    $sql  = "DELETE FROM teachers
            WHERE teachers.id=$id";
    $connection->query($sql);

    return true;
}

function get_last_id()
{
    global $connection;

    $last_id = $connection->insert_id;

    return $last_id;
}
/**
 * @param $id
 * @return array|false|null
 */
function get_teacher_by_id($id)
{
    global $connection;

    $sql  = "SELECT * FROM teachers WHERE teachers.id = $id  LIMIT 1";

    $result = $connection->query($sql);
    $teacher_info = mysqli_fetch_assoc($result);

    return $teacher_info;
}


function edit_teacher_by_id($id, $teacher_name, $teacher_avatar, $teacher_note, $teacher_specialized, $teacher_degree)
{
    global $connection;

    $date = date("Y-m-d H:i:s");
    $sql = "UPDATE `teachers`
            SET `name` = '{$teacher_name}',
            `avatar` = '{$teacher_avatar}',
            `description` = '{$teacher_note}',
            `specialized` = '{$teacher_specialized}',
            `degree` = '{$teacher_degree}',
            `updated` = '{$date}'
            WHERE `id` = '{$id}'";

    $result = $connection->query($sql);
    return $result;
}

// get teacher
function getTeacher(int $id): array
{
    global $connection;

    // change character set to utf8
    mysqli_set_charset($connection, 'UTF8');

    $stmt = $connection->prepare("SELECT * FROM `teachers` WHERE `id` = ?;");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    $teacher = array(
        "name" => "",
        "specialized" => "",
        "degree" => "",
        "avatar" => "",
        "description" => ""
    );
    while ($row = mysqli_fetch_assoc($result)) {
        $teacher["name"] = $row["name"];
        $teacher["specialized"] = $row["specialized"];
        $teacher["degree"] = $row["degree"];
        $teacher["avatar"] = $row["avatar"];
        $teacher["description"] = $row["description"];
    }
    $connection->close();

    return $teacher;
}

// set teacher
function setTeacher(int $id, string $name, string $specialized, string $degree, string $avatar, string $description): bool
{
    global $connection;

    // change character set to utf8
    mysqli_set_charset($connection, 'UTF8');
    date_default_timezone_set("Asia/Ho_Chi_Minh");

    $stmt = $connection->prepare("UPDATE `teachers` SET `name` = ?, `specialized` = ?, `degree` = ?, `avatar` = ?, `description` = ?, `updated` = now() WHERE `id` = ?;");
    $stmt->bind_param("sssssi", $name, $specialized, $degree, $avatar, $description, $id);
    $stmt->execute();
    $result = $stmt->get_result();

    $connection->close();

    return $result;
}
function getAllTeachers(){
    global $connection;
    $sql = "SELECT id, name, description FROM teachers";
    $result = $connection->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}
function getNameTeacher(){
    global  $connection;
    $sql = "Select id,name from teachers";
    $result = $connection->query($sql);
    $data = [];
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
        $data[$row['id']] = $row['name'];
        }
    } 
  
return $data;
}


?>
