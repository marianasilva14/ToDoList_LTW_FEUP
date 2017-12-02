<?php
  function getAllCategories() {
    global $dbh;
    $stmt = $dbh->prepare("SELECT * FROM category ORDER BY cat_name");
    $stmt->execute();
    return $stmt->fetchAll();
  }

  function getAllToDoLists($cat_id) {
    global $dbh;
    $stmt = $dbh->prepare("SELECT cat_name, toDO_description FROM to_do JOIN category ON(category.cat_id = to_do.cat_id) JOIN usr_info ON(usr_info.usr_id = to_do.usr_id) WHERE category.cat_id=?
    AND usr_info.usr_id=?");
    $stmt->execute(array($cat_id,$_SESSION['usr_info']['usr_id']));
    return $stmt->fetchAll();
  }

function insert_new_toDoList($category,$description){
  global $dbh;
  $stmt = $dbh->prepare("SELECT * FROM category WHERE cat_name=?");
  $stmt->execute(array($category));
  $result=$stmt->fetch();

  if(!$result)
      header("Location: logged.php");

  $stmt2 =$dbh->prepare("INSERT INTO to_do(toDO_description,cat_id,usr_id)
  VALUES (?,?,?)");
  $stmt2->execute(array($description,$result['cat_id'], $_SESSION['usr_info']['usr_id']));
}

?>
