<aside id="todolists">
<?php foreach ($allToDoLists as $toDoList) { ?>
  <li>
   <div class="wrapper">
   <div class="col_third">
    <div class="hover panel">
   <a class="table_toDo" href="toDoList.php?toDoList_id=<?=$toDoList['toDoList_id']?>">
   <div class="front">
     <div class="box1">
       <p><?=$toDoList['toDoList_id']?> : <?=$toDoList['toDoList_name']?></p>
     </div>
   </div>
   <div class="back">
     <div class="box2">
       <p><?=$toDoList['toDoList_id']?> : <?=$toDoList['toDoList_name']?></p>
     </div>
   </div></a>
 </div>
</div>
</div>
<?php  } ?>
</li>
</aside>


<aside id="buttons_MyCategory">
  <a href="back.php"><img src="images/back.png"></a>
</aside>
