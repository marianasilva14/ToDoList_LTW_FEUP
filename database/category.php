<?php
  function getAllCategories() {
    global $dbh;
    $stmt = $dbh->prepare("SELECT * FROM category ORDER BY cat_name");
    $stmt->execute();
    return $stmt->fetchAll();
  }

  function getAllToDoLists() {
    global $dbh;
    echo "aqui";
    $stmt = $dbh->prepare("SELECT toDO_description FROM to_do
      JOIN category USING(cat_id) WHERE toDO_id=?");
      echo "aquino";
    $stmt->execute();
    return $stmt->fetchAll();
  }
?>
