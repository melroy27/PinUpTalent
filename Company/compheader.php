<?php
session_start();
?>
<html>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="../User/style.css">
</head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>     
<header>
    <nav>
      <div class="main-wrapper">
        <ul>
            <li>
                <a href="main.php">HOME</a>
            </li>
        </ul>
        <div class="nav-login">
            <?php
            if (!isset($_SESSION['u_id'])){
               echo '<form action="../includes/complogin.inc.php" method="POST">
                <input type="text" name="uid" placeholder="Username/Email">
                <input type="password" name="pwd" placeholder="Password">
                <button type="submit" name="submit">LOGIN Company</button>
          </form>';
      }
            ?>
        
        </div>
        </div></nav>
</header>