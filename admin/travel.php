<?php
session_start();
require "../connect.php";

if (!isset($_SESSION['userName'])) {
    header('location: index.php');
}

$allColl = mysqli_query($connDB, "SELECT * FROM travel  ORDER BY id DESC");


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
    <!-- ============================== Header ======================================= -->

    <ul class="adminHead">
        <li>
            <p>Travel</p>
        </li>
        <li><a href="exit.php">Exit</a></li>
        <li><a href="admin.php">Home</a></li>
    </ul>
    <!-- =============================================================================== -->

    <!-- ============================================================================================ -->


    <p class="instalHead instalHead_2">All Colection Coins</p>
    <table class="table table_1">
        <thead>
            <tr class="tableHead_1">
                <th>Images Place</th>
                <th>Images Coin</th>
                <th>Tilte </th>
                <th>Description </th>
                <th>Submit</th>
            </tr>
        </thead>
        <tbody class="adminContent">
            <?php
            if (mysqli_num_rows($allColl) > 0) {
                while ($allCollDiv = mysqli_fetch_assoc($allColl)) {
            ?>
            <tr class="newDiv tableBody_1" data-base="z2" data-Id="<?php echo $allCollDiv['id']; ?>">
                <td>
                    <img src="../assets/images/travel/<?php echo $allCollDiv['first_image']; ?>">
                    <input type="file" class="file">
                </td>
                <td>
                    <img src="../assets/images/travel/<?php echo $allCollDiv['seccond_image']; ?>">
                    <input type="file" class="file1">
                </td>
                <td>
                    <input type="text" class="title" value="<?php echo $allCollDiv['title'] ?>">
                    <input type="text" class="title_2" value="<?php echo $allCollDiv['title_eng'] ?>">
                </td>
                <td>
                    <textarea cols="30" rows="4" class="textarea"><?php echo $allCollDiv['text']; ?></textarea>
                    <textarea cols="30" rows="4" class="textarea_2"><?php echo $allCollDiv['text_eng']; ?></textarea>
                </td>
                <td>
                    <button type="button" class="btn btn-info updtaButt">UPDATE</button>

                </td>
            </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
    <!-- ============================================================================================ -->
    <script src="../assets/js/jquery-3.2.1.min.js"></script>
    <script src="../assets/js/scriptAdmin.js"></script>
</body>

</html>