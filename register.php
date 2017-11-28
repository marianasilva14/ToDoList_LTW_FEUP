<?php
include_once('database/connection.php');
include_once('database/category.php');

$categories = getAllCategories();

include_once('templates/common/header.php');
include_once('templates/session/register.php');
include_once('templates/common/footer.php');
?>
