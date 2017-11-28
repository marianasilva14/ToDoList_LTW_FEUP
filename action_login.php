<?php
include_once('includes/init.php');
include_once('database/user.php');

  if (isLoginCorrect($_POST['username'], $_POST['password'])) {
    setCurrentUser($_POST['username']);
    $_SESSION['success_messages'][] = "Login Successful!";
    print_r('LALALAL');

  } else {
    $_SESSION['error_messages'][] = "Login Failed!";
  }
  print_r('OKAY');
/*  header('Location: ../templates/category/list_categories.php');*/
?>
