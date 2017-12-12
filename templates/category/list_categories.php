<aside id="categories">
    <?php foreach ($categories as $category) { ?>
      <a href="category.php?cat_id=<?=$category['cat_id']?>"><img alt="category photo" src="<?php echo $category['cat_photo']?>">&nbsp; &nbsp; &nbsp; &nbsp;<?=$category['cat_name']?></a>
    <?php } ?>
</aside>

<aside id="buttons" >
  <form method="post" action="search.php" >
  <input class="search_bar" type="text" name="search"  id="search" placeholder="Search.." >
  </form>
  <div>
    <a href="sharedLists.php"><img alt="Shared lists" src="images/users.png"></a>
    <a class="shareLists" data-popup-deleteTask-open="popup-1" href="#"><img alt="Share list" src="images/share.png"></a>
    <div class="popup-deleteTask" data-popup-deleteTask="popup-1">
      <div class="popup-inner-deleteTask">

        <form id=delete_task action="share.php" method="post">

        <select class="dropdown" id="list_id" name="list_id" >
          <?php foreach ($allLists as $list) { ?>

            <option class="inputField-share" id="list_id" value="<?=$list['toDoList_id']?>" href="#">
             <?=$list['toDoList_name']?></option>
           <?php } ?>
        </select>

        <select class="dropdown" id="user_id" name="user_id" >
          <?php foreach ($allUsers as $user) { ?>
            <option class="inputField-share" id="user_id" value="<?=$user['usr_id']?>" href="#">
             <?=$user['usr_name']?></option>
           <?php } ?>
        </select>

          <br></br>
          <input id="submit" type="submit" value ="Share">
        </form>

        <a class="popup-close-deleteTask" data-popup-close-deleteTask="popup-1" href="#"></a>
      </div>
    </div>

  <a href="allTasks.php"><img alt="All tasks" src="images/viewAllTasks.png"></a>
  <a href="completedTasks.php"><img alt="Completed tasks" src="images/completed.png"></a>
  <a class="edit_profile" data-popup-open="popup-1" href="#"><img alt="edit profile" src="images/edit.png"></a>

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
						<input class="inputField" type="password" id="passwordConfirm" name="passwordConfirm" required="required" placeholder="Confirm password">
						<input id="submit" type="submit" value ="Submit">
				</form>

        <a class="popup-close" data-popup-close="popup-1" href="#"></a>
      </div>
    </div>

  <a href="action_logout.php"><img alt="Button logout" src="images/logout.jpg"></a>
</div>
</aside>

<section id="user_info">
  <article>
    <?php echo "<img src='images/".$_SESSION['usr_info']['usr_photo']."' alt='Foto de exibição' /><br />";
    ?>
  </article>
  <p> <?=$_SESSION['usr_info']['usr_name']?> </p>
  <p> @<?=$_SESSION['usr_info']['usr_username']?> </p>
  <p> <?=$_SESSION['usr_info']['usr_age']?> years</p>
  <p> <?=$_SESSION['usr_info']['usr_email']?> </p>
</section>
