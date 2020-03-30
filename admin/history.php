<?php
session_start();
require "../connect.php";

if (!isset($_SESSION['userName'])) {
    header('location: index.php');
}

$about_meQuery = mysqli_query($connDB, "SELECT * FROM history ORDER BY id DESC");

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
            <p>History</p>
        </li>
        <li><a href="exit.php">Exit</a></li>
        <li><a href="admin.php">Home</a></li>
    </ul>

    <!-- =============================================================================== -->




    <!-- ============================== Updata Section ==================================== -->

    <p class="instalHead instalHead_2">Updata Division</p>
    <table class="table table_1">
        <thead>
            <tr class="tableHead_1">
                <th>Search File (not necessary)</th>
                <th>Title (2 pages)</th>
                <th>Text (Armenian)</th>
                <th>Text (English)</th>
                <th>Button</th>
            </tr>
        </thead>
        <tbody class="adminContent">
            <?php
            if (mysqli_num_rows($about_meQuery) > 0) {
                while ($aboutDiv = mysqli_fetch_assoc($about_meQuery)) {
            ?>
            <tr class="newDiv tableBody_1" data-base="z2" data-Id="<?php echo $aboutDiv['id']; ?>">
                <td>
                    <img src="../assets/images/history/<?php echo $aboutDiv['historyImage']; ?>">
                    <input type="file" class="file">
                </td>
                <td>
                    <input type="text" class="title" value="<?php echo $aboutDiv['title']; ?>" placeholder="page 1">
                    <input type="text" class="title_2" value="<?php echo $aboutDiv['title_eng']; ?>"
                        placeholder="page 2">
                </td>
                <td><textarea class="textarea" cols="30" rows="4"
                        placeholder="page 1"><?php echo $aboutDiv['text']; ?></textarea></td>
                <td><textarea class="textarea_2" cols="30" rows="4"
                        placeholder="page 2"><?php echo $aboutDiv['history_eng']; ?></textarea></td>
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
    <!-- ============================================================================================== -->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/scriptAdmin.js"></script>
</body>

</html>