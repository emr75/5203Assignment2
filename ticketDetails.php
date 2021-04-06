<?php
session_start();
if(!isset($_SESSION['username'])) {
    header('Location: login.php');
}
$rows = '';
$rows1 = '';
$doc = simplexml_load_file("./xml/tickets.xml");

// print $doc->book->author[0]->attributes()['title'];
// print $doc->book[0]->id;

// $author = $doc->book[1]->author->addChild('middlename', 'Gordon');

$_SESSION['ticketId'] = $_GET['id'];
$length = count($doc->children());
$tickets = $doc->children();
for($i = 0; $i < $length; $i++)  {
  if ($tickets[$i]->attributes()['ticketId'] == $_SESSION['ticketId']) {
    $rows .= '<tr>';
    $rows .= '<td>'.$tickets[$i]->ticketDetails->subject. '</td>';
    $rows .= '<td>'.$tickets[$i]->ticketDetails->description. '</td>';
    $rows .= '</tr>';
    }
}
for($i = 0; $i < $length; $i++)  {
  if ($tickets[$i]->attributes()['ticketId'] == $_SESSION['ticketId']) {
    for($t = 0; $t < $length; $t++) {
      $rows1 .= '<tr class="tktInfo">';
    $rows1 .= '<td>'.$tickets[$i]->communications->message[$t].'</td>';
    $rows1 .= '<td>'.$tickets[$i]->communications->message[$t]->attributes()['date']. '</td>';
    $rows1 .= '</tr>';
    }
  }
}

$dom = dom_import_simplexml($doc)->ownerDocument;
$dom->preserveWhiteSpace = false;
$dom->formatOutput = true;
$dom->save("./xml/ticketInfo.xml");
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
        <table class="flexContainer tktInfo tktDetailTable">
          <tbody>
            <tr>
              <th>Subject</th>
              <th>Description</th>
            </tr>
            <tr>
              <?php
                echo $rows;
              ?>
            </tr>
          </tbody>
      </table>
      <!-- Communications -->
      <table class="column">
<thead>
      <tr class="tktInfo">
          <th>Messages</th>
          <th>Time</th>
        </tr>
        </thead>
        <tbody>
          <tr class="tktInfo">
            <?php
              echo $rows1;
            ?>
            </tr>
        </tbody>
    </table>
    <!-- New Message -->
    <div class="loginForm" id="messageForm">
        <form action="" method="POST">
            <div class="inputDiv" id="messageDiv">
              <label for="message">Create a New Ticket</label>
              <textarea type="message" name="message" id="message" placeholder="Message" rows="10" cols="50"></textarea>
            </div>
              <input type="submit" class="submit" value="Submit"> 
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
  
