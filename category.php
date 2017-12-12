<?php
include_once('includes/session_start.php');
include_once('database/connection.php');
include_once('database/query.php');

if(isset($_GET)){
  $toDoLists = getAllToDoListsByCategory($_GET['cat_id']);
  $category_name= getCategoryName($_GET['cat_id']);
}

include_once('templates/common/header.php');
include_once('templates/category/list_todoLists.php');
include_once('templates/common/footer.php');
?>
