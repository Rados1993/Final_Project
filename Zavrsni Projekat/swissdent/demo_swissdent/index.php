<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SwissDent</title>
        <link rel="stylesheet" href="./css/style1.css">
            <style>
                @font-face {
                    font-family: JennaSue;
                    src: url(./font/JennaSue.ttf);
                }
            </style>
    </head>
<body>
    <?php
        include_once 'header.php';
    ?>
    <?php include_once("./book.php"); ?>
    <?php
          include_once 'footer.php';
    ?>
        
        <div id="location">
    <?php include_once("./pages/location.php"); ?>
        </div>
        <div>
        <img src="./img/radnovremee.jpg" alt="">
        </div>
        <div>
    <?php include_once ("./pages/contact.php")?>
        </div>
    <footer>
        <div class="inlinefooter">
        <div class="inlinefooter">
            <p>©2022 by Radoš Živić, IT Bootcamp student</p>
            <span></span>
        </div>
    </footer>
</body>
</html>
