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


if(!$result)
    header("Location: logged.php");




$stmt2 =$dbh->prepare("INSERT INTO to_do(toDO_id,toDO_description,cat_id,usr_id)
VALUES (?,?,?,?)");
$stmt2->execute(array(NULL,$description,$result['cat_id'], $_SESSION['usr_info']['usr_id']));


/*$stmt3 = $dbh->prepare("SELECT * FROM to_do");
$stmt3->execute();

foreach ($stmt3->fetch() as $result2){
    echo $result2['toDO_description'];
    echo $result2['usr_id'];
}*/

header("Location: logged.php");



  ob_end_flush();

?>