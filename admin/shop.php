<?php
session_start();
require "../connect.php";

if (!isset($_SESSION['userName'])) {
    header('location: index.php');
}

$newsQuery = mysqli_query($connDB, "SELECT * FROM packaging ORDER BY id DESC");
$newsQueryHead = mysqli_query($connDB, "SELECT `head_title`, `head_title_eng`, `head_image` FROM packaging  WHERE `head_title` IS NOT NULL AND  `head_title_eng` IS NOT NULL AND `head_image` IS NOT NULL");

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
            <p>Shop</p>
        </li>
        <li><a href="exit.php">Exit</a></li>
        <li><a href="admin.php">Home</a></li>
    </ul>
    <!-- =============================================================================== -->
    <!-- ============================== Insert Section =================================== -->

    <p class="instalHead">Instal New Division</p>
    <table class="table table-bordered table_1">
        <thead>
            <tr class="tableHead_1">
                <th>Shop Image File </th>
                <th>Shop Title (2 pages) </th>
                <th>Shop Text (2 pages) </th>
                <th>Submit</th>
            </tr>
        </thead>
        <tbody>
            <tr class="tableBody_1" data-b="z4">
                <td><input type="file" class="file" style="width:none;"></td>
                <td><input type="text" class="headertext" placeholder="Header Title"></td>
                <td>
                    <textarea cols="30" rows="4" class="textarea" placeholder="page 1"></textarea>
                    <textarea cols="30" rows="4" class="textarea_2" placeholder="page 2"></textarea>
                </td>

                <td><button type="button" class="btn btn-success" id="buttInsert">INSERT</button></td>
            </tr>
        </tbody>
    </table>
    <!-- ============================================================================================ -->
    <!-- ============================== Create Section ================================================ -->

    <p class="instalHead instalHead_2">All Division</p>
    <table class="table table_1">
        <thead>
            <tr class="tableHead_1">
                <th>Search File</th>
                <th>Title (2 pages)</th>
                <th>Shop image</th>
                <th>Title (2 pages)</th>
                <th>Text (2 pages)</th>
                <th>Submit</th>
            </tr>
        </thead>
        <tbody class="adminContent">
            <?php
            if (mysqli_num_rows($newsQueryHead) > 0) {
                while ($newsQueryHeadDiv = mysqli_fetch_assoc($newsQueryHead)) {
            ?>
                    <tr class="newDiv tableBody_1" data-base="z4">

                        <td>
                            <img src="../assets/images/shop/<?php echo $newsQueryHeadDiv['head_image']; ?>">
                            <input type="file" class="file">
                        </td>
                        <td>
                            <input type="text" class="clockIns" value="<?php echo $newsQueryHeadDiv['head_title']; ?>">
                            <input type="text" class="clockIns" value="<?php echo $newsQueryHeadDiv['head_title_eng']; ?>">
                        </td>
                        <td>
                            <button type="button" class="btn btn-info" id="UpdtaButt">UPDATE</button>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
            <?php
            if (mysqli_num_rows($newsQuery) > 0) {
                while ($newsDiv = mysqli_fetch_assoc($newsQuery)) {
            ?>
                    <tr class="newDiv tableBody_1" data-base="z4" data-Id="<?php echo $newsDiv['id']; ?>">

                        <td>
                            <img src="../assets/images/shop/<?php echo $newsDiv['image']; ?>">
                            <input type="file" class="file">
                        </td>
                        <td>
                            <input type="text" class="textArm" value="<?php echo $newsDiv['title']; ?>">
                            <input type="text" class="textEng" value="<?php echo $newsDiv['title_eng']; ?>">
                        </td>
                        <td>
                            <textarea cols="30" rows="4" class="textarea"><?php echo $newsDiv['description']; ?></textarea>
                            <textarea cols="30" rows="4" class="textarea_2"><?php echo $newsDiv['description_eng']; ?></textarea>
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