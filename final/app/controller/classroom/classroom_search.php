<?php
session_start();
include_once "../../model/classroom.php";
if(isset($_POST["classroomEdit"])){
    header('Location: ./classroom_edit.input.php?id='.$_POST["classroomEdit"]);
 }
 
if(isset($_POST['deleteClassroom'])){
    $popUp=true;
    $_SESSION['deleteClassroom']=$_POST['deleteClassroom'];
    $_SESSION['name']=(searchById($_SESSION['deleteClassroom'])[0])['name'];
    $allClassroom=getAllClassroom();
    include_once "../../view/classroom/classroom_search.php";
}
if(isset($_POST['confirm'])){
    deleteClassroom($_SESSION['deleteClassroom']);
}
if(isset($_POST["classroom_search"])){
        searchAllClassroom();
    }else {
        allClassroom();
    }

function allClassroom(){
    $allClassroom=getAllClassroom();
    include_once "../../view/classroom/classroom_search.php";
}
function searchAllClassroom(){
    $classroomName=$_POST["classroomKey"];
    $building=$_POST["classroomBuilding"];
    if(empty($building)&&!empty($classroomName)) {
        $resultSearch = searchByName($classroomName);
        include_once "../../view/classroom/classroom_search.php";
    }else if (!empty($building)&&empty($classroomName)) {
        $resultSearch=searchByBuilding($building);
        include_once "../../view/classroom/classroom_search.php";
    }
	else if (!empty($building)&&!empty($classroomName)) {
		$resultSearch=searchClassroom($classroomName, $building);
        include_once "../../view/classroom/classroom_search.php";
	}
	else {
		allClassroom();
	}
}
function getStarted(){
    include_once "../../view/classroom/classroom_search.php";
}

?>
