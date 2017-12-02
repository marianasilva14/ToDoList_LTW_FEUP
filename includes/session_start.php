<?php 
session_start();

if (!(isset($_SESSION['usr_info']) && $_SESSION['usr_info']['usr_name'] != '')) { 
    header('Location: index.php');
}
    
?>