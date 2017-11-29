<?php
include_once('includes/init.php');
include_once('database/user.php');

  if (isLoginCorrect($_POST['username'], $_POST['password'])) {
    setCurrentUser($_POST['username']);
    $_SESSION['success_messages'][] = "Login Successful!";
    print_r('LALALAL');
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
  } else {
    $_SESSION['error_messages'][] = "Login Failed!";
    header('Location: http://localhost:8888/index.php');
    exit();
  }
  print_r('OKAY');

?>
