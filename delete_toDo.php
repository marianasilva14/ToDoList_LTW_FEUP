<?php
ob_start();

include_once('includes/session_start.php');
include_once('includes/init.php');
include_once('database/query.php');

// Ler dados vindos do post
$id = $_POST['to_doID'];
$category = $_POST['Category'];


delete_toDo($category,$id);

header("Location: logged.php");

ob_end_flush();

?>
