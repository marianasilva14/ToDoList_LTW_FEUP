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
  $stmt = $dbh->prepare("SELECT * FROM to_do JOIN to_do_list ON(to_do_list.toDoList_id = to_do.toDoList_id) JOIN usr_info ON(usr_info.usr_id = to_do_list.usr_id) WHERE to_do_list.toDoList_id=?");
  $stmt->execute(array($toDoList_id));
  return $stmt->fetchAll();
}

function getAllToDoLists() {
  global $dbh;
  $stmt = $dbh->prepare("SELECT * FROM to_do_list JOIN usr_info ON(usr_info.usr_id = to_do_list.usr_id) WHERE usr_info.usr_id=?");
  $stmt->execute(array($_SESSION['usr_info']['usr_id']));
  return $stmt->fetchAll();
}

function getAllUsers() {
  global $dbh;
  $stmt = $dbh->prepare("SELECT * FROM usr_info WHERE usr_id <>?");
  $stmt->execute(array($_SESSION['usr_info']['usr_id']));
  return $stmt->fetchAll();
}

function insertShareList($toDoList,$userId){
  global $dbh;
  $stmt =$dbh->prepare("INSERT INTO share(toDoList_id,usr_id)
  VALUES (?,?)");
  $stmt->execute(array($toDoList, $userId));
}

function getShareList(){
  global $dbh;
  $stmt =$dbh->prepare("SELECT * FROM share JOIN to_do_list ON (share.toDoList_id = to_do_list.toDoList_id)
  JOIN usr_info ON (share.usr_id = usr_info.usr_id) WHERE usr_info.usr_id=?");
  $stmt->execute(array($_SESSION['usr_info']['usr_id']));
  return $stmt->fetchAll();
}

function getAllToDoListsCompleted() {
  global $dbh;
  $stmt = $dbh->prepare("SELECT * FROM to_do_list JOIN usr_info ON(usr_info.usr_id = to_do_list.usr_id) WHERE usr_info.usr_id=? AND to_do_list.toDoList_isCompleted=?");
  $stmt->execute(array($_SESSION['usr_info']['usr_id'],1));
  return $stmt->fetchAll();
}

function getAllToDoListsNotCompleted() {
  global $dbh;
  $stmt = $dbh->prepare("SELECT * FROM to_do_list JOIN usr_info ON(usr_info.usr_id = to_do_list.usr_id) WHERE usr_info.usr_id=? AND to_do_list.toDoList_isCompleted=?");
  $stmt->execute(array($_SESSION['usr_info']['usr_id'],0));
  return $stmt->fetchAll();
}

function getToDoList($ToDoList_name) {
  global $dbh;
  $stmt = $dbh->prepare("SELECT * FROM to_do_list JOIN category ON(category.cat_id = to_do_list.cat_id)
  JOIN usr_info ON(usr_info.usr_id = to_do_list.usr_id) WHERE to_do_list.toDoList_name=? AND usr_info.usr_id=?");

  $stmt->execute(array($ToDoList_name, $_SESSION['usr_info']['usr_id']));
  return $stmt->fetchAll();
}

function getToDo($ToDo_name) {
  global $dbh;
  $stmt = $dbh->prepare("SELECT * FROM to_do JOIN to_do_list ON(to_do_list.toDoList_id = to_do.toDO_id) JOIN usr_info ON(usr_info.usr_id = to_do.usr_id) WHERE to_do.toDO_description=? AND usr_info.usr_id=?");
  $stmt->execute(array($ToDo_name,$_SESSION['usr_info']['usr_id']));
  return $stmt->fetchAll();
}

function getCategoryName($cat_id){
  global $dbh;
  $stmt = $dbh->prepare("SELECT * FROM category WHERE cat_id=?");
  $stmt->execute(array($cat_id));
  return $stmt->fetchAll();
}

function insert_new_toDoList($category,$name){
  global $dbh;
  $stmt = $dbh->prepare("SELECT * FROM category WHERE cat_name=?");
  $stmt->execute(array($category));
  $result=$stmt->fetch();

  if(!$result)
  header("Location: logged.php");

  $stmt2 =$dbh->prepare("INSERT INTO to_do_list(toDoList_name,cat_id,usr_id)
  VALUES (?,?,?)");
  $stmt2->execute(array($name,$result['cat_id'], $_SESSION['usr_info']['usr_id']));

  $stmt3 =$dbh->prepare("SELECT MAX(toDoList_id) As ID FROM to_do_list");
  $stmt3->execute();
  $returnID = $stmt3->fetch();
  return $returnID['ID'];
}

function insert_new_toDo($toDoList,$description,$priority,$deadline){
  global $dbh;
  $stmt =$dbh->prepare("INSERT INTO to_do(toDO_description,toDO_priority,toDO_deadline,toDoList_id,usr_id)
  VALUES (?,?,?,?,?)");
  $stmt->execute(array($description,$priority,$deadline,$toDoList,$_SESSION['usr_info']['usr_id']));
}

function delete_to_do_list($to_do_listID){
  global $dbh;

  $stmt2 =$dbh->prepare("DELETE FROM to_do_list WHERE toDoList_id IN (SELECT toDoList_id FROM to_do_list JOIN usr_info ON(usr_info.usr_id = to_do_list.usr_id) WHERE usr_info.usr_id=? AND to_do_list.toDoList_id=?)");
  $stmt2->execute(array($_SESSION['usr_info']['usr_id'], $to_do_listID));
}

function delete_toDo($to_doID){
  global $dbh;

  $stmt2 =$dbh->prepare("DELETE FROM to_do WHERE toDO_id IN (SELECT toDO_id FROM to_do WHERE to_do.toDO_id=?)");
  return $stmt2->execute(array($to_doID));
}


function complete_toDo($to_doID){
  global $dbh;
  $stmt2 = $dbh->prepare('UPDATE to_do SET toDo_isCompleted = 1 WHERE to_do.toDo_id = ?');
  return $stmt2->execute(array($to_doID));
}

function markAsCompleted_to_do_list($id){
  global $dbh;
  $stmt2 = $dbh->prepare('UPDATE to_do_list SET toDoList_isCompleted = 1 WHERE to_do_list.toDoList_id = ?');
  return $stmt2->execute(array($id));
}
?>
