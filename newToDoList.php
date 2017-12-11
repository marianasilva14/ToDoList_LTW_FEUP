<?php
  ob_start();

include_once('includes/session_start.php');
include_once('includes/init.php');
include_once('database/query.php');

// Ler dados vindos do post

$name = $_POST['name'];
$category = $_POST['category'];

if ( !preg_match ("/^[a-zA-Z\s]+$/", $name) ) {
  echo "Error";
}
else{
  try{
    $result= insert_new_toDoList($category,$name);
    echo $result;
  }
  catch(Exception $e){
    echo "Error";
  }
}
ob_end_flush();

?>
