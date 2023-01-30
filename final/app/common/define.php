<?php

define("DEVICE_STATUES", array("" => "", "001" => "Đang mượn", "002" => "Đang rảnh"));
define("GENDER", [0 => "nam", 1 => "nữ"]);
define("GIA_VANG_HOM_NAY", '4013000/chỉ');
define("SPECIALIZED",  array('001'=>'Khoa học máy tính', '002'=>'Khoa học dữ liệu', '003'=>'Hải dương học'));
define("DEGREE", array('001'=>'Cử nhân', '002'=>'Thạc sĩ', '003'=>'Tiến sĩ','004'=>'Phó giáo sư', '005'=>'Giáo sư'));
define("YEAR", array('001'=>'Năm 1','002'=>'Năm 2','003'=>'Năm 3','004'=>'Năm 4'));
define("WEEKDAY", array('1'=>'Chủ Nhật','2'=>'Thứ 2','3'=>'Thứ 3','4'=>'Thứ 4','5'=>'Thứ 5','6'=>'Thứ 6','7'=>'Thứ 7',));


define("SUBJECT", array('1'=>'Math'));
define("TEACHER", array('1'=>'Nguyễn Văn An'));
define("LESSION", array('1'=>'Tiết 1','2'=>'Tiết 2','3'=>'Tiết 3','4'=>'Tiết 4','5'=>'Tiết 5','6'=>'Tiết 6','7'=>'Tiết 7', '8'=>'Tiết 8', '9'=>'Tiết 9', '10'=>'Tiết 10'));
define("NOTES", array('1'=>'Math'));

// Mảng: Các toà nhà
// Dùng cho: classroom_search, classroom_add, classroom_edit
$buildings = array("001" => "T1", "002" => "T2", "003" => "T3", "004" => "T4", "005" => "T5");

// Mảng: Chuyên ngành
// Dùng cho: teacher_search, teacher_add, teacher_edit
$specializations = array("001" => "Khoa học máy tính", "002" => "Khoa học dữ liệu", "003" => "Hải dương học");

// Mảng: Bằng cấp
// Dùng cho: teacher_search, teacher_add, teacher_edit
$degrees = array("001" => "Cử nhân", "002" => "Thạc sĩ", "003" => "Tiến sĩ", "004" => "Phó giáo sư", "005" => "Giáo sư");

// Mảng: Tình trạng
// Dùng cho: device_search, device_add, device_edit
$device_statuses = array("" => "", "001" => "Đang mượn", "002" => "Đang rảnh");
