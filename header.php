<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>cms</title>
  </head>
  <body>

  <?php include "db.php"; ?>

  <nav class="navbar navbar-expand-lg navbar-light bg-danger">
  <a class="navbar-brand" href="/new/index.php">cms</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/new/index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <?php if(isset($_SESSION['user_id'])){ ?>
        <a class="nav-link" href="#"><?php echo $_SESSION['user']; ?></a>
          <a class="nav-link" href="/new/logout.php">logout</a>
          <?php } else { ?>
          <a class="nav-link" href="/new/login.php">login</a>
          <a class="nav-link" href="/new/register.php">Register</a>
          <?php } ?>
      <li class="nav-item">
      <a type="button" class="nav-link">
  Notifications <span class="badge badge-light">4</span>
</a>      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
       <?php if(isset($_SESSION['user_id'])){ ?>
        <a class="dropdown-item" href="#"><?php echo $_SESSION['user']; ?></a>
          <a class="dropdown-item" href="/new/logout.php">logout</a>
          <?php } else { ?>
          <a class="dropdown-item" href="/new/login.php">login</a>
          <a class="dropdown-item" href="/new/register.php">Register</a>
          <?php } ?>
        </div>
      </li>
      <li class="nav-item">
     <?php if(isset($_SESSION['user_id'])){ ?>
        <a class="nav-link btn btn-danger" href="/new/admin/index.php">Admin</a>
        <?php } ?>
      </li>
    </ul>

  </div>
</nav>