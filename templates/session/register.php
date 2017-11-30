<?php
/** Inserir dados do novo user **/
function insert_new_user($name, $password, $age,$email){
    // Verificar se todos os dados estão preenchidos
    if (!empty($name) && !empty($password) && !empty($age) && !empty($email)) {
      global $dbh;
        // ENCRIPTAR E MANDAR PARA A BD
        $stmt =$dbh->prepare("INSERT INTO usr_info(null,?,?,?,?)
                VALUES ('$name', '$password', '$age','$email')");
        $stmt->execute();
        // INFORMAR SE INSERIU AO UTILIZADOR
    }
}
?>

<div id="new_register">
  <form action="category/list_categories.php" method="post">
    <input type="hidden" name="form_new_account" value="fna">
    <lable> Username:
      <input class ="input1"type="text" name="username" value="">
    </lable>
        <br></br>
  <lable> Age:
    <input class ="input2" type="data" name="age" value="">
  </lable>
    <br></br>
    <lable> Email:
      <input class ="input3" type="text" name="email" value="">
    </lable>
      <br></br>
  <lable> Password:
    <input class ="input4" type="password" name="password" value="">
  </lable>
    <br></br>
    <div class="submit">
      <input type="submit" value="Register">
    </div>
</div>

<?php
if(isset($_POST['form_new_account']) && $_POST['form_new_account'] == 'fna') {
    // Ler dados vindos do post
    $name         = $_POST['username'];
    $password     = $_POST['password'];
    $age          = $_POST['age'];
    $email        = $_POST['email'];

    print_r('lalala');
    // chamar a função para inserir na bd
    insert_new_user($name, $password, $age, $email);
}
?>
