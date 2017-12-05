<?php
  ob_start();

include_once('includes/session_start.php');
include_once('includes/init.php');
include_once('database/category.php');

$search = $_POST['search'];
    $toDo= getToDo($search)

if( in_array ($search ,$todo,true)
  header("Location: templates/category/search.php");
else if{
  header("Location: index.php");
}
ob_end_flush();

?>
