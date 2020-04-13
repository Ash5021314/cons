<?php
require "connect.php";
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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/fonts/iconic/css/material-design-iconic-font.min.css">
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
                            <a class="nav-link" href="contact-us.php" style="color: #a58f78 !important;">հետադարձ
                                կապ</a>
                        </li>
                    </ul>
                </div>
                <a style="margin-left:20px" href="eng/contact-us.php"><img src="assets/images/englishFlag.png" /></a>
            </nav>
        </div>
    </header>
    <div class="header-content">
        <div class="main">
            <section>
                <div class="idea-section">
                    <p class="section-title">հետադարձ կապ</p>
                    <div class="col-md-12 row">
                        <div class="col-md-9">
                            <form class="contact100-form validate-form" action="mess.php" method="post" target="_blank">

                                <div class="wrap-input100 validate-input bg1" data-validate="Please Type Your Name">
                                    <span class="label-input100">Անուն Ազգանուն*</span>
                                    <input class="input100" type="text" name="name"
                                        placeholder="Մուտքագրեք Անուն Ազգանունը">
                                </div>

                                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100"
                                    data-validate="Enter Your Email (e@a.x)">
                                    <span class="label-input100">Էլ․ Փոստ *</span>
                                    <input class="input100" type="text" name="email"
                                        placeholder="Մուտքագրեք Էլ․ Փոստի անունը">
                                </div>

                                <div class="wrap-input100 bg1 rs1-wrap-input100">
                                    <span class="label-input100">ՀԵռախոսահամրը</span>
                                    <input class="input100" type="text" name="phone"
                                        placeholder="Մուտքագրեք Հեռախոսահամրը">
                                </div>


                                <div class="wrap-input100 validate-input bg0 rs1-alert-validate"
                                    data-validate="Please Type Your Message">
                                    <span class="label-input100">Հաղորդագրություն</span>
                                    <textarea class="input100" name="message"
                                        placeholder="Ձեր հաղորդագրությունը այստեղ..."></textarea>
                                </div>

                                <div class="container-contact100-form-btn">
                                    <input type="submit" class="contact100-form-btn" name="sab" value="ուղարկել">

                                </div>
                            </form>
                        </div>
                        <div class="col-md-3 ">
                            <div class="flex-center">
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
                                            src="assets/images/socialIcon/<?php echo $followUs['icon'] ?>"
                                            style="width: 35px"></a>

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
        </div>
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
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
    </script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/index.js"></script>

</body>

</html>