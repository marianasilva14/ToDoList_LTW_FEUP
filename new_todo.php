<?php
  ob_start();

session_start();
include_once('includes/init.php');

// Ler dados vindos do post
$description = $_POST['Description'];
$category = $_POST['Category'];

global $dbh;
$stmt = $dbh->prepare("SELECT * FROM category WHERE cat_name=?");
$stmt->execute(array($category));
$result=$stmt->fetch();


if(!result)
    header("Location: logged.php");



$stmt =$dbh->prepare('INSERT INTO to_do(toDO_id,toDO_description,cat_id,usr_id)
VALUES (?,?,?,?)');
$stmt->execute(array(10,$description,$result['cat_id'], $_SESSION['usr_info']['usr_id']);




  ob_end_flush();

?>