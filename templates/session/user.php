<div id="user">
  <?php if (isset($_SESSION['username']) && $_SESSION['username'] != '') { ?>
    <form action="action_logout.php" method="post">
      <a href="register.php"><?=$_SESSION['username']?></a>
      <input type="submit" value="Logout">
    </form>
  <?php } else { ?>
    <form action="action_login.php" method="post">
      <input type="text" placeholder="username" name="username">
      <input type="password" placeholder="password" name="password">
      <div>
        <input type="submit" value="Login">
      </div>
    </form>
  <?php } ?>
</div>

<section id="register">
  <img src="images/signup.png">
  <a href="register.php">SIGN UP</a>
</section>

<section id="about">
  <article>
    <p class="description">We are a page designed to help you manage time. You have no longer an excuse to forget your daily tasks.</p>
  </article>
</section>
