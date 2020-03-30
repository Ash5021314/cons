<?php
session_start();
require "../connect.php";

//$str = 111;
//echo md5($str);

$errMes = "";

if (isset($_SESSION['userName'])) {
    header('location: admin.php');
}

if (isset($_POST['submit'])) {
    $name = trim($_POST['name']);
    $passworld = trim($_POST['passworld']);

    if ($name != "" && $passworld != "") {

        $userQuery =
            mysqli_query($connDB, "SELECT * FROM user WHERE name = '$name' AND password ='$passworld' ");

        if (mysqli_num_rows($userQuery) > 0) {
            $username = mysqli_fetch_assoc($userQuery);
            $_SESSION['userName'] = $username['name'];
            header('location: admin.php');
        } else {
            $errMes = "<p>Error Name or Passworld</p>";
        }
    }
}

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

    <section class="adminLogin">
        <div class="adminLoginCont">

            <div class="adminLoginErrMes">
                <?php echo $errMes; ?>
            </div>

            <form action="" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Name" name="name">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="passworld">
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
        </div>
    </section>
</body>

</html>