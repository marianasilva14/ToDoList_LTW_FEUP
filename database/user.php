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

		// Largura máxima em pixels
		$largura = 1024;
		// Altura máxima em pixels
		$altura = 1024;
		// Tamanho máximo do arquivo em bytes
		$tamanho = 10000;

		$error = array();

    	// Verifica se o arquivo é uma imagem
    	if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $photo['type'])){
     	   $error[1] = "Isso não é uma imagem.";
   	 	}

		// Pega as dimensões da imagem
		$dimensoes = getimagesize($photo['tmp_name']);

		// Verifica se a largura da imagem é maior que a largura permitida
		if($dimensoes[0] > $largura) {
			$error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
		}

		// Verifica se a altura da imagem é maior que a altura permitida
		if($dimensoes[1] > $altura) {
			$error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
		}

		// Verifica se o tamanho da imagem é maior que o tamanho permitido
		if($photo['size'] > $tamanho) {
   		 	$error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
		}

		// Se não houver nenhum erro
		if (count($error) == 0) {

			// Pega extensão da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $photo['name'], $ext);
  echo "hooooo";
        	// Gera um nome único para a imagem
        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
  echo "h32vo32";
        	// Caminho de onde ficará a imagem
        	$caminho_imagem = "images/" . $nome_imagem;
  echo "eblerbio";
			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($photo['tmp_name'], $caminho_imagem);
  echo "aqui1234";
			// Insere os dados no banco
      $stmt =$dbh->prepare('INSERT INTO usr_info(usr_id,usr_name,usr_username, usr_password, usr_age,usr_email,usr_photo)
      VALUES (?,?,?,?,?,?,?)');
		  $stmt->execute(array(NULL,$name,$username,sha1($password),$age,$email,$nome_imagem));
        echo "ultimo";
		}
  }
}

}
?>
