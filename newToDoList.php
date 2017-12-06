<?php
  ob_start();

include_once('includes/session_start.php');
include_once('includes/init.php');
include_once('database/category.php');

// Ler dados vindos do post
$name = $_POST['Name'];
$category = $_POST['Category'];

insert_new_toDoList($category,$name);

header("Location: logged.php");

ob_end_flush();

?>
