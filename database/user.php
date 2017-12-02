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

function insert_new_user($name, $username,$password, $age, $email,$photo){
  // Verificar se todos os dados estão preenchidos

  if (!empty($name) && !empty($username) && !empty($password) && !empty($age) && !empty($email)) {

    global $dbh;
    // ENCRIPTAR E MANDAR PARA A BD

    if (!empty($photo['name'])) {

		$error = array();

    	// Verifica se o arquivo é uma imagem
    	if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $photo['type'])){
     	   $error[1] = "Isso não é uma imagem.";
   	 	}


		// Se não houver nenhum erro
		if (count($error) == 0) {

			// Pega extensão da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $photo['name'], $ext);

        	// Gera um nome único para a imagem
        	$name_image= md5(uniqid(time())) . "." . $ext[1];

        	// Caminho de onde ficará a imagem
        	$path_image = "images/" . $name_image;

			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($photo['tmp_name'], $path_image);

			// Insere os dados no banco
      $stmt =$dbh->prepare('INSERT INTO usr_info(usr_name,usr_username, usr_password, usr_age,usr_email,usr_photo)
      VALUES (?,?,?,?,?,?)');
		  $stmt->execute(array($name,$username,sha1($password),$age,$email,$name_image));

		}
  }
}

}

function changeUserName($userID,$newName){

  global $dbh;
  $stmt = $dbh->prepare('UPDATE usr_info SET usr_name = ? WHERE usr_id = ?');
  return $stmt->execute(array($newName, $userID));
}

function changeUserEmail($userID,$newEmail){
  global $dbh;
  $stmt = $dbh->prepare('UPDATE usr_info SET usr_email = ? WHERE usr_id = ?');
  return $stmt->execute(array($newEmail, $userID));
}

function changeUserPassword($userID,$newPassword){
  global $dbh;
  $stmt = $dbh->prepare('UPDATE usr_info SET usr_password = ? WHERE usr_id = ?');
	return $stmt->execute(array($newPassword, $userID));
}

?>
