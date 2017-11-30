<?php

include_once('database/user.php');
include_once('includes/init.php');

// Ler dados vindos do post
$name         = $_POST['name'];
$username     = $_POST['username'];
$password     = $_POST['password'];
$age          = $_POST['age'];
$email        = $_POST['email'];
$photo        = $_FILES['photo'];

// chamar a função para inserir na bd
insert_new_user($name, $username,$password, $age, $email,$photo);
header('Location: index.php');


?>
