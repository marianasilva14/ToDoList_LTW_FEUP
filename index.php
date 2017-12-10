<?php
session_start();
include_once('templates/common/header.php');
include_once('templates/common/footer.php');

if($_SERVER['REQUEST_URI'] != '/register.php')
  include_once('templates/session/user.php');
?>
