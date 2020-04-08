<?php
session_start();
require "../connect.php";

if (!isset($_SESSION['userName'])) {
    header('location: index.php');
}

$galleryQuery = mysqli_query($connDB, "SELECT * FROM terminal ORDER BY id DESC");

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
            <p>Terminals</p>
        </li>
        <li><a href="exit.php">Exit</a></li>
        <li><a href="admin.php">Home</a></li>
    </ul>
    <!-- ============================================================================== -->


    <!-- ============================== Insert Section ================================= -->

    <p class="instalHead">Instal New Division</p>
    <table class="table table-bordered table_1">
        <thead>
            <tr class="tableHead_1">
                <th>Search File (not necessary)</th>
                <th>Name (Armenian)</th>
                <th>Name (English)</th>
                <th>Text (Armenian)</th>
                <th>Text (English)</th>
                <th>Submit</th>
            </tr>
        </thead>
        <tbody>
            <tr class="tableBody_1" data-b="z8">
                <td><input type="file" class="file"></td>
                <td> <input type="text" class="title" placeholder="page Arm"></td>
                <td><input type="text" class="title_2" placeholder="page Eng"> </td>
                <td>
                    <textarea class="textarea" cols="25" rows="6" placeholder="text Arm"></textarea>
                </td>
                <td>
                    <textarea class="textarea_2" cols="25" rows="6" placeholder="text Eng"></textarea>
                </td>
                <td><button type="button" class="btn btn-success" id="buttInsert">INSERT</button></td>
            </tr>
        </tbody>
    </table>
    <!-- ====================================================================================== -->



    <!-- ============================== Create Section ======================================= -->

    <p class="instalHead instalHead_2">All Division</p>
    <table class="table table_1">
        <thead>
            <tr class="tableHead_1">
                <th>Search File (not necessary)</th>
                <th>Name (Armenian)</th>
                <th>Name (English)</th>
                <th>Text (Armenian)</th>
                <th>Text (English)</th>
                <th>Button</th>
            </tr>
        </thead>
        <tbody class="adminContent">
            <?php
            if (mysqli_num_rows($galleryQuery) > 0) {
                while ($galleryDiv = mysqli_fetch_assoc($galleryQuery)) {
            ?>
                    <tr class="newDiv tableBody_1" data-base="z8" data-Id="<?php echo $galleryDiv['id']; ?>">
                        <td>
                            <img src="../assets/images/terminal/<?php echo $galleryDiv['image']; ?>">
                            <input type="file" class="file">
                        </td>
                        <td><input type="text" class="title" value="<?php echo $galleryDiv['title']; ?>"> </td>
                        <td><input type="text" class="title_2" value="<?php echo $galleryDiv['title_eng']; ?>"> </td>
                        <td>
                            <textarea class="textarea" cols="25" rows="6"><?php echo $galleryDiv['description']; ?></textarea>
                        </td>
                        <td>
                            <textarea class="textarea_2" cols="25" rows="6"><?php echo $galleryDiv['description_eng']; ?></textarea>
                        </td>

                        <td>
                            <button type="button" class="btn btn-info updtaButt">UPDATA</button>
                            <button type="button" class="btn btn-danger DeleteButt">DELETE</button>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
    <!-- ======================================================================================= -->
    <script src="../assets/js/jquery-3.2.1.min.js"></script>
    <script src="../assets/js/scriptAdmin.js"></script>
</body>

</html>