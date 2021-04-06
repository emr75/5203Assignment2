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
        <table class="flexContainer ticketList">
          <tbody>
            <tr class="tktHeading">
              <th>Details</th>
              <th>Status</th>
            </tr>
            <tr class="tktHeading" id="tktData">
              <td>Jill</td>
              <td>Open</td>
            </tr>
          </tbody>
      </table>
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
  
