<?php

  include_once('includes/session_start.php');
    include_once('database/connection.php');
    include_once('database/user.php');

	$newEmail=$_POST['email'];

    if (changeUserEmail($_SESSION['usr_info']['usr_id'],$newEmail) == 1){
		$_SESSION['usr_info']['usr_email'] = $newEmail;
		header("Location: logged.php");
    }
    else{
      echo 'Something went wrong trying to change your email';
    }
 ?>
