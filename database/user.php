<?php
  function isLoginCorrect($username, $password) {
    global $dbh;
    $stmt = $dbh->prepare('SELECT * FROM usr_info WHERE usr_username = ? AND usr_password = ?');
    $stmt->execute(array($username, sha1($password)));
    
    $result= $stmt->fetch();

    if(!$result)
      return false;

    $_SESSION['usr_info'] = $result;
    return true;
  }
?>
