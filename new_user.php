<?php

include_once('database/user.php');
include_once('includes/init.php');

// Ler dados vindos do post
$name         = $_POST['name'];
$username     = $_POST['username'];
$password     = $_POST['password'];
$age          = $_POST['age'];
$email        = $_POST['email'];


// chamar a função para inserir na bd
insert_new_user($name, $username,$password, $age, $email);
  ob_start();
header('Location: index.php');
  ob_end_flush();
  exit();

?>
