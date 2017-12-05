<section id="todolists">
  <h2>Completed Tasks</h2>
  <ul>
    <h3>Everything I already done</h3>
    <?php foreach ($allToDoLists as $todolist) { ?>
      <li><p href="category.php?cat_id=<?=$todolist['cat_id']?>"><?=$todolist['cat_name']?> : <?=$todolist['toDO_id']?> : <?=$todolist['toDO_description']?></p></li> 
    <?php } ?>
  </ul>
</section>


<aside id="buttons_MyCategory">
  <a href="back.php"><img src="images/back.png"></a>
</aside>
