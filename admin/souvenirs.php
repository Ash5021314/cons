<?php
session_start();
require "../connect.php";

if (!isset($_SESSION['userName'])) {
    header('location: index.php');
}

$newsQuery = mysqli_query($connDB, "SELECT * FROM gift ORDER BY id DESC");
$newSouveniresQuery = mysqli_query($connDB, "SELECT * FROM new_souvenire ");
$allCollHead = mysqli_query($connDB, "SELECT `head_title`, `head_title_eng` FROM coll_desc  WHERE `head_title` IS NOT NULL AND  `head_title_eng` IS NOT NULL ");
$allColl = mysqli_query($connDB, "SELECT * FROM coll_desc  ORDER BY id DESC");


//ini_set('display_errors','Off');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/styleAdmin.css">
    <title>Login</title>
</head>

<body>
    <!-- ============================== Header ======================================= -->

    <ul class="adminHead">
        <li>
            <p>Souvenirs</p>
        </li>
        <li><a href="exit.php">Exit</a></li>
        <li><a href="admin.php">Home</a></li>
    </ul>
    <!-- =============================================================================== -->
    <!-- ============================== Insert Section =================================== -->

    <p class="instalHead">Insert pictures for souvenirs slide</p>
    <table class="table table-bordered table_1">
        <thead>
            <tr class="tableHead_1">
                <th>Shop Image File </th>
                <th>Submit</th>
            </tr>
        </thead>
        <tbody>
            <tr class="tableBody_1" data-b="z4">
                <td>
                    <input type="file" class="file" style="width:none;">
                </td>
                <td>
                    <button type="button" class="btn btn-success" id="buttInsert">INSERT</button>
                </td>
            </tr>
        </tbody>
    </table>
    <!-- ============================================================================================ -->
    <!-- ============================== Create Section ================================================ -->

    <p class="instalHead instalHead_2">New Souvenirs</p>
    <table class="table table_1">
        <thead>
            <tr class="tableHead_1">
                <th>Image</th>
                <th>Submit</th>
            </tr>
        </thead>
        <tbody class="adminContent">
            <tr class="newDiv tableBody_1" data-base="z4">

                <td>
                    <input type="file" class="file">
                </td>

                <td>
                    <button type="button" class="btn btn-success" id="UpdtaButt">INSERT</button>
                </td>
            </tr>
            <?php
            if (mysqli_num_rows($newsQuery) > 0) {
                while ($newsQueryDiv = mysqli_fetch_assoc($newsQuery)) {
            ?>
                    <tr class="newDiv tableBody_1" data-base="z4">

                        <td>
                            <img src="../assets/images/gift/<?php echo $newsQueryDiv['picture']; ?>">
                            <input type="file" class="file">
                        </td>

                        <td>
                            <button type="button" class="btn btn-info" id="UpdtaButt">UPDATE</button>
                            <button type="button" class="btn btn-danger" id="DelButt">DELETE</button>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
    <!-- ============================================================================================ -->

    <!-- ============================== Create Section ================================================ -->

    <p class="instalHead instalHead_2">New Souvenires</p>
    <table class="table table_1">
        <thead>
            <tr class="tableHead_1">
                <th>New Souvenires</th>
                <th>Submit</th>
            </tr>
        </thead>
        <tbody class="adminContent">

            <?php
            if (mysqli_num_rows($newSouveniresQuery) > 0) {
                while ($newSouveniresQueryDiv = mysqli_fetch_assoc($newSouveniresQuery)) {
            ?>
                    <tr class="newDiv tableBody_1" data-base="z4">

                        <td>
                            <input type="text" class="textArm" value="<?php echo $newSouveniresQueryDiv['new_souvenirs'] ?>">
                            <input type="text" class="textArm" value="<?php echo $newSouveniresQueryDiv['new_souvenirs_eng'] ?>">
                        </td>

                        <td>
                            <button type="button" class="btn btn-info" id="UpdtaButt">UPDATE</button>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>

    <!-- ============================================================================================ -->


    <p class="instalHead instalHead_2">All Colection</p>
    <table class="table table_1">
        <thead>
            <tr class="tableHead_1">
                <th>All Colection</th>
                <th>Submit</th>
            </tr>
        </thead>
        <tbody class="adminContent">
            <?php
            if (mysqli_num_rows($allCollHead) > 0) {
                while ($allCollHeadDiv = mysqli_fetch_assoc($allCollHead)) {
            ?>
                    <tr class="newDiv tableBody_1" data-base="z4">

                        <td>
                            <input type="text" class="textArm" value="<?php echo $allCollHeadDiv['head_title'] ?>">
                            <input type="text" class="textArm" value="<?php echo $allCollHeadDiv['head_title_eng'] ?>">
                        </td>

                        <td>
                            <button type="button" class="btn btn-info" id="UpdtaButt">UPDATE</button>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>

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
            <tr class="newDiv tableBody_1" data-base="z4">
                <td>
                    <input type="file" class="file">
                </td>
                <td>
                    <input type="file" class="file">
                </td>
                <td>
                    <input type="text" class="textArm" placeholder="title Arm">
                    <input type="text" class="textArm" placeholder="title Eng">
                </td>
                <td>
                    <textarea cols="30" rows="4" class="textarea" placeholder="text Arm"></textarea>
                    <textarea cols="30" rows="4" class="textarea_2" placeholder="text Eng"></textarea>
                </td>
                <td>
                    <button type="button" class="btn btn-success" id="UpdtaButt">INSERT</button>
                </td>
            </tr>
            <?php
            if (mysqli_num_rows($allColl) > 0) {
                while ($allCollDiv = mysqli_fetch_assoc($allColl)) {
            ?>
                    <tr class="newDiv tableBody_1" data-base="z4">
                        <td>
                            <img src="../assets/images/collection/<?php echo $allCollDiv['first_image']; ?>">
                            <input type="file" class="file">
                        </td>
                        <td>
                            <img src="../assets/images/collection/<?php echo $allCollDiv['seccond_image']; ?>">
                            <input type="file" class="file">
                        </td>
                        <td>
                            <input type="text" class="textArm" value="<?php echo $allCollDiv['title'] ?>">
                            <input type="text" class="textArm" value="<?php echo $allCollDiv['title_eng'] ?>">
                        </td>
                        <td>
                            <textarea cols="30" rows="4" class="textarea"><?php echo $allCollDiv['text']; ?></textarea>
                            <textarea cols="30" rows="4" class="textarea_2"><?php echo $allCollDiv['text_eng']; ?></textarea>
                        </td>
                        <td>
                            <button type="button" class="btn btn-info" id="UpdtaButt">UPDATE</button>
                            <button type="button" class="btn btn-danger" id="DeleteButt">DELETE</button>

                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
    <!-- ============================================================================================ -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery-3.2.1.min.js"></script>
    <script src="../assets/js/scriptAdmin.js"></script>
</body>

</html>