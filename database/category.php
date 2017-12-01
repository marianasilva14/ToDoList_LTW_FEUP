<?php
  function getAllCategories() {
    global $dbh;
    $stmt = $dbh->prepare("SELECT * FROM category ORDER BY cat_name");
    $stmt->execute();
    return $stmt->fetchAll();
  }

  function getAllToDoLists() {
    global $dbh;
    $stmt = $dbh->prepare("SELECT toDO_description FROM to_do,category WHERE category.cat_id=to_do.cat_id
    ORDER BY toDO_description");
    echo "aquiiiii";
    $stmt->execute();
    return $stmt->fetchAll();
  }
?>
