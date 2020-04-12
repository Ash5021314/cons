<?php
require "connect.php";
$terminal = mysqli_query($connDB, "SELECT * FROM `terminal`");
$map = mysqli_query($connDB, "SELECT * FROM `map_idea`");
$contact = mysqli_query($connDB, "SELECT * FROM `contact`");
$follow = mysqli_query($connDB, "SELECT * FROM `follow`");
$mapTitle = mysqli_query($connDB, "SELECT `title_eng` FROM `map_idea` WHERE title_eng IS NOT NULL ");
?>

<!doctype html>
<html lang="en">

<head>
    <title>Armenian Coins</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="Armenian Coins">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#039def">
    <meta name="apple-mobile-web-app-title" content="Armenian Coins">
    <meta name="application-name" content="Armenian Coins">
    <meta name="theme-color" content="#ffffff">
    <meta property="og:title" content="Armenian Coins">
    <meta property="og:url" content="">
    <meta property="og:description" content="Armenian Coins">
    <meta property="og:image" content="">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:image" content="">
    <meta name="twitter:site" content="@armeniancoins">
    <meta name="twitter:title" content="Armenian Coins">
    <meta name="twitter:description" content="Armenian Coins">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
</head>

<body class="terminal">
    <header>
        <div class="header-container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="index.php">
                    <img src="../assets/images/6546.png" width="240" height="120" alt="">
                </a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="souvenir.php">souvenir</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="terminal.php" style="color: #a58f78 !important;">terminals</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="history.php">history</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact-us.php">contact us</a>
                        </li>
                    </ul>
                </div>
                <a style="margin-left:20px" href="../terminal.php"><img src="../assets/images/armenianFlag.png" /></a>
            </nav>
        </div>
        <div class="header-content">
            <?php
            if (mysqli_num_rows($terminal) > 0) {
                while ($terminals =  mysqli_fetch_assoc($terminal)) {

            ?>
                    <div class="row mb-50 rowRew" data-att="1">
                        <div class="col-md-6 text-container">
                            <h1><?php echo $terminals['title_eng'] ?></h1>
                            <p><?php echo $terminals['description_eng'] ?></p>
                        </div>
                        <div class="col-md-6 " style="display: flex; justify-content:center">
                            <img src="../assets/images/terminal/<?php echo $terminals['image'] ?>" style="width: 150px;">

                        </div>
                    </div>

            <?php

                }
            }
            ?>
        </div>
    </header>
    <div class="main">
        <section>
            <div class="find-product">
                <?php
                while ($mapImage =  mysqli_fetch_assoc($mapTitle)) {
                ?>
                    <p class="section-title"><?php echo $mapImage['title_eng'] ?></p>
                <?php
                }
                ?>
                <div class="map">
                    <img src="../assets/images/map1.png" style="width: 850px; position:relative; " class="map" />
                    <a href="#slider-image-1"><img src="../assets/images/pasiv.png" style="width: 28px; position:relative; top: -228px; left:150px;" /></a>
                    <a href="#slider-image-2"><img src="../assets/images/pasiv.png" style="width: 28px; position:relative; top: -65px; left:540px;" /></a>
                    <a href="#slider-image-3"><img src="../assets/images/pasiv.png" style="width: 28px; position:relative; top: -380px; left:400px;" /></a>
                </div>
                <div class="slider-holder">
                    <span id="slider-image-1"></span>
                    <span id="slider-image-2"></span>
                    <span id="slider-image-3"></span>
                    <div class="image-holder">
                        <?php
                        if (mysqli_num_rows($map) > 0) {
                            while ($mapImage =  mysqli_fetch_assoc($map)) {
                        ?>
                                <img src="../assets/images/map/<?php echo $mapImage['image'] ?>" class="slider-image" />
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                <a href="#">
                    <div class="find-button">
                        <p>Explore More</p>
                    </div>
                </a>
            </div>
        </section>
        <section>
            <div class="idea-section row">
                <div class="left-block">
                    <?php
                    if (mysqli_num_rows($contact) > 0) {
                        while ($contactUs =  mysqli_fetch_assoc($contact)) {
                    ?>
                            <p class="contact">Contact Us</p>
                            <p>Email: <?php echo $contactUs['email'] ?></p>
                            <p>Phone: <?php echo $contactUs['phone_1'] ?></p>
                            <p><?php echo $contactUs['phone_2'] ?></p>
                    <?php
                        }
                    }
                    ?>
                </div>
                <div class="right-block">
                    <p class="follow">Follow Us</p>
                    <?php
                    if (mysqli_num_rows($follow) > 0) {
                        while ($followUs =  mysqli_fetch_assoc($follow)) {
                    ?>
                            <a href="<?php echo $followUs['icon_link'] ?>"><img src="../assets/images/socialIcon/<?php echo $followUs['icon'] ?>" style="width: 35px"></a>

                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </section>
    </div>
    <footer>
        <p class="footer-block">© 2019 Armenian coins, All Rights Reserved.</p>
    </footer>
    <script src="../assets/js/index.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script>
        let arr = $(".rowRew");
        let count = 1
        for (let i = 0; i < arr.length; i++) {
            let x = $(arr[i]).attr("data-att", count++)
            if (count % 2 !== 0) {
                $(arr[i]).css({
                    "flex-direction": "row-reverse"
                })
            }
        }
    </script>
</body>

</html>