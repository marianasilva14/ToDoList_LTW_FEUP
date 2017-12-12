<?php
ob_start();
include_once('includes/session_start.php');
include_once('database/connection.php');
include_once('database/query.php');

$search = $_POST['search'];

$toDoList= getToDoList("PersonalProject");

if($toDo[0]['toDO_description']==$search){

  include_once('templates/common/header.php');
  include_once('templates/common/buttons.php');
  include_once('templates/category/search.php');
  include_once('templates/common/footer.php');

}
else if($toDoList[0]['toDoList_name']==$search ){
  include_once('templates/common/header.php');
  include_once('templates/common/buttons.php');
  include_once('templates/category/search_toDoList.php');
  include_once('templates/common/footer.php');
}
else{
  //echo var_dump("NO ELSE"); die();
    header("Location: logged.php");
}

ob_end_flush();


?>
