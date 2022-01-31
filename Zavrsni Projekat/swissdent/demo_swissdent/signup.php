<?php
  include_once 'header.php';
?>

<section class="signup-form">
  
  <div class="signup-form-form">
    <form action="includes/signup.inc.php" method="post">
      <input type="text" name="name" placeholder="Full name...">
      <input type="text" name="email" placeholder="Email...">
      <input type="text" name="uid" placeholder="Username...">
      <input type="password" name="pwd" placeholder="Password...">
      <input type="password" name="pwdrepeat" placeholder="Repeat password...">
      <button type="submit" name="submit">Sign up</button>
    </form>
  </div>
  <?php

    if (isset($_GET["error"])) {
      if ($_GET["error"] == "emptyinput") {
        echo "<p>Popunite sva polja</p>";
      }
      else if ($_GET["error"] == "invaliduid") {
        echo "<p>Uneli ste pogresno korisnicko ime!</p>";
      }
      else if ($_GET["error"] == "invalidemail") {
        echo "<p>Uneli ste pogresan email!</p>";
      }
      else if ($_GET["error"] == "passwordsdontmatch") {
        echo "<p>Uneli ste pogresnu lozinku!</p>";
      }
      else if ($_GET["error"] == "stmtfailed") {
        echo "<p>Greska, pokusajte ponovo1</p>";
      }
      else if ($_GET["error"] == "usernametaken") {
        echo "<p>Korisnicko ime je vec zauzeto!</p>";
      }
      else if ($_GET["error"] == "none") {
        echo "<p>Uspesno ste se regitrovali!</p>";
      }
    }
  ?>
</section>

<?php
  include_once 'footer.php';
?>
