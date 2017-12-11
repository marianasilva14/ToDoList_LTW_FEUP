<?php
  ob_start();
  session_start();
  include_once('includes/init.php');
  include_once('database/user.php');

  if (isLoginCorrect($_POST['username'], $_POST['password'])) {
    header("Location: logged.php");
    exit();
  } else {
    $_SESSION['error_messages']= "Login Failed!";
    header('Location: index.php');
    exit();
  }
  ob_end_flush();
?>
