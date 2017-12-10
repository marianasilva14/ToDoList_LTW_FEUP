<table id="todo_search">
     <tr><td> <class="table_toDo" href="category.php?cat_id=<?=$toDo[0]['cat_id']?>"><?=$toDo[0]['toDO_id']?> : <?=$toDo[0]['toDO_description']?>&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;</td>
       <td><class="table_toDo_priority" type="text" ><?=$toDo[0]['toDO_priority']?></td>
       <?php if($toDo[0]['toDO_priority']=='High priority'){
         $imagem= "images/higher.png";
       }
       else if($toDo[0]['toDO_priority']=='Medium priority'){
          $imagem= "images/medium.png";
       }
       else{
          $imagem= "images/lower.png";
       }?>
       <td>&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;<img src="<?php echo $imagem;?>"></td>
      <td><class="table_toDo_deadline" type="text" >&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;<?=$toDo[0]['toDO_deadline']?></td>
     </tr>
</table>

<aside id="buttons_MyCategory">

<a class="markTask" data-popup-markTask-open="popup-1" href="#"><img src="images/completed.png"></a>
  <div class="popup-markTask" data-popup-markTask="popup-1">
    <div class="popup-inner-markTask">

      <form action="mark_as_completed.php" method="post">
         <select class="dropdown"name="Category" >
            <li><option class="cat" id="Category" name="Category" href="#"><?=$categories[0]['cat_name']?></option></li>
        </select>
        <input class="inputField-markTask" type="number" id="to_doID" required="required" name="to_doID" placeholder="Task ID">
        <br></br>
        <input id="submit" type="submit" value ="markTask">
      </form>

      <a class="popup-close-markTask" data-popup-close-markTask="popup-1" href="#"></a>
    </div>
  </div>

  <a class="delete_task" data-popup-deleteTask-open="popup-1" href="#"><img src="images/delete.png"></a>
  <div class="popup-deleteTask" data-popup-deleteTask="popup-1">
    <div class="popup-inner-deleteTask">

      <form action="delete_toDo.php" method="post">
         <select class="dropdown"name="Category" >
            <li><option class="cat" id="Category" name="Category" href="#"><?=$categories[0]['cat_name']?></option></li>
        </select>
        <input class="inputField-deleteTask" type="number" id="to_doID" required="required" name="to_doID" placeholder="Task ID">
        <br></br>
        <input id="submit" type="submit" value ="DeleteTask">
      </form>

      <a class="popup-close-deleteTask" data-popup-close-deleteTask="popup-1" href="#"></a>
    </div>
  </div>

  <a class="NewTask" data-popup-addTask-open="popup-1" href="#"><img src="images/plus.png"></a>
  <div class="popup-addTask" data-popup-addTask="popup-1">
    <div class="popup-inner-addTask">
      <form action="new_todo.php" method="post">
        <select class="dropdown"name="Category" >
            <li><option class="cat" id="Category" name="Category" href="#"><?=$categories[0]['cat_name']?></option></li>
        </select>
        <input class="inputField-addTask" type="text" id="Description" required="required" name="Description" placeholder="Description">
        <input class="deadline" type="date" name="deadline" id="deadline">
        <select class=priority name="priority" >
            <li><option class="priority1" name="priority" id="priority" href="#">High priority</option></li>
            <li><option class="priority2" name="priority" id="priority" href="#">Medium priority</option></li>
            <li><option class="priority3" name="priority" id="priority" href="#">Low priority</option></li>
        </select>
        <br></br>
        <input id="submit" type="submit" value ="AddTask">
      </form>

      <a class="popup-close-addTask" data-popup-close-addTask="popup-1" href="#"></a>
    </div>
  </div>

  <a href="back.php"><img src="images/back.png"></a>
</aside>
