<?php
  ob_start();
  include_once('includes/init.php');
  session_destroy();
  session_start();
  header('Location: index.php');
  exit();
  ob_end_flush();
?>
