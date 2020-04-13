<?php
require "connect.php";
$contact = mysqli_query($connDB, "SELECT * FROM `contact`");
$follow = mysqli_query($connDB, "SELECT * FROM `follow`");
// $Text = urldecode($_REQUEST['cluster']);
// $Mixed = json_decode($Text);
// $Text2 = urldecode($_REQUEST['cluster2']);
// $Mixed2 = json_decode($Text2);

// if (isset($_REQUEST['cluster'])) {
//     echo 'cluster';
// } else if (isset($_REQUEST['cluster2'])) {
//     echo 'cluster2';
// }
if (isset($_REQUEST['cluster'])) {
    $Text =  urldecode($_REQUEST['cluster']);
} else if (isset($_REQUEST['cluster2'])) {
    $Text =  urldecode($_REQUEST['cluster2']);
}
$Mixed = json_decode($Text);
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
</head>

<body class="garni">
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
                            <a class="nav-link" href="contact-us.php">հետադարձ կապ</a>
                        </li>
                    </ul>
                </div>
                <?
                $Mixed1  = json_encode($Mixed);
                $RequestText1 = urlencode($Text);
                ?>
                <a style="margin-left:20px" href="eng/garn.php?cluster1=<?php echo $RequestText1; ?>"><img src="assets/images/englishFlag.png" /></a>
            </nav>
        </div>
    </header>
    <div class="header-content">
        <img src="assets/images/collection/<? echo $Mixed->first_image; ?>">
    </div>
    <div class="main">
        <section>
            <div class="main-container">
                <div class="col-md-12 row pt-15">
                    <div class="col-md-5 pb-30 flex">
                        <div class="collection-picture ">
                            <img src="assets/images/collection/<? echo $Mixed->seccond_image; ?>">
                        </div>
                        <div class="collection-picture ">
                            <img src="assets/images/collection/<? echo $Mixed->third_image; ?>">
                        </div>
                    </div>
                    <div class="col-md-7 pb-30">
                        <div class="sov-text">
                            <h1>
                                <? echo $Mixed->title; ?>
                            </h1>
                            <p>
                                <? echo nl2br($Mixed->text); ?>
                            </p>
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
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="assets/js/index.js"></script>
</body>

</html>