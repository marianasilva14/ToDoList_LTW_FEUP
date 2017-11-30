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

function insert_new_user($name, $password, $age,$email){
  // Verificar se todos os dados estão preenchidos

  if (!empty($name) && !empty($password) && !empty($age) && !empty($email)) {

    global $dbh;
    // ENCRIPTAR E MANDAR PARA A BD
    $stmt =$dbh->prepare('INSERT INTO usr_info(usr_id,usr_username, usr_password, usr_age,usr_email)
    VALUES (?,?,?,?,?)');

    $stmt->execute(array(NULL,$name,sha1($password),$age,$email));
  }
}
?>
