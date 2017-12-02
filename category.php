<?php
session_start();
include_once('database/connection.php');
include_once('database/category.php');

if(isset($_GET)){
  $categories = getAllToDoLists($_GET['cat_id']);
}

include_once('templates/common/header.php');
include_once('templates/category/myCategory.php');
include_once('templates/common/footer.php');
?>
