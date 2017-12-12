<?php
include_once('includes/session_start.php');
include_once('database/connection.php');
include_once('database/query.php');

if(isset($_GET)){
  $toDoListid = $_GET['toDoList_id'];
}

include_once('templates/common/header.php');
include_once('templates/category/myToDoList.php');
include_once('templates/common/footer.php');
?>
