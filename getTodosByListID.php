<?php
ob_start();

include_once('includes/session_start.php');
include_once('includes/init.php');
include_once('database/query.php');

$id = $_POST['listid'];

$result = getAllToDoByToDoLists($id);
print_r (json_encode($result));
ob_end_flush();

?>
