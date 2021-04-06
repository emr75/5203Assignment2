<?php
set_error_handler("var_dump");
session_start();
$userXML = simplexml_load_file("./xml/users.xml");
$username = "";
$pass = "";
if(isset($_POST['login'])) {
  //getting values from the user
  $username = $_POST['username'];
  $pass = $_POST['password'];
  $length = count($userXML->children());
  for($i = 0; $i < $length; $i++){
    if ($userXML->user[$i]->userInfo->email == $username && $userXML->user[$i]->userInfo->password == $pass) {
      $_SESSION['userId'] = (string) $userXML->user[$i]->attributes()['userId'];
      if ($userXML->user[$i]->attributes()['type'] == 'client'){
        // var_dump($userXML->user[$i]->userInfo->email);
        // var_dump($userXML->user[$i]->userInfo->password);
        $_SESSION['username'] = $username;
        header("Location: ticketListUser.php");
      } else {
        $_SESSION['username'] = $username;
        header("Location: ticketListAdmin.php");
      } 
    } else {
      echo "Invalid credentials";      
    }
  //   if (!$i++)
  // // creaste a session variable if valid
  // if($user == $dbadmin && $pass == $dbadminp){
  //   $_SESSION['username'] = $user;
  //   header('Location: ticketListAdmin.php');
  // } else if($user == $dbuser && $pass == $dbuserp){
  //   $_SESSION['username'] = $user;
  //   header('Location: ticketListUser.php');
  // } {
  //   echo "invalid credentials";

}}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/styles.css">
    <title>Global Ticket System</title>
    <!-- <script src="./js/script.js" async defer></script> -->
</head>
<body>
    <main>
        <nav class="flexContainer">
          <a href="#"><img src="./Images/globe-1334084_1280.png" alt=""></a>
            <ul class="flexContainer">
                <li><a href="#">Login</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Help</a></li>
            </ul>
        </nav>
      <div class="loginForm">
        <form action="login.php" method="POST">
            <div class="inputDiv">
              <label for="username">User Name</label>
              <input type="text" name="username" id="username" placeholder="Username" />
            </div>
            <div class="inputDiv">
              <label for="password">Password</label>
              <input type="password" name="password" id="password" placeholder="Password" />
            </div>
              <input type="submit" name="login" class="submit" value="Log In"> 
          </form>
      </div>
    </main>
    <footer>
      <ul class="flexContainer">
        <li><a href="#">Login</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Help</a></li>
      </ul>
    </footer>
  </body>
</html>
