<?php
include_once('includes/session_start.php');
include_once('database/connection.php');
include_once('database/category.php');


$toDoLists = getAllToDoListsNotCompleted();
$category_name= "All List's";


include_once('templates/common/header.php');
include_once('templates/category/list_todoLists.php');
include_once('templates/common/footer.php');

?>
