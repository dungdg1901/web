<?php

include '../model/teacher.php';
include '../model/device_transaction.php';

$teachers = get_all_teachers();
$teachers_name = array_column($teachers, 'name', 'id');

$histories = get_all_transactions();

if (isset($_POST['search'])) {
    $device = $_POST['device'];
    $teacher_id = $_POST['teacher'];
    $histories = search_transactions($device, $teacher_id);
}

include '../view/device_history.php';
