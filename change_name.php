<?php
	include_once('includes/session_start.php');
  include_once('database/connection.php');
  include_once('database/user.php');


  $newName=$_POST['name'];
//TODO get error messages like index  
  if ( !preg_match ("/^[a-zA-Z\s]+$/", $newName)) {
    echo 'Error: Name can only contain spaces or letters';
  }else{
    if (changeUserName($_SESSION['usr_info']['usr_id'],$newName) == 1){
      $_SESSION['usr_info']['usr_name'] = $newName;
      header("Location: logged.php");
    }
    else{
      echo 'Something went wrong trying to change your name';
    }
  }
 ?>
