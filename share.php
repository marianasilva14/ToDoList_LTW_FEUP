<?php
  ob_start();
include_once('includes/session_start.php');
include_once('database/connection.php');
include_once('database/query.php');

// Ler dados vindos do post
$toDoList = $_POST['list_id'];
$userId = $_POST['user_id'];


$result = insertShareList($toDoList,$userId);
print_r (json_encode($result));
header("Location: logged.php");
ob_end_flush();

?>
