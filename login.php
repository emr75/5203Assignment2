<?php
session_start();
if(isset($_POST['login'])) {
  //getting values from the user
  $userXML = simplexml_load_file("./xml/users.xml");
  $user = $userXML->children();
  $user = $_POST['username'];
  $pass = $_POST['password'];

  // $dbadmin = 'elle';
  // $dbadminp = 'walk';
  // $dbuser = 'laura';
  // $dbuserp = 'water';

  $length = count($userXML->children());
  for($i = 0; $i < $length; $i++){
    if ($user[$i]->userInfo->email = $user && $user[$i]->userInfo->password = $pass) {
      $_SESSION['userId'] = (string)$users->user[$i]->attributes()['userId'];
      if ($users->user[$i]->attributes()['type'] == 'staff') {
        header('Location: ticketListAdmin.php');
      } else if ($users->user[$i]->attributes()['type'] == 'client') {
        header('Location: ticketListUser.php');        
      }
    } else if (!$i++){
      echo "Invalid credentials";      
    }
  // // creaste a session variable if valid
  // if($user == $dbadmin && $pass == $dbadminp){
  //   $_SESSION['username'] = $user;
  //   header('Location: ticketListAdmin.php');
  // } else if($user == $dbuser && $pass == $dbuserp){
  //   $_SESSION['username'] = $user;
  //   header('Location: ticketListUser.php');
  // } {
  //   echo "invalid credentials";
  // }
  }
}
?>

<!DOCTYPE html>
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
