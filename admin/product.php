<?php
session_start();
require "../connect.php";

if (!isset($_SESSION['userName'])) {
    header('location: index.php');
}

$newsQuery = mysqli_query($connDB, "SELECT * FROM product_slide");
$newsTextQuery = mysqli_query($connDB, "SELECT * FROM product_desc");

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
            <p>Products</p>
        </li>
        <li><a href="exit.php">Exit</a></li>
        <li><a href="admin.php">Home</a></li>
    </ul>
    <!-- =============================================================================== -->



    <!-- ============================== Insert Section =================================== -->

    <p class="instalHead">Add Product data</p>
    <table class="table table-bordered table_1">
        <thead>
            <tr class="tableHead_1">
                <th>Search File (Necessarily)</th>
                <th>Submit</th>
            </tr>
        </thead>
        <tbody>
            <tr class="tableBody_1" data-b="z4">
                <td>

                    <input type="file" class="file" style="width:none;">
                </td>

                <td><button type="button" class="btn btn-success" id="buttInsert">INSERT</button></td>
            </tr>
            <tr class="tableBody_1" data-b="z4">
                <td>
                    <textarea name="" id="" cols="30" rows="10" placeholder="Product in Armenian"></textarea>
                    <textarea name="" id="" cols="30" rows="10" placeholder="Product in English"></textarea>
                </td>
                <td><button type="button" class="btn btn-success" id="buttInsert">INSERT</button></td>
            </tr>
        </tbody>
    </table>
    <!-- ============================================================================================ -->




    <!-- ============================== Create Section ================================================ -->

    <p class="instalHead instalHead_2"> All Products</p>
    <table class="table table_1">
        <thead>
            <tr class="tableHead_1">
                <th> Products</th>
                <th>Submit</th>
            </tr>
        </thead>
        <tbody class="adminContent">
            <?php
            if (mysqli_num_rows($newsTextQuery) > 0) {
                while ($newsDiv = mysqli_fetch_assoc($newsTextQuery)) {
            ?>
            <tr class="newDiv tableBody_1" data-base="z4" data-Id="<?php echo $newsDiv['id']; ?>">
                <td>
                    <textarea name="" id="" cols="30" rows="10"><?php echo $newsDiv['text']; ?></textarea>
                    <textarea name="" id="" cols="30" rows="10"><?php echo $newsDiv['text_eng']; ?></textarea>
                </td>
                <td>
                    <button type="button" class="btn btn-info" id="UpdtaButt">UPDATA</button>
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

    <!-- ============================== Create Section ================================================ -->

    <p class="instalHead instalHead_2">All Division</p>
    <table class="table table_1">
        <thead>
            <tr class="tableHead_1">
                <th>Search File (not necessary)</th>
                <th>Submit</th>
            </tr>
        </thead>
        <tbody class="adminContent">
            <?php
            if (mysqli_num_rows($newsQuery) > 0) {
                while ($newsDiv = mysqli_fetch_assoc($newsQuery)) {
            ?>
            <tr class="newDiv tableBody_1" data-base="z4" data-Id="<?php echo $newsDiv['id']; ?>">
                <td>
                    <img src="../assets/images/product/<?php echo $newsDiv['slide_image']; ?>">
                    <input type="file" class="file">
                </td>
                <td>
                    <button type="button" class="btn btn-info" id="UpdtaButt">UPDATA</button>
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

    <script src="../assets/js/jquery-3.2.1.min.js"></script>
    <script src="../assets/js/scriptAdmin.js"></script>
</body>

</html>