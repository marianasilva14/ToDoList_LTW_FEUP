<section id="todolists">
<?php foreach ($toDoLists as $toDoList) { ?>
  <li>
   <div class="wrapper">
   <div class="col_third">
    <div class="hover panel">
   <a class="table_toDo" href="toDoList.php?toDoList_id=<?=$toDoList['toDoList_id']?>">
   <div class="front">
     <div class="box1">
       <p hidden><?=$toDoList['toDoList_id']?></p>
       <p><?=$toDoList['toDoList_name']?></p>
     </div>
   </div>
   <div class="back">
     <div class="box2">
       <p hidden><?=$toDoList['toDoList_id']?></p>
       <p><?=$toDoList['toDoList_name']?></p>
     </div>
   </div></a>
 </div>
</div>
</div>
<?php  } ?>
</li>
</section>
