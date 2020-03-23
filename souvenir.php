<?php
require "connect.php";
$gift = mysqli_query($connDB, "SELECT * FROM `gift`");
$suovenir = mysqli_query($connDB, "SELECT * FROM `new_souvenire`");
$coll = mysqli_query($connDB, "SELECT * FROM `all_collection`");
$coll_desc = mysqli_query($connDB, "SELECT * FROM `coll_desc` ORDER BY `id` DESC");
$coll_description = mysqli_query($connDB, "SELECT * FROM `coll_desc` ORDER BY `id` DESC");
?>
<!doctype html>
<html lang="en">

<head>
    <title>Armenian Coins</title>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
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
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"
        id="bootstrap-css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
</head>

<body class="sovenir">
    <header>
        <div class="header-container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="index.php">
                    <img src="./assets/images/6546.png" width="240" height="120" alt="">
                </a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="#" style="color: #a58f78 !important;">souvenir</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="terminal.php">terminals</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">history</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact-us.php">contact us</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <div class="header-content">
        <div class="slider">
            <div class="container">
                <div class="timer"></div>
                <div class="slideshow">
                    <?php
          if (mysqli_num_rows($gift) > 0) {
            while ($bestGift =  mysqli_fetch_assoc($gift)) {
          ?>
                    <div class="slide"><img src="assets/images/<?php echo $bestGift['picture'] ?>" /></div>

                    <?php
            }
          }
          ?>
                </div>
            </div>
        </div>
        <div class="new-product">
            <p>BEST GIFT FROM ARMENIA</p>
        </div>
        <a href="#">
            <div class="header-exople">
                <p>Explore More</p>
            </div>
        </a>
    </div>
    <div class="main">
        <section>
            <div class="main-container-sovenir">
                <?php
        if (mysqli_num_rows($suovenir) > 0) {
          while ($suovenirs =  mysqli_fetch_assoc($suovenir)) {
        ?>
                <p class="section-title"><?php echo $suovenirs['new_souvenirs'] ?></p>
                <?php
          }
        }
        ?>
                <div class="container">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="4000">
                        <div class="carousel-inner row w-100 mx-auto" role="listbox">
                            <?php
              if (mysqli_num_rows($coll_description) > 0) {
                while ($collection_descriptions =  mysqli_fetch_assoc($coll_description)) {
              ?>
                            <div class="carousel-item col-md-3  ">
                                <div class="panel panel-default">
                                    <div class="panel-thumbnail">
                                        <a href="#" title="image 1" class="thumb">
                                            <img class="img-fluid mx-auto d-block"
                                                src="assets/images/<?php echo $collection_descriptions['seccond_image'] ?>"
                                                alt="slide 1">
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <?php
                }
              }
              ?>
                        </div>
                        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                            <span class="carousel-prev-icon" aria-hidden="true"><img
                                    src="assets/images/arrow-l.png"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next text-faded" href="#myCarousel" role="button" data-slide="next">
                            <span class="carousel-next-icon" aria-hidden="true"><img
                                    src="assets/images/arrow-r.png"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>

            </div>
        </section>
        <section>
            <div class="collection-section">
                <?php
        if (mysqli_num_rows($coll) > 0) {
          while ($collection =  mysqli_fetch_assoc($coll)) {
        ?>
                <p class="section-title"><?php echo $collection['all_col'] ?></p>
                <?php
          }
        }
        ?>
                <?php
        if (mysqli_num_rows($coll_desc) > 0) {
          while ($collection_desc =  mysqli_fetch_assoc($coll_desc)) {
        ?>
                <div class="col-md-12 row">
                    <div class="col-md-6 pb-30">
                        <div class="collection-picture">
                            <img src="assets/images/<?php echo $collection_desc['first_image'] ?>">
                        </div>
                        <div class="collection-coin">
                            <img src="assets/images/<?php echo $collection_desc['seccond_image'] ?>">
                        </div>
                    </div>
                    <div class="col-md-5 pb-30">
                        <div class="sov-text">
                            <h1><?php echo $collection_desc['title'] ?></h1>
                            <p><?php echo $collection_desc['text'] ?></p>
                            <p class="toogle-text1"><?php echo $collection_desc['hid_text'] ?></p>
                            <button class="toggle-button1" class="show-button"><img
                                    src="assets/images/toogle.png"></button>
                        </div>
                    </div>
                </div>
                <?php
          }
        }
        ?>
            </div>
        </section>
        <section>
            <div class="find-product">
                <p class="section-title">SOUVENIR'S PACKAGING</p>
                <div class="container">
                    <div id="myCarousel_1" class="carousel slide" data-ride="carousel" data-interval="4000">
                        <div class="carousel-inner_1 row w-100 mx-auto" role="listbox">
                            <div class="carousel-item_1 col-md-4  active">
                                <div class="panel panel-default">
                                    <div class="panel-thumbnail">
                                        <a href="shops.php" title="image 8" class="thumb">
                                            <img class="img-fluid mx-auto d-block" src="assets/images/1.png"
                                                alt="slide 9">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item_1 col-md-4 ">
                                <div class="panel panel-default">
                                    <div class="panel-thumbnail">
                                        <a href="shops.php" title="image 9" class="thumb">
                                            <img class="img-fluid mx-auto d-block" src="assets/images/2.png"
                                                alt="slide 9">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item_1 col-md-4 ">
                                <div class="panel panel-default">
                                    <div class="panel-thumbnail">
                                        <a href="shops.php" title="image 10" class="thumb">
                                            <img class="img-fluid mx-auto d-block" src="assets/images/3.png"
                                                alt="slide 10">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <a class="carousel-control-prev_1" href="#myCarousel_1" role="button" data-slide="prev">
              <span class="carousel-prev-icon_1" aria-hidden="true"><img src="assets/images/arrow-l.png"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next_1 text-faded" href="#myCarousel_1" role="button" data-slide="next">
              <span class="carousel-next-icon_1" aria-hidden="true"><img src="assets/images/arrow-r.png"></span>
              <span class="sr-only">Next</span>
            </a> -->
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="idea-section row">
                <div class="left-block">
                    <p class="contact">Contact Us</p>
                    <p>Email: info@honey.com</p>
                    <p>Phone: (408) 106-9898 </p>
                    <p>(408) 106-9696</p>
                </div>
                <div class="right-block">
                    <p class="follow">Follow Us</p>
                    <a href="#"><img src="assets/images/fb.png" style="width: 35px"></a>
                    <a href="#"><img src="assets/images/twiter.png" style="width: 35px"></a>
                    <a href="#"><img src="assets/images/instagram.png" style="width: 35px"></a>
                </div>
            </div>
        </section>
    </div>
    <footer>
        <p class="footer-block">© 2019 Armenian coins, All Rights Reserved.</p>
    </footer>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"
        id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="assets/js/index.js"></script>
</body>

</html>