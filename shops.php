<?php
require "connect.php";
$packaging = mysqli_query($connDB, "SELECT * FROM `packaging` ORDER BY id DESC");
$packagingHead = mysqli_query($connDB, "SELECT `head_image` FROM `packaging` WHERE head_image IS NOT NULL");
$packagingTitle = mysqli_query($connDB, "SELECT `head_title` FROM `packaging`  WHERE head_title IS NOT NULL");
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"
        id="bootstrap-css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"
        id="bootstrap-css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>
</head>

<body class="shops">
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
                <a style="margin-left:20px" href="eng/shops.php"><img src="assets/images/englishFlag.png" /></a>
            </nav>
        </div>
    </header>
    <div class="header-content">
        <?php
        while ($packagingHeadPic =  mysqli_fetch_assoc($packagingHead)) {
        ?>
        <img src="assets/images/shop/<?php echo $packagingHeadPic['head_image'] ?>">
        <?php
        }
        ?>
    </div>
    <div class="main">
        <section>
            <div class="main-container">
                <?php
                while ($packagingTitleTExt =  mysqli_fetch_assoc($packagingTitle)) {
                ?>
                <p class="section-title"><?php echo $packagingTitleTExt['head_title'] ?></p>
                <?php
                }
                ?>
                <?php
                while ($packagingInfo =  mysqli_fetch_assoc($packaging)) {
                ?>
                <div class="col-md-12 row pt-15">
                    <div class="col-md-4 pb-30">
                        <div class="collection-picture">
                            <div class="pic"
                                style="background-image: url(assets/images/shop/<?php echo $packagingInfo['image'] ?>);">
                                <div class="ic">
                                    <div class="ic1">
                                        <a data-fancybox="gallery"
                                            href="assets/images/shop/<?php echo $packagingInfo['image'] ?>"
                                            data-options='{"thumbs" : false}'><img
                                                src="assets/images/shop/zoom_icon.png" alt="" class="zoom"></a>
                                    </div>
                                </div>
                                <div class="hidden">
                                    <div class="hidden_div"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 pb-30">
                        <div class="sov-text">
                            <h1><?php echo $packagingInfo['title'] ?></h1>
                            <p class="toogle-hidden"><?php echo  nl2br($packagingInfo['description']) ?></p>
                            <button class="toggle-button1 show-button" class="show-button"><img
                                    src="assets/images/toogle.png"></button>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </section>
        <section>
            <div class="idea-section row">
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
                    <a href="<?php echo $followUs['icon_link'] ?>"><img
                            src="assets/images/socialIcon/<?php echo $followUs['icon'] ?>" style="width: 35px"></a>

                    <?php
                        }
                    }
                    ?>
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