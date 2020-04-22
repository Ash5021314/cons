<?php
session_start();
require "../connect.php";

if (!isset($_SESSION['userName'])) {
    header('location: index.php');
}

$newsQuery = mysqli_query($connDB, "SELECT * FROM gift ORDER BY id DESC");
$newSouveniresQuery = mysqli_query($connDB, "SELECT * FROM new_souvenire");
$allCollHead = mysqli_query($connDB, "SELECT * FROM all_collection");
$allColl = mysqli_query($connDB, "SELECT * FROM coll_desc  ORDER BY id DESC");


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
            <p class="adminP">Souvenirs</p>
        </li>
        <li><a href="exit.php">Exit</a></li>
        <li><a href="admin.php">Home</a></li>
    </ul>
    <!-- =============================================================================== -->


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
            <tr class="newDiv tableBody_1" data-base="z9_1" data-Id="<?php echo $newSouveniresQueryDiv['id']; ?>">

                <td>
                    <input type=" text" class="title" value="<?php echo $newSouveniresQueryDiv['new_souvenirs'] ?>">
                    <input type="text" class="title_2"
                        value="<?php echo $newSouveniresQueryDiv['new_souvenirs_eng'] ?>">
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
            <tr class="newDiv tableBody_1" data-base="z9_2" data-Id="<?php echo $allCollHeadDiv['id']; ?>">
                <td>
                    <input type="text" class="title" value="<?php echo $allCollHeadDiv['title'] ?>">
                    <input type="text" class="title_2" value="<?php echo $allCollHeadDiv['title_eng'] ?>">
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


    <p class="instalHead instalHead_2">All Colection Coins</p>
    <table class="table table_1" style="white-space:wrap;">
        <thead>
            <tr class="tableHead_1">
                <th>Images Place</th>
                <th>Tilte </th>
                <th>Description </th>
                <th>Submit</th>
            </tr>
        </thead>
        <tbody class="adminContent9">
            <tr class="newDiv tableBody_1" data-b="z9_3">
                <td>
                    <p class="adminP">First Place</p>
                    <input type="file" class="file">
                    <p class="adminP">Seccond Place</p>
                    <input type="file" class="file3">
                    <p class="adminP">First Coin</p>
                    <input type="file" class="file1">
                    <p class="adminP">Seccond Coin</p>
                    <input type="file" class="file2">
                    <p class="adminP">First page Slide</p>
                    <input type="file" class="file4">
                    <p class="adminP">Seccond page Slide</p>
                    <input type="file" class="file5">
                    <p class="adminP">Map Slide</p>
                    <input type="file" class="file6">
                    <p class="adminP">Map Mark</p>
                    <input type="file" class="file7">
                </td>

                <td>
                    <input type="text" class="title" placeholder="title Arm">
                    <input type="text" class="title_2" placeholder="title Eng">
                    <input type="text" class="title_3" placeholder="Slide Text">
                    <input type="text" class="title_4" placeholder="Slide Text english">
                    <input type="text" class="title_5" placeholder="Top of mark">
                    <input type="text" class="title_6" placeholder="left of mark">
                </td>
                <td>
                    <textarea cols="30" rows="6" class="textarea" placeholder="text Arm"></textarea>
                    <textarea cols="30" rows="6" class="textarea_2" placeholder="text Eng"></textarea>
                </td>
                <td>
                    <button type="button" class="btn btn-success" id="buttInsert">INSERT</button>
                </td>
            </tr>
            <?php
            if (mysqli_num_rows($allColl) > 0) {
                while ($allCollDiv = mysqli_fetch_assoc($allColl)) {
            ?>
            <tr class="newDiv tableBody_1" data-base="z9_3" data-Id="<?php echo $allCollDiv['id']; ?>">
                <td>
                    <div>
                        <p class="adminP">First Place</p>
                        <img src="../assets/images/collection/<?php echo $allCollDiv['first_image']; ?>">
                        <input type="file" class="file">
                    </div>
                    <div>
                        <p class="adminP">Seccond Place</p>
                        <img src="../assets/images/collection/<?php echo $allCollDiv['first_image_prod']; ?>">
                        <input type="file" class="file3">
                    </div>
                    <div>
                        <p class="adminP">First Coin</p>
                        <img src="../assets/images/collection/<?php echo $allCollDiv['seccond_image']; ?>">
                        <input type="file" class="file1">
                    </div>
                    <div>
                        <p class="adminP">Second Coin</p>
                        <img src="../assets/images/collection/<?php echo $allCollDiv['third_image']; ?>">
                        <input type="file" class="file2">
                    </div>
                    <div>
                        <p class="adminP">First Slide</p>
                        <img src="../assets/images/collection/<?php echo $allCollDiv['first_slide']; ?>">
                        <input type="file" class="file4">
                    </div>
                    <div>
                        <p class="adminP">Second Slide</p>
                        <img src="../assets/images/collection/<?php echo $allCollDiv['seccond_slide']; ?>">
                        <input type="file" class="file5">
                    </div>
                    <div>
                        <p class="adminP">Map Slide</p>
                        <img src="../assets/images/collection/<?php echo $allCollDiv['map']; ?>">
                        <input type="file" class="file6">
                    </div>
                    <div>
                        <p class="adminP">mark</p>
                        <img src="../assets/images/collection/<?php echo $allCollDiv['loc-img']; ?>">
                        <input type="file" class="file7">
                    </div>
                </td>
                <td>
                    <p class="adminP">Title Armenian</p>
                    <input type="text" class="title" value="<?php echo $allCollDiv['title'] ?>">
                    <p class="adminP">Title Engish</p>
                    <input type="text" class="title_2" value="<?php echo $allCollDiv['title_eng'] ?>">
                    <p class="adminP">Slide Text</p>
                    <input type="text" class="title_3" value="<?php echo $allCollDiv['slide_text'] ?>">
                    <p class="adminP">Slide Text English</p>
                    <input type="text" class="title_4" value="<?php echo $allCollDiv['slide_text_eng'] ?>">
                    <p class="adminP">Top of the Mark</p>
                    <input type="text" class="title_5" value="<?php echo $allCollDiv['loc-pos-top'] ?>">
                    <p class="adminP">Left of the Mark</p>
                    <input type="text" class="title_6" value="<?php echo $allCollDiv['loc-pos-left'] ?>">
                </td>
                <td>
                    <textarea cols="30" rows="4" class="textarea"><?php echo $allCollDiv['text']; ?></textarea>
                    <textarea cols="30" rows="4" class="textarea_2"><?php echo $allCollDiv['text_eng']; ?></textarea>
                </td>
                <td>
                    <button type="button" class="btn btn-info updtaButt">UPDATE</button>
                    <button type="button" class="btn btn-danger DeleteButt">DELETE</button>

                </td>
            </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
    <!-- ============================================================================================ -->
    <script src="https://code.jquery.com/jquery-3.5.0.js"
        integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc=" crossorigin="anonymous"></script>
    <script src="../assets/js/scriptAdmin.js">
    </script>
</body>

</html>