<section id="todolists">
  <h2>Categories</h2>
  <ul>
    <h3> <?php echo $categories[0]['cat_name'] ?></h3>
    <?php foreach ($categories as $category) { ?>
      <li><p href="category.php?cat_id=<?=$category['cat_id']?>"><?=$category['toDO_description']?></p></li>
      <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
      <script type="text/javascript" src="../../scripts/list_categories.js"></script>
      <script type="text/javascript" src="../../scripts/add-to-do.js"></script>
      <script type="text/javascript" src="../../scripts/delete-to-do.js"></script>
    <?php } ?>
  </ul>
</section>

<header id="buttons_MyCategory">
  <a class="delete_task" data-popup-deleteTask-open="popup-1" href="#"><b>Delete task</b></a>
  <div class="popup-deleteTask" data-popup-deleteTask="popup-1">
    <div class="popup-inner-deleteTask">

      <form action="delete_toDo.php" method="post">
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
        <input class="inputField-addTask" type="text" id="Category" name="Category" required="required" placeholder="Category">
        <div class="dropdown">
          <button onclick="dropdownfunction()" class="dropbtn">Dropdown</button>
          <div id="myDropdown" class="dropdown-content">
            <?php foreach ($categories as $category) { ?>
              <li><a href="category.php?cat_id=<?=$category['cat_id']?>"><?=$category['cat_name']?></a></li>
            <?php } ?>
          </div>
        </div>
        <input class="inputField-addTask" type="text" id="Description" required="required" name="Description" placeholder="Description">
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
</header>
