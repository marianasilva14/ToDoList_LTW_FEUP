<?php
  function getAllCategories() {
    global $dbh;
    $stmt = $dbh->prepare("SELECT * FROM category ORDER BY cat_name");
    $stmt->execute();
    return $stmt->fetchAll();
  }

  function getAllToDoLists($cat_id) {
    global $dbh;
    $stmt = $dbh->prepare("SELECT cat_name, toDO_description FROM to_do JOIN category ON(category.cat_id = to_do.cat_id) WHERE toDO_id=?");
    $stmt->execute(array($cat_id));
    return $stmt->fetchAll();
  }
?>
