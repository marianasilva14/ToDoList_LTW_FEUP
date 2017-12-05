<?php
ob_start();

include_once('includes/session_start.php');
include_once('includes/init.php');
include_once('database/category.php');

$search = $_POST['search'];

$toDo= getToDo($search);

if($toDo[0]['toDO_description']==$search){

  include_once('templates/common/header.php');
  include_once('templates/category/search.php');
  include_once('templates/common/footer.php');

}
else{
    echo "coco";
  header("Location: logged.php");
}

ob_end_flush();


?>
