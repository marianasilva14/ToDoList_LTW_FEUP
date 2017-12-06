<?php
  ob_start();

include_once('includes/session_start.php');
include_once('includes/init.php');
include_once('database/category.php');

// Ler dados vindos do post
$description = $_POST['Description'];
$priority = $_POST['Priority'];
$deadline = $_POST['Deadline'];
$toDo =$_POST['toDo'];

insert_new_toDo($toDo,$description,$priority,$deadline);

header("Location: logged.php");

ob_end_flush();

?>
