<section id="categories">
  <h2>Categories</h2>
  <ul>
    <?php foreach ($categories as $category) { ?>
      <li><a href="index.php?cat_id=<?=$category['cat_id']?>"><?=$category['cat_name']?></a></li>
    <?php } ?>
  </ul>
</section>

<header id="buttons">
  <a href="addTask.php"><b>Add Task</b></a>
  <a href="profile.php"><b>Edit your profile</b></a>
  <a href="action_logout.php"><b>Logout</b></a>
</header>

<section id="user_info">
  <p> <?=$_SESSION['usr_info']['usr_name']?> </p>
  <p> Username:  &nbsp;<?=$_SESSION['usr_info']['usr_username']?> </p>
  <p> Age:  &nbsp; <?=$_SESSION['usr_info']['usr_age']?> </p>
  <p> Email: &nbsp; <?=$_SESSION['usr_info']['usr_email']?> </p>
</section>
