<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GD library - Captcha</title>
</head>
<body>
    <form action="" method="POST">
        <img src="./captcha.php" alt="CAPTCHA"> <br> <br>

        <label for="captcha"><span>Enter the Captcha Code!!</span></label>
        <br>
        <input type="text" name="captcha" id="captcha">
        <br>
        <br>
        <input type="submit" value="Submit">
    </form>
<br>
    <?php
        if($_POST) {
           $captcha = $_POST['captcha'];
           if(! $captcha) {
                echo '<span style="color: yellow;">Please enter the captcha code!!</span>';
              } else {
                if($_SESSION['captcha'] == $captcha) {
                     echo '<span style="color: green;">Correct Captcha Code!!</span>';
                } else {
                     echo '<span style="color: red;">Invalid Captcha Code!!</span>';
                }
           }
        }
    ?>
</body>
</html>