<?php
session_start();
require "../connect.php";

if (!isset($_SESSION['userName'])) {
    header('location: index.php');
}

$hedQuery = mysqli_query($connDB, "SELECT * FROM partners ORDER BY id DESC");




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
            <tr class="tableBody_1" data-b="z12">
                <td><input type="file" class="file"></td>
                <td><button type="button" class="btn btn-success" id="buttInsert">INSERT</button></td>
            </tr>
        </tbody>
    </table>
    <!-- =================================================================================================== -->

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
            <tr class="newDiv tableBody_1" data-base="z12" data-Id="<?php echo $headDiv['id']; ?>">
                <td>
                    <div>
                        <img src="../assets/images/partners/<?php echo $headDiv['slide_image']; ?>">
                        <input type="file" class="file">
                    </div>
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
    <!-- =================================================================================================== -->
    <script src="../assets/js/jquery-3.2.1.min.js"></script>
    <script src="../assets/js/scriptAdmin.js"></script>
</body>

</html>