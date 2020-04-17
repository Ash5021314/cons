<?php
session_start();
require "../connect.php";

if (!isset($_SESSION['userName'])) {
    header('location: index.php');
}

//ini_set('display_errors','Off');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/styleAdmin.css">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <ul class="adminHead">
            <li>
                <p>Home</p>
            </li>
            <li><a href="exit.php">Exit</a></li>
        </ul>
        <ul class="adminPage">
            <li>ADMIN PAGES</li>
            <li><a href="travel.php">Travel</a></li>
            <li><a href="visit.php">Visit Places</a></li>
            <li><a href="map.php">Map</a></li>
            <li><a href="idea.php">Idea</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="terminals.php">Terminals</a></li>
            <li><a href="souvenirs.php">Souvenirs</a></li>
            <li><a href="history.php">History</a></li>
            <li><a href="partners.php">Partners</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="packagingSlide.php">Packaging Slides</a></li>
        </ul>
    </div>
    <script src="../assets/js/jquery-3.2.1.min.js"></script>
    <script src="../assets/js/scriptAdmin.js"></script>
</body>

</html>