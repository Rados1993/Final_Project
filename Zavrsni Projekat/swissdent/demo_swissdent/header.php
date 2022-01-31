<?php
  session_start();
  include_once 'includes/functions.inc.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PHP Project 01</title>
    <!--I won't do more than barebone HTML, since this isn't an HTML tutorial.-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

    
    <nav id="navigation">
      
        <ul>
        <?php
            if (isset($_SESSION["useruid"])) {
              echo "<li class='left'><a href='profile.php'>Profile Page</a></li>";
              echo "<li class='left'><a href='logout.php'>Logout</a></li>";
            }
            else {
              echo "<li class='left'><a href='signup.php'>Sign up</a></li>";
              echo "<li class='left'><a href='login.php'>Log in</a></li>";
            }
          ?>
        <li class="rightbook"><a href="index.php" target="_self" id="booknow"><span class="nav">SwissDent</span> <br> Zdravlje vaših zuba je naša briga</a></li>
          <li class="left"><a href="./pages/php-calendar/calendar.php">Zakazi pregled</a></li>
          <li class="left"><a href="./contact.php">Kontaktiraj nas</a></li>
          <li class="left"><a href="./about.php">O nama</a></li>
          <li class="left"><a href="index.php">Pocetna</a></li>
        </ul>
        <img class="nav" src="./img/naslovna.jpg" alt="" id="img-home" >
    
    </nav>
    


