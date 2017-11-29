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
</header>
