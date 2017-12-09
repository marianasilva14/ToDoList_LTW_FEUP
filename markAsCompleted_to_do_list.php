<?php
ob_start();

include_once('includes/session_start.php');
include_once('includes/init.php');
include_once('database/category.php');

// Ler dados vindos do post
$id = $_POST['to_do_listID'];

markAsCompleted_to_do_list($id);

ob_end_flush();

?>