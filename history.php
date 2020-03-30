<?php
require "connect.php";
$historyInfo = mysqli_query($connDB, "SELECT * FROM `history`");
$partners = mysqli_query($connDB, "SELECT * FROM `partners`");
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
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
</head>

<body class="history">
    <header>
        <div class="header-container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="index.php">
                    <img src="./assets/images/6546.png" width="240" height="120" alt="">
                </a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="souvenir.php">souvenir</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="terminal.php">terminals</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" style="color: #a58f78 !important;">history</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact-us.php">contact us</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <?php
    if (mysqli_num_rows($historyInfo) > 0) {
        while ($history =  mysqli_fetch_assoc($historyInfo)) {
    ?>
            <div class="header-content">
                <img src="assets/images/history/<?php echo $history['historyImage'] ?>">
            </div>
            <div class="main">
                <section>
                    <div class="main-container">
                        <p class="section-title"><?php echo $history['title'] ?></p>
                        <p class="history-text"><?php echo nl2br($history['text']) ?></p>
                    </div>
                </section>
        <?php
        }
    }
        ?>
        <section>
            <div class="our-partners">
                <p class="section-title">OUR PARTNERS</p>
                <div class="col-md-12">
                    <div class="owlContainer">
                        <div class="owl-carousel">
                            <?php
                            if (mysqli_num_rows($partners) > 0) {
                                while ($partnerss =  mysqli_fetch_assoc($partners)) {
                            ?>
                                    <div class="item"><img src="assets/images/<?php echo $partnerss['slide_image'] ?>"></div>
                            <?php
                                }
                            }
                            ?>
                        </div>
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
            <script src="assets/js/index.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
            </script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
            </script>
            <script src="assets/js/owl.carousel.js"></script>
            <script src="assets/js/owl.navigation.js"></script>
            <script>
                $(document).ready(function() {
                    $(".owl-carousel").owlCarousel({
                        loop: true,
                        autoplay: true,
                        margin: 10,
                        nav: true,
                        responsive: {
                            0: {
                                items: 1
                            },
                            600: {
                                items: 3
                            },
                            1000: {
                                items: 4
                            }
                        }
                    });

                });
            </script>
</body>

</html>