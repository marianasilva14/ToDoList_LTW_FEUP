<table id="todolists">
  <ul>
    <tr><td> <b><?php echo $categories[0]['cat_name'] ?></b></tr></td>
    <?php foreach ($categories as $category) { ?>
     <tr><td> <class="table_toDo" href="category.php?cat_id=<?=$category['cat_id']?>"><?=$category['toDO_description']?>&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;</td>
       <td><class="table_toDo_priority" type="text" ><?=$category['toDO_priority']?></td>
       <?php if($category['toDO_priority']=='High priority'){
         $imagem= "images/higher.png";
       }
       else if($category['toDO_priority']=='Medium priority'){
          $imagem= "images/medium.png";
       }
       else{
          $imagem= "images/lower.png";
       }?>
       <td>&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;<img src="<?php echo $imagem;?>"></td>
     </tr>
     <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
     <script type="text/javascript" src="scripts/list_categories.js"></script>
     <script type="text/javascript" src="scripts/add-to-do.js"></script>
     <script type="text/javascript" src="scripts/delete-to-do.js"></script>
    <script type="text/javascript" src="scripts/calendar.js"></script>
   <?php } ?>
  </ul>

</table>


<aside id="buttons_MyCategory">
  <a class="delete_task" data-popup-deleteTask-open="popup-1" href="#"><b>Delete task</b></a>
  <div class="popup-deleteTask" data-popup-deleteTask="popup-1">
    <div class="popup-inner-deleteTask">

      <form action="delete_toDo.php" method="post">
         <select class="dropdown"name="Category" >
            <li><option class="cat" id="Category" name="Category" href="#"><?=$categories[0]['cat_name']?></option></li>
        </select>
        <input class="inputField-deleteTask" type="text" id="Description" required="required" name="Description" placeholder="Description">
        <br></br>
        <input id="submit" type="submit" value ="DeleteTask">
      </form>

      <a class="popup-close-deleteTask" data-popup-close-deleteTask="popup-1" href="#"></a>
    </div>
  </div>
  <a class="NewTask" data-popup-addTask-open="popup-1" href="#"><b>Add Task</b></a>
  <div class="popup-addTask" data-popup-addTask="popup-1">
    <div class="popup-inner-addTask">
      <form action="new_todo.php" method="post">
        <select class="dropdown"name="Category" >
            <li><option class="cat" id="Category" name="Category" href="#"><?=$categories[0]['cat_name']?></option></li>
        </select>
        <input class="inputField-addTask" type="text" id="Description" required="required" name="Description" placeholder="Description">
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

  <a class="edit_profile" data-popup-open="popup-1" href="#"><b>Edit your profile</b></a>

  <div class="popup" data-popup="popup-1">
    <div class="popup-inner">

      <form action="change_name.php" method="post">
        <input class="inputField" type="text" id="name" required="required" name="name" placeholder="New name">
        <input class= "editSubmit" id="submit" type="submit" value ="Change">

      </form>
      <form action="change_email.php" method="post">
        <input class="inputField" type="email" id="email" required="required" name="email" placeholder="New email">
        <input class= "editSubmit" id="submit" type="submit" value ="Change">
      </form>

      <form action="change_password.php" onsubmit="return validate(this);" method="post">
        <input class="inputField" type="password" minlength="8" id="password" name="password" required="required" placeholder="New password">
        <input class="inputField" type="password" id="passwordConfirm" name="passwordConfirm" required="required" placeholder="Confirm password"><br>
        <input id="submit" type="submit" value ="Submit">
      </form>

      <a class="popup-close" data-popup-close="popup-1" href="#"></a>
    </div>
  </div>

  <a href="back.php"><b>Back</b></a>
</aside>

<section id="calendar">
<script>displayCalendar()</script>
</section>
