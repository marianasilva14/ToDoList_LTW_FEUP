<!DOCTYPE html>
<html>
<head>
  <title>Time management? Need it!</title>
  <meta charset="utf-8">
  <link href="https://fonts.googleapis.com/css?family=Permanent+Marker|Poppins" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

  <header>
    <div id="info">
      <img src="images/logotipo.png">
      <h1><a href='index.php'>Time management? <br>  Need it!</a></h1>
    </div>
  </header>

  <?php if($_SERVER['REQUEST_URI'] != '/register.php')
  include_once('templates/session/user.php');
  ?>

  <section id="messages">
    <?php $errors = getErrorMessages();foreach ($errors as $error) { ?>
      <article class="error">
        <p><?=$error?></p>
      </article>
    <?php } ?>
    <?php $successes = getSuccessMessages();foreach ($successes as $success) { ?>
      <article class="success">
        <p><?=$success?></p>
      </article>
    <?php } clearMessages(); ?>
  </section>
