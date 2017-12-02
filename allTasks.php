<?php
include_once('includes/session_start.php');
include_once('database/connection.php');
include_once('database/category.php');

$allToDoLists = getAllToDoLists();

include_once('templates/common/header.php');
include_once('templates/category/list_categories.php');
include_once('templates/common/footer.php');

?>
