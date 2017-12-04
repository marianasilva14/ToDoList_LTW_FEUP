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

<aside id="register">
  <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script type="text/javascript" src="scripts/register.js"></script>
  <img src="images/signup.png">
  <a class="new_register" data-popup-register-open="popup-1" href="#">SIGN UP &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </a>
    <div class="popup-register" data-popup-register="popup-1">
      <div class="popup-inner-register">

        <form action="new_user.php" method="post"  enctype="multipart/form-data">
          <input class="inputField-register" type="text" id="name" required="required" name="name" placeholder="Name">
          <input class="inputField-register" type="text" id="username" required="required" name="username" placeholder="Username">
          <input class="inputField-register" type="text" id="age" required="required" name="age" placeholder="Age">
          <input class="inputField-register" type="email" id="email" required="required" name="email" placeholder="Email">
          <input class="inputField-register" type="password" minlength="8" id="password" name="password" required="required" placeholder="Password">
          <input class="inputField-registerPhoto" type="file" id="photo" name="photo" required="required" placeholder="Photo">
          <br></br>
          <input id="submit" type="submit" value ="Register">
        </form>

        <a class="popup-close-register" data-popup-register-close="popup-1" href="#"></a>
      </div>
    </div>
</aside>
