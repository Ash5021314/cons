<?php
require "connect.php";
$gift = mysqli_query($connDB, "SELECT * FROM `coll_desc`");
$slideID = mysqli_query($connDB, "SELECT * FROM `coll_desc`");
$suovenir = mysqli_query($connDB, "SELECT * FROM `new_souvenire`");
$coll = mysqli_query($connDB, "SELECT * FROM all_collection");
$coll_desc = mysqli_query($connDB, "SELECT * FROM `coll_desc` ORDER BY `id` DESC");
$coll_description = mysqli_query($connDB, "SELECT * FROM `coll_desc` ORDER BY `id` DESC");
$coll_second_image =  mysqli_query($connDB, "SELECT id, seccond_image FROM `coll_desc` ORDER BY `id` DESC");
$packaging = mysqli_query($connDB, "SELECT  `image` FROM `packiging_slide`");
$packagingTitle = mysqli_query($connDB, "SELECT * FROM souvenir");
$contact = mysqli_query($connDB, "SELECT * FROM `contact`");
$follow = mysqli_query($connDB, "SELECT * FROM `follow`");
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
    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/owl.carousel.css">
    <link rel="stylesheet" href="../assets/css/owl.theme.default.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"
        id="bootstrap-css">
    <link href="../assets/css/slick.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/css/slick-theme.css" />
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <style>
    .owl-carousel .nav-btn {
        height: 100px;
        position: absolute;
        width: 26px;
        cursor: pointer;
        top: 100px !important;
    }

    .owl-carousel .owl-prev.disabled,
    .owl-carousel .owl-next.disabled {
        pointer-events: none;
        opacity: 0.2;
    }

    .owl-carousel .prev-slide {
        position: absolute;
        background: url("../assets/images/arrow-r.png") no-repeat;
        right: -33px;
    }

    .owl-carousel .next-slide {
        position: absolute;
        background: url("../assets/images/arrow-l.png") no-repeat;
        left: -33px;
    }
    </style>
</head>

<body class="sovenir">
    <header>
        <div class="header-container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="index.php">
                    <img src="../assets/images/6546.png" width="240" height="120" alt="">
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
                <a style="margin-left:20px" href="../souvenir.php"><img src="../assets/images/armenianFlag.png" /></a>
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
                    <div class="slide"><img
                            src="../assets/images/collection/<?php echo $bestGift['seccond_slide'] ?>" />
                    </div>

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
                            <a href="garn.php?cluster=<?php echo $RequestText; ?>">
                                <p>Explore More</p>
                            </a>
                        </div>
                        <?
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main">
        <section>
            <div class="main-container-sovenir">
                <?php
                if (mysqli_num_rows($suovenir) > 0) {
                    while ($suovenirs =  mysqli_fetch_assoc($suovenir)) {
                ?>
                <p class="section-title"><?php echo $suovenirs['new_souvenirs_eng'] ?></p>
                <?php
                    }
                }
                ?>

            </div>

        </section>
    </div>
    <section class="regular slider">
        <?php
        if (mysqli_num_rows($coll_second_image) > 0) {
            while ($coll_description_image =  mysqli_fetch_assoc($coll_second_image)) {

        ?>
        <div>
            <img class="imgId" data-id="<?php echo $coll_description_image['id']; ?>"
                src="../assets/images/collection/<?php echo $coll_description_image['seccond_image']; ?>">
        </div>
        <?php
            }
        }
        ?>
    </section>
    <section>
        <div class="collection-section">
            <?php
            if (mysqli_num_rows($coll) > 0) {
                while ($collection =  mysqli_fetch_assoc($coll)) {
            ?>
            <p class="section-title"><?php echo $collection['title_eng'] ?></p>
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
                        <?
                                $Text = json_encode($collection_desc);
                                $RequestText = urlencode($Text);
                                ?>
                        <a href="garn.php?cluster=<?php echo $RequestText; ?>"> <img
                                src="../assets/images/collection/<?php echo $collection_desc['first_image'] ?>"></a>
                    </div>
                    <div class="collection-coin">
                        <img id="col-<?php echo $collection_desc['id'] ?>"
                            src="../assets/images/collection/<?php echo $collection_desc['seccond_image'] ?>">
                    </div>
                </div>
                <div class="col-md-5 pb-30">
                    <div class="sov-text">
                        <h1><?php echo $collection_desc['title_eng'] ?></h1>
                        <p class="toogle-hidden"><?php echo  nl2br($collection_desc['text_eng']) ?></p>
                        <button class="toggle-button1 show-button"><img src="../assets/images/toogle.png"></button>
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
            <?php
            while ($title =  mysqli_fetch_assoc($packagingTitle)) {
            ?>

            <p class="section-title"><?php echo $title['title_eng'] ?></p>
            <?php
            }
            ?>
            <div class="container">
                <div class="col-md-12">
                    <div class="owlContainer">
                        <div class="owl-carousel">
                            <?php
                            if (mysqli_num_rows($packaging) > 0) {
                                while ($packagingImg =  mysqli_fetch_assoc($packaging)) {
                            ?>

                            <a href="shops.php" title="image 9" class="thumb">
                                <div class="item">
                                    <img class="img-fluid mx-auto d-block"
                                        src="../assets/images/package/<?php echo $packagingImg['image'] ?>"
                                        alt="slide 10">
                                </div>
                            </a>

                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
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
                <a href="<?php echo $followUs['icon_link'] ?>"><img
                        src="../assets/images/socialIcon/<?php echo $followUs['icon'] ?>" style="width: 35px"></a>

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
    <div id="to_top">
        <div class="flex justifyCenter">
            <div class="circle flex justifyCenter alignCenter">
                <b><i class="fa fa-angle-up"></i></b>
            </div>
        </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="../assets/js/index.js"></script>
    <script src="../assets/js/slick.js" type="text/javascript"></script>
    <script src="../assets/js/owl.carousel.js"></script>
    <script src="../assets/js/owl.navigation.js"></script>
    <script>
    $(document).ready(function() {
        $(".owl-carousel").owlCarousel({
            loop: true,
            autoplay: true,
            margin: 10,
            nav: true,
            navText: ["<div class='nav-btn prev-slide'></div>",
                "<div class='nav-btn next-slide'></div>"
            ],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 3
                }
            }
        });
        $(".regular").slick({
            dots: false,
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1,
        });
        $(".imgId").click(function() {
            var as = $(this).attr("data-id");
            $("html, body").animate({
                    scrollTop: $("#col-" + as + "").offset().top
                },
                1000
            );
        });
    });
    </script>
</body>

</html>