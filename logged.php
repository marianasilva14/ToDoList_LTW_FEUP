<?php
include_once('includes/session_start.php');
include_once('database/connection.php');
include_once('database/query.php');

$categories = getAllCategories();
$allLists = getAllToDoLists();
$allUsers = getAllUsers();

include_once('templates/common/header.php');
include_once('templates/category/list_categories.php');
include_once('templates/common/footer.php');


if(isset($_SESSION['error_messages'])){
    $error=$_SESSION['error_messages'];
    echo "<script type='text/javascript'>alert('$error');</script>";
    unset($_SESSION['error_messages']);
}
?>
