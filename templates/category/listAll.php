<section id="todolists">
  <ul>
    <h3>Everything I have to do</h3>
    <?php foreach ($allToDoLists as $todolist) { ?>
      <li><p href="category.php?cat_id=<?=$todolist['cat_id']?>"><?=$todolist['cat_name']?> : <?=$todolist['toDO_id']?> : <?=$todolist['toDO_description']?></p></li>
    <?php } ?>
  </ul>
</section>

<aside id="buttons_MyCategory">

<a class="markTask" data-popup-markTask-open="popup-1" href="#"><img src="images/completed.png"></a>
  <div class="popup-markTask" data-popup-markTask="popup-1">
    <div class="popup-inner-markTask">

      <form action="mark_as_completed.php" method="post">
      <select class="dropdown"name="Category" >
      <?php $categories = getAllCategories(); ?>
      <?php foreach ($categories as $category) { ?>
        <li><option class="cat" id="Category" name="Category" href="#"><?=$category['cat_name']?></option></li>
      <?php } ?>
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
              <?php $categories = getAllCategories(); ?>
              <?php foreach ($categories as $category) { ?>
                <li><option class="cat" id="Category" name="Category" href="#"><?=$category['cat_name']?></option></li>
              <?php } ?>
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
              <?php $categories = getAllCategories(); ?>
              <?php foreach ($categories as $category) { ?>
                <li><option class="cat" id="Category" name="Category" href="#"><?=$category['cat_name']?></option></li>
              <?php } ?>
            </select>
          <input class="inputField-addTask" type="text" id="Description" required="required" name="Description" placeholder="Description">
          <br></br>
          <input id="submit" type="submit" value ="AddTask">
      </form>

        <a class="popup-close-addTask" data-popup-close-addTask="popup-1" href="#"></a>
      </div>
    </div>

  <a href="back.php"><img src="images/back.png"></a>
</aside>
