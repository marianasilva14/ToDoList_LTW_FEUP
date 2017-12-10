<?php
  ob_start();

include_once('includes/session_start.php');
include_once('includes/init.php');
include_once('database/query.php');

// Ler dados vindos do post
$description = $_POST['Description'];
$priority = $_POST['Priority'];
$deadline = $_POST['Deadline'];
$toDo_name = $_POST['toDo'];

insert_new_toDo($toDo_name,$description,$priority,$deadline);
echo "FEZ A QUERIE";
header("Location: templates/category/myToDo.php");

ob_end_flush();

?>
