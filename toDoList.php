<?php
include_once('includes/session_start.php');
include_once('database/connection.php');
include_once('database/category.php');

if(isset($_GET)){
  $toDoList = getAllToDoByToDoLists($_GET['toDoList_id']);
}

include_once('templates/common/header.php');
include_once('templates/category/myToDo.php');
include_once('templates/common/footer.php');
?>
