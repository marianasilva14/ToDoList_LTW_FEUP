<section id="todolists">
  <h2>Completed Tasks</h2>
  <ul>
    <h3>Everything I already done</h3>
    <?php foreach ($allToDoLists as $todolist) { ?>
      <li><p href="category.php?cat_id=<?=$todolist['cat_id']?>"><?=$todolist['cat_name']?> : <?=$todolist['toDO_id']?> : <?=$todolist['toDO_description']?></p></li>
      <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
      <script type="text/javascript" src="scripts/list_categories.js"></script>
    <?php } ?>
  </ul>
</section>


<aside id="buttons_MyCategory">
  <a href="back.php"><img src="images/back.png"></a>
</aside>
