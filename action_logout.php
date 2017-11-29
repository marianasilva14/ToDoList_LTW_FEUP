<?php
  ob_start();
  include_once('includes/init.php');
  session_destroy();
  session_start();
  $_SESSION['success_messages'][] = "User logged out!";
  header('Location: index.php');
  exit();
  ob_end_flush();
?>
