<?php
session_start();
unset($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/styles.css">
    <title>Global Ticket System</title>

</head>
<body>
    <main>
        <nav class="flexContainer">
          <a href="#"><img src="./Images/globe-1334084_1280.png" alt=""></a>
            <ul class="flexContainer">
                <li><a href="./login.php">Login</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Help</a></li>
            </ul>
        </nav>
      <div>
          <p>You have Logged Out</p>
      </div>
    </main>
    <footer>
      <ul class="flexContainer">
        <li><a href="./login.php">Login</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Help</a></li>
      </ul>
    </footer>
  </body>
</html>