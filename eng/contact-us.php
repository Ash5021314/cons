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
    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/main.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/fonts/iconic/css/material-design-iconic-font.min.css">
</head>

<body class="home">
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
                            <a class="nav-link" href="terminal.php">terminals</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="history.php">history</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" style="color: #a58f78 !important;">contact us</style></a>
                        </li>
                    </ul>
                </div>
                <a style="margin-left:20px" href="../contact-us.php"><img src="../assets/images/armenianFlag.png" /></a>
            </nav>
        </div>
    </header>
    <div class="header-content">
        <div class="main">
            <section>
                <div class="idea-section">
                    <p class="section-title">Contact Us</p>
                    <div class="col-md-12 row">
                        <div class="col-md-9">
                            <form class="contact100-form validate-form" action="../mess.php" method="post" target="_blank">

                                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="Please Type Your Name">
                                    <span class="label-input100"> Name*</span>
                                    <input class="input100" type="text" name="name" placeholder="Enter Your Name">
                                </div>
                                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="Please Type Your Surname">
                                    <span class="label-input100">Surname*</span>
                                    <input class="input100" type="text" name="surname" placeholder="Enter Your Surname">
                                </div>
                                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="Enter Your Email (e@a.x)">
                                    <span class="label-input100">Email *</span>
                                    <input class="input100" type="text" name="email" placeholder="Enter Your Email ">
                                </div>

                                <div class="wrap-input100 bg1 rs1-wrap-input100">
                                    <span class="label-input100">Phone</span>
                                    <input class="input100" type="text" name="phone" placeholder="Enter Number Phone">
                                </div>

                                <div class="wrap-input100 validate-input bg0 rs1-alert-validate" data-validate="Please Type Your Message">
                                    <span class="label-input100">Message</span>
                                    <textarea class="input100" name="message" placeholder="Your message here..."></textarea>
                                </div>

                                <div class="container-contact100-form-btn">
                                    <input type="submit" class="contact100-form-btn" name="sab" value="sned">
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

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <footer>
        <p class="footer-block">© 2019 Armenian coins, All Rights Reserved.</p>
    </footer>
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/index.js"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>

</body>

</html>