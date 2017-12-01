<?php
session_start();
include_once('database/category.php');

$category = getAllToDoLists();

include_once('templates/common/header.php');
include_once('templates/category/myCategory.php');
include_once('templates/common/footer.php');
?>
