<?php
ob_start();

include_once('includes/session_start.php');
include_once('includes/init.php');
include_once('database/category.php');

// Ler dados vindos do post
$description = $_POST['Description'];
$category = $_POST['Category'];


delete_toDo($category,$description);

header("Location: logged.php");

ob_end_flush();

?>