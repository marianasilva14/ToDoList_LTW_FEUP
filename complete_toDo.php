<?php
ob_start();
include_once('includes/session_start.php');
include_once('database/connection.php');
include_once('database/query.php');

// Ler dados vindos do post
$id = $_POST['to_doID'];
$listid = $_POST['listid'];

complete_toDo($id);

$result = getAllToDoByToDoLists($listid);
print_r (json_encode($result));

ob_end_flush();

?>

