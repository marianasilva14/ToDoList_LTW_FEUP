<?php
  ob_start();

include_once('includes/session_start.php');
include_once('includes/init.php');
include_once('database/query.php');

// Ler dados vindos do post
$description = $_POST['Description'];
$priority = $_POST['Priority'];
$deadline = $_POST['Deadline'];
$List_id = $_POST['ListID'];

if ( !preg_match ("/^[a-zA-Z\s]+$/", $description) ) {
    print_r(json_encode("Error"));
}
else{
  try{
    insert_new_toDo($List_id,$description,$priority,$deadline);
    $result = getAllToDoByToDoLists($List_id);
    print_r (json_encode($result));
  }
  catch(Exception $e){
    print_r(json_encode("Error"));
  }
}
ob_end_flush();

?>
