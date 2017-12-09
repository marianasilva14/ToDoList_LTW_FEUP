<?php
include_once('includes/session_start.php');
include_once('database/connection.php');
include_once('database/category.php');
//echo $_GET['toDoList_id'];
if(isset($_GET)){
  $toDoList = getAllToDoByToDoLists($_GET['toDoList_id']);
  $ToDoList_name = getToDoListName($_GET['toDoList_id']);
}
//echo $ToDoList_name[0]['toDoList_name'];

include_once('templates/common/header.php');
include_once('templates/category/myToDo.php');
include_once('templates/common/footer.php');
?>
