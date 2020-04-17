<?php
session_start();
require "../connect.php";

if (!isset($_SESSION['userName'])) {
    header('location: index.php');
}

$allCollHead = mysqli_query($connDB, "SELECT `id`, `title`, `title_eng` FROM visit_desc  WHERE `title` IS NOT NULL AND  `title_eng` IS NOT NULL ");
$allColl = mysqli_query($connDB, "SELECT * FROM visit_desc  ORDER BY id DESC");


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
            <p>Souvenirs</p>
        </li>
        <li><a href="exit.php">Exit</a></li>
        <li><a href="admin.php">Home</a></li>
    </ul>
    <!-- =============================================================================== -->


    <!-- ============================== Create Section ================================================ -->



    <p class="instalHead instalHead_2">All Colection</p>
    <table class="table table_1">
        <thead>
            <tr class="tableHead_1">
                <th>All Colection</th>
                <th>Submit</th>
            </tr>
        </thead>
        <tbody class="adminContentTitle">
            <?php
            if (mysqli_num_rows($allCollHead) > 0) {
                while ($allCollHeadDiv = mysqli_fetch_assoc($allCollHead)) {
            ?>
            <tr class="newDiv tableBody_1" data-base="z3" data-Id="<?php echo $allCollHeadDiv['id']; ?>">

                <td>
                    <textarea class="textarea" cols="30" rows="10"><?php echo $allCollHeadDiv['title'] ?></textarea>
                    <textarea class="textarea_1" cols="30"
                        rows="10"><?php echo $allCollHeadDiv['title_eng'] ?></textarea>
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
    <table class="table table_1">
        <thead>
            <tr class="tableHead_1">
                <th>Images Place vor visit</th>
                <th>Description </th>
                <th>Submit</th>
            </tr>
        </thead>
        <tbody class="adminContent">
            <tr class="newDiv tableBody_1" data-b="z4">
                <td>
                    <input type="file" class="file">
                </td>
                <td>
                    <textarea cols="30" rows="4" class="textarea" placeholder="text Arm"></textarea>
                    <textarea cols="30" rows="4" class="textarea_2" placeholder="text Eng"></textarea>
                </td>
                <td>
                    <button type="button" class="btn btn-success" id="buttInsert">INSERT</button>
                </td>
            </tr>
            <?php
            if (mysqli_num_rows($allColl) > 0) {
                while ($allCollDiv = mysqli_fetch_assoc($allColl)) {
            ?>
            <tr class="newDiv tableBody_1" data-base="z4_1" data-Id="<?php echo $allCollDiv['id']; ?>">
                <td>
                    <div>
                        <img src="../assets/images/visit/<?php echo $allCollDiv['image']; ?>">
                        <input type="file" class="file">
                    </div>
                </td>
                <td>
                    <textarea cols="30" rows="4" class="textarea"><?php echo $allCollDiv['description']; ?></textarea>
                    <textarea cols="30" rows="4"
                        class="textarea_1"><?php echo $allCollDiv['description_eng']; ?></textarea>
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
    <script src="../assets/js/jquery-3.2.1.min.js"></script>
    <script src="../assets/js/scriptAdmin.js"></script>
</body>

</html>