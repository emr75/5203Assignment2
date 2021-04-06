<?php

session_start();
if(!isset($_SESSION['username'])) {
    header('Location: login.php');
}

$rows = '';
$doc = simplexml_load_file("./xml/tickets.xml");

// print $doc->book->author[0]->attributes()['title'];
// print $doc->book[0]->id;

// $author = $doc->book[1]->author->addChild('middlename', 'Gordon');

$length = count($doc->children());
$tickets = $doc->children();
for($i = 0; $i < $length; $i++) {
    if ($tickets[$i]->communications->message[0]->attributes()['userId'] == $_SESSION['userId']) {
    $rows .= '<tr>';
    // $rows .= '<td>'.$b->userId. '</td>';
    $rows .= '<td>'.$tickets[$i]->ticketDetails->subject. '</td>';
    $rows .= '<td>'.$tickets[$i]->attributes()['status']. '</td>';
    $rows .= "<td><a href='ticketDetails.php?id={$tickets[$i]->attributes()['ticketId']}'/>More</a></td>";
    $rows .= '</tr>';
    }
}

$dom = dom_import_simplexml($doc)->ownerDocument;
$dom->preserveWhiteSpace = false;
$dom->formatOutput = true;
$dom->save("./xml/tickets.xml");
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
                    <li><a href="./logout.php">Logout</a></li>
                    <li><a href="#">Tickets</a></li>
                    <li><a href="#">Help</a></li>
                </ul>
            </nav>
            <table class="flexContainer" id="column">
                <tbody>
                    <tr class="tktHeading">
                        <th>UserId</th>
                        <th>Title</th>
                        <th>Status</th>
                    </tr>
                    <tr class="tktInfo">
                    <?php
                        echo $rows;
                    ?>
                    </tr>
                    <tr class="tktInfo">
                        <td>0912</td>
                        <td>Jackson</td>
                        <td>Open</td>
                    </tr>
                </tbody>
            </table>
            <a class="submit newTicket" href="#">Create a New Ticket</a>
        </main>
        <footer>
            <ul class="flexContainer">
                <li><a href="./logout.php">Logout</a></li>
                <li><a href="#">Tickets</a></li>
                <li><a href="#">Help</a></li>
            </ul>
        </footer>
    </body>
</html>
