<?php
	session_start();
    include_once('database/connection.php');
    include_once('database/user.php');


	$newName=$_POST['name'];

    if (changeUserName($_SESSION['usr_info']['usr_id'],$newName) == 1){
		$_SESSION['usr_info']['usr_name'] = $newName;

		header("Location: logged.php");
		echo "aqui";
    }
    else{
      echo 'Something went wrong trying to change your email';
    }
 ?>
