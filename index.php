<?php
require "connect.php";
$slide = mysqli_query($connDB, "SELECT * FROM `coll_desc`");
$sliders = mysqli_query($connDB, "SELECT `slide_text` FROM `coll_desc`");
$slideID = mysqli_query($connDB, "SELECT * FROM `coll_desc`");
$travel = mysqli_query($connDB, "SELECT * FROM `travel`");
$visitDesc = mysqli_query($connDB, "SELECT * FROM `visit_desc` ORDER BY `id` DESC");
$visit = mysqli_query($connDB, "SELECT `title` FROM `visit_desc` WHERE title IS NOT NULL ");
$idea = mysqli_query($connDB, "SELECT * FROM `idea`");
$contact = mysqli_query($connDB, "SELECT * FROM `contact`");
$follow = mysqli_query($connDB, "SELECT * FROM `follow`");
$mapTitle = mysqli_query($connDB, "SELECT `title` FROM `map_idea`");
$map = mysqli_query($connDB, "SELECT * FROM `coll_desc`");
$mapLoc = mysqli_query($connDB, "SELECT * FROM `coll_desc`");
$mapLink = mysqli_query($connDB, "SELECT * FROM `coll_desc`");
?>

<!doctype html>
<html lang="en">

<head>
    <title>Armenian Coins</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="Armenian Coins">
    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
</head>

<body class="home">
    <header>
        <div class="header-container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="index.php">
                    <img src="./assets/images/6546.png" width="240" height="120" alt="">
                </a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="souvenir.php">հուշանվեր</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="terminal.php">տերմինալ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="history.php">պատմություն</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact-us.php">հետադարձ
                                կապ</a>
                        </li>
                    </ul>
                </div>
                <a style="margin-left:20px" href="eng/index.php"><img src="assets/images/englishFlag.png" /></a>
            </nav>
        </div>
    </header>
    <div class="header-content">
        <div class="slider">
            <div class="container">
                <div class="slideshow">
                    <?php

                    if (mysqli_num_rows($slide) > 0) {
                        while ($slider =  mysqli_fetch_assoc($slide)) {
                    ?>
                            <div class="slide">
                                <img src="assets/images/collection/<?php echo $slider['first_slide'] ?>" style="width: 850px" />
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="new-product">
            <div class="slider slider1">
                <div class="container container1">
                    <div class="slideshow1">


                        <?
                        while ($row = mysqli_fetch_assoc($sliders)) {
                        ?>
                            <div class="slide1">
                                <p class=""><?php echo $row['slide_text'] ?></p>
                            </div>
                        <?

                        }
                        ?>

                    </div>
                </div>
            </div>

        </div>



        <div class="new-product header-exople">
            <div class="slider slider2">
                <div class="container container2">
                    <div class="slideshow2">
                        <?
                        while ($row1 = mysqli_fetch_assoc($slideID)) {
                            $Text = json_encode($row1);
                            $RequestText = urlencode($Text);
                        ?>
                            <div class="slide2">
                                <a href="garn.php?cluster=<?= $RequestText ?>">
                                    <p>Իմանալ ավելին</p>
                                </a>
                            </div>
                        <?
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="main">
            <section>
                <div class="main-container">
                    <div class="col-md-12 row">
                        <div class="col-md-8 text">
                            <?php
                            if (mysqli_num_rows($travel) > 0) {
                                while ($travelDesc =  mysqli_fetch_assoc($travel)) {
                            ?>
                                    <h1><?php echo $travelDesc['title'] ?></h1>
                                    <p><?php echo nl2br($travelDesc['text']) ?></p>
                        </div>
                        <div class="col-md-4">
                            <div class="first-pic">
                                <img src="assets/images/travel/<?php echo $travelDesc['first_image'] ?>" />
                            </div>
                            <div class="sec-pic">
                                <img src="assets/images/travel/<?php echo $travelDesc['seccond_image'] ?>" />
                            </div>
                        </div>
                <?php
                                }
                            }
                ?>
                    </div>
                </div>
            </section>
            <section>
                <div class="place-section">
                    <?php
                    if (mysqli_num_rows($visit) > 0) {
                        while ($visitTitle =  mysqli_fetch_assoc($visit)) {
                    ?>
                            <p class="section-title scroll-section"><?php echo $visitTitle['title'] ?></p>
                    <?php
                        }
                    }
                    ?>
                    <div class="row">
                        <div class="gallery">
                            <?php
                            if (mysqli_num_rows($visitDesc) > 0) {
                                while ($visitDescription =  mysqli_fetch_assoc($visitDesc)) {
                            ?>
                                    <figure>
                                        <img src="assets/images/visit/<?php echo $visitDescription['image'] ?>" alt="" />
                                        <h3 class="text-center my-3"><?php echo $visitDescription['description'] ?>
                                        </h3>
                                    </figure>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="find-product">
                    <?php
                    while ($mapImage =  mysqli_fetch_assoc($mapTitle)) {
                    ?>
                        <p class="section-title"><?php echo $mapImage['title'] ?></p>
                    <?php
                    }
                    ?>
                    <div class="map">
                        <img src="assets/images/map1.png" style="width: 850px; position:relative; " class="map" />
                        <div class="hr">
                            <?php
                            if (mysqli_num_rows($mapLoc) > 0) {
                                while ($mapImage =  mysqli_fetch_assoc($mapLoc)) {
                            ?>
                                    <span class="mapHref">
                                        <img data_id="<?php echo $mapImage['id'] ?>" src="assets/images/collection/<?php echo $mapImage['loc-img'] ?>" class="pas" style="width: 28px; position:relative; top: <?php echo $mapImage['loc-pos-top'] ?>px; left:<?php echo $mapImage['loc-pos-left'] ?>px;" />
                                    </span>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="slider-holder">
                        <div class="image-holder">
                            <?php
                            if (mysqli_num_rows($map) > 0) {
                                while ($mapImage =  mysqli_fetch_assoc($map)) {
                            ?>
                                    <img src="assets/images/collection/<?php echo $mapImage['map'] ?>" class="slider-image" />
                            <?php
                                }
                            }
                            $Text = json_encode($map);
                            $RequestText = urlencode($Text);
                            ?>
                        </div>
                    </div>
                    <div class="find-button">
                        <div class="hidd">
                            <?php
                            if (mysqli_num_rows($mapLink) > 0) {
                                while ($mapImage =  mysqli_fetch_assoc($mapLink)) {
                                    $Text = json_encode($mapImage);
                                    $RequestText = urlencode($Text);

                            ?>
                                    <a href="garn.php?cluster=<?= $RequestText ?>">
                                        <p class="readM">Իմանալ ավելին</p>
                                    </a>
                            <?php
                                }
                            }

                            ?>
                        </div>
                    </div>

                </div>
            </section>
            <section>
                <div class="idea-section">
                    <div class="col-md-12 row">

                        <?php
                        if (mysqli_num_rows($idea) > 0) {
                            while ($ideas =  mysqli_fetch_assoc($idea)) {
                        ?>
                                <p class="section-title"><?php echo $ideas['title'] ?></p>
                                <div class="col-md-9">
                                    <p class="idea-text"><?php echo nl2br($ideas['text']) ?></p>
                                </div>
                        <?php
                            }
                        }
                        ?>
                        <div class="col-md-3">
                            <div class="left-block">
                                <?php
                                if (mysqli_num_rows($contact) > 0) {
                                    while ($contactUs =  mysqli_fetch_assoc($contact)) {
                                ?>
                                        <p class="contact">հետադարձ կապ</p>
                                        <p>Էլ․ Փոստ: <?php echo $contactUs['email'] ?></p>
                                        <p>Հեռախոսահամար: <?php echo $contactUs['phone_1'] ?></p>
                                        <p><?php echo $contactUs['phone_2'] ?></p>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                            <div class="right-block">
                                <p class="follow">Հետևեք մեզ</p>
                                <?php
                                if (mysqli_num_rows($follow) > 0) {
                                    while ($followUs =  mysqli_fetch_assoc($follow)) {
                                ?>
                                        <a href="<?php echo $followUs['icon_link'] ?>"><img src="assets/images/socialIcon/<?php echo $followUs['icon'] ?>" style="width: 35px"></a>

                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <footer>
            <p class="footer-block">© 2019 Armenian coins, Բոլոր իրավունքները պաշտպանված են.</p>
        </footer>
        <div id="to_top">
            <div class="flex justifyCenter">
                <div class="circle flex justifyCenter alignCenter">
                    <b><i class="fa fa-angle-up"></i></b>
                </div>
            </div>
        </div>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="assets/js/index.js"></script>
</body>

</html>