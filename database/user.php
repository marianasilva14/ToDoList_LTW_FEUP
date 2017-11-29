<?php
  function isLoginCorrect($username, $password) {
    global $dbh;
    $stmt = $dbh->prepare('SELECT usr_username, usr_password FROM usr_info WHERE usr_username = ? AND usr_password = ?');
    $stmt->execute(array($username, sha1($password)));
      print_r(array($username, sha1($password)));
    return $stmt->fetch() !== false;
  }

?>
