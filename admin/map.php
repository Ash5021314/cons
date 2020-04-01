<?php
session_start();
require "../connect.php";

if (!isset($_SESSION['userName'])) {
    header('location: index.php');
}

$hedQuery = mysqli_query($connDB, "SELECT * FROM map_idea ORDER BY id DESC");
$hedQueryHead = mysqli_query($connDB, "SELECT `title`, `title_eng` FROM map_idea WHERE `title` IS NOT NULL AND `title_eng` IS NOT NULL");
$count = mysqli_num_rows($hedQuery);




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
            <p>Header</p>
        </li>
        <li><a href="exit.php">Exit</a></li>
        <li><a href="admin.php">Home</a></li>
    </ul>
    <!-- =============================================================================== -->



    <!-- ============================== Insert Section ================================== -->

    <p class="instalHead">Insert Image for packaging slide</p>
    <table class="table table-bordered table_1">
        <thead>
            <tr class="tableHead_1">
                <th>Search File (Necessarily)</th>
                <th>Submit</th>
            </tr>
        </thead>
        <tbody>
            <tr class="tableBody_1" data-b="z1">
                <td><input type="file" class="file"></td>
                <td><button type="button" class="btn btn-success" id="buttInsert">INSERT</button></td>
            </tr>
        </tbody>
    </table>
    <!-- =================================================================================================== -->

    <p class="instalHead instalHead_2">Packaging division</p>
    <table class="table table_1">
        <thead>
            <tr class="tableHead_1">
                <th>Title (2 page)</th>
                <th>Button</th>
            </tr>
        </thead>
        <tbody class="adminContent">
            <?php
            if (mysqli_num_rows($hedQueryHead) > 0) {
                while ($hedQueryHeadDiv = mysqli_fetch_assoc($hedQueryHead)) {
            ?>
            <tr class="newDiv tableBody_1" data-base="z1" data-Id="<?php echo $headDiv['id']; ?>">

                <td>
                    <input type="text" class="title" value="<?php echo $hedQueryHeadDiv['title']; ?>"
                        placeholder="page 1">
                    <input type="text" class="title_2" value="<?php echo $hedQueryHeadDiv['title_eng']; ?>"
                        placeholder="page 2">
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

    <!-- ===================================== Crete Section ================================================ -->

    <p class="instalHead instalHead_2">All Division</p>
    <table class="table table_1">
        <thead>
            <tr class="tableHead_1">
                <th>Search File (not necessary)</th>
                <th>Button</th>
            </tr>
        </thead>
        <tbody class="adminContent">
            <?php
            if (mysqli_num_rows($hedQuery) > 0) {
                while ($headDiv = mysqli_fetch_assoc($hedQuery)) {
            ?>
            <tr class="newDiv tableBody_1" data-base="z1" data-Id="<?php echo $headDiv['id']; ?>">
                <td>
                    <img src="../assets/images/map/<?php echo $headDiv['image']; ?>">
                    <input type="file" class="file">
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
    <!-- =================================================================================================== -->
    <script src="../assets/js/jquery-3.2.1.min.js"></script>
    <script src="../assets/js/scriptAdmin.js"></script>
</body>

</html>