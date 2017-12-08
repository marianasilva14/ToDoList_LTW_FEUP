<?php
function getAllCategories() {
  global $dbh;
  $stmt = $dbh->prepare("SELECT * FROM category ORDER BY cat_name");
  $stmt->execute();
  return $stmt->fetchAll();
}

function getAllToDoListsByCategory($cat_id) {
  global $dbh;
  $stmt = $dbh->prepare("SELECT * FROM to_do_list JOIN category ON(to_do_list.cat_id = category.cat_id) JOIN usr_info ON(usr_info.usr_id = to_do_list.usr_id) WHERE to_do_list.cat_id=?
  AND usr_info.usr_id=? AND to_do_list.toDoList_isCompleted=?");
  $stmt->execute(array($cat_id,$_SESSION['usr_info']['usr_id'],0));
  return $stmt->fetchAll();
}

function getAllToDoByToDoLists($toDoList_id) {
  global $dbh;
  $stmt = $dbh->prepare("SELECT * FROM to_do JOIN to_do_list ON(to_do_list.toDoList_id = to_do.toDoList_id) JOIN usr_info ON(usr_info.usr_id = to_do_list.usr_id) WHERE to_do_list.toDoList_id=?
  AND usr_info.usr_id=? AND to_do_list.toDoList_isCompleted=?");
  $stmt->execute(array($toDoList_id,$_SESSION['usr_info']['usr_id'],0));
  return $stmt->fetchAll();
}

function getAllToDoListsCompleted() {
  global $dbh;
  $stmt = $dbh->prepare("SELECT toDoList_name FROM to_do JOIN to_do_list ON(to_do_list.toDoList_id = to_do.toDoList_id) JOIN usr_info ON(usr_info.usr_id = to_do.usr_id) WHERE usr_info.usr_id=? AND to_do_list.toDoList_isCompleted=?");
  $stmt->execute(array($_SESSION['usr_info']['usr_id'],1));
  return $stmt->fetchAll();
}

function getAllToDoListsNotCompleted() {
  global $dbh;
  $stmt = $dbh->prepare("SELECT toDoList_name FROM to_do JOIN to_do_list ON(to_do_list.toDoList_id = to_do.toDoList_id) JOIN usr_info ON(usr_info.usr_id = to_do.usr_id) WHERE usr_info.usr_id=? AND to_do_list.toDoList_isCompleted=?");
  $stmt->execute(array($_SESSION['usr_info']['usr_id'],0));
  return $stmt->fetchAll();
}

function getToDoList($ToDoList_name) {
  global $dbh;
  $stmt = $dbh->prepare("SELECT * FROM to_do_list JOIN category ON(category.cat_id = to_do_list.cat_id) JOIN usr_info ON(usr_info.usr_id = to_do_list.usr_id) WHERE to_do_list.toDoList_name=? AND usr_info.usr_id=?");
  $stmt->execute(array($ToDoList_name,$_SESSION['usr_info']['usr_id']));
  return $stmt->fetchAll();
}

function getCategoryName($cat_id){
  global $dbh;
  $stmt = $dbh->prepare("SELECT * FROM category WHERE cat_id=?");
  $stmt->execute(array($cat_id));
  return $stmt->fetchAll();
}

function getToDoListName($ToDoList_id){
  global $dbh;
  $stmt = $dbh->prepare("SELECT * FROM to_do_list WHERE toDoList_id=?");
  $stmt->execute(array($ToDoList_id));
  return $stmt->fetchAll();
}

function insert_new_toDoList($category,$name){
  global $dbh;
  $stmt = $dbh->prepare("SELECT * FROM category WHERE cat_name=?");
  $stmt->execute(array($category));
  $result=$stmt->fetch();

  echo $result['cat_id'];
  if(!$result)
  header("Location: logged.php");

  $stmt2 =$dbh->prepare("INSERT INTO to_do_list(toDoList_name,cat_id,usr_id)
  VALUES (?,?,?)");
  $stmt2->execute(array($name,$result['cat_id'], $_SESSION['usr_info']['usr_id']));
}

function insert_new_toDo($toDoList,$description,$priority,$deadline){
  global $dbh;
  $stmt = $dbh->prepare("SELECT * FROM to_do_list WHERE toDoList_name=?");
  $stmt->execute(array($toDoList));
  $result=$stmt->fetch();

  if(!$result)
  header("Location: logged.php");
  $stmt2 =$dbh->prepare("INSERT INTO to_do(toDoList_id,toDO_description,toDO_priority,toDO_deadline,usr_id)
  VALUES (?,?,?,?,?)");
  $stmt2->execute(array($result['toDoList_id'],$description, $priority,$deadline, $_SESSION['usr_info']['usr_id']));
}

function delete_toDo($toDoList,$to_doID){
  global $dbh;
  $stmt = $dbh->prepare("SELECT * FROM to_do_list WHERE toDoList_name=?");
  $stmt->execute(array($toDoList));
  $result=$stmt->fetch();

  if(!$result)
  header("Location: logged.php");

  $stmt2 =$dbh->prepare("DELETE FROM to_do WHERE toDO_id IN (SELECT toDO_id FROM to_do JOIN category ON(category.cat_id = to_do.cat_id) JOIN usr_info ON(usr_info.usr_id = to_do.usr_id) WHERE category.cat_id=? AND usr_info.usr_id=? AND to_do.toDO_id=?)");
  $stmt2->execute(array($result['cat_id'], $_SESSION['usr_info']['usr_id'], $to_doID));
}


function markAsCompleted_toDo($category,$to_doID){
  global $dbh;
  $stmt = $dbh->prepare("SELECT * FROM category WHERE cat_name=?");
  $stmt->execute(array($category));
  $result=$stmt->fetch();

  $stmt2 = $dbh->prepare('UPDATE to_do SET toDo_isCompleted = 1 WHERE to_do.toDo_id = ?');
  return $stmt2->execute(array($to_doID));
}
?>
