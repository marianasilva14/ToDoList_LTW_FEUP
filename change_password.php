<?php
    session_start();

    include_once('database/connection.php');
	  include_once('database/user.php');

    $newPassword=$_POST['password'];

	$newPass = sha1($newPassword);

	if (changeUserPassword($_SESSION['usr_info']['usr_id'],$newPass) == 1){
		header("Location: logged.php");
    }
    else{
		echo 'Something went wrong trying to change your passsword';
	}

 ?>
