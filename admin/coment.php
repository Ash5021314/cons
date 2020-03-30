<?php
session_start();
require "../connect.php";

if(!isset($_SESSION['userName'])){
    header ('location: index.php');
}

$messagesQuery = mysqli_query($connDB,"SELECT * FROM messages ORDER BY id DESC");

//ini_set('display_errors','Off');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="../style/bootstrap.min.css">
    <link rel="stylesheet" href="../style/styleAdmin.css">
    <title>Login</title>
</head>
<body >
 <div class="container">
    <ul class="adminHead">
        <li><p>Coment Public</p></li> 
        <li><a href="exit.php">Exit</a></li>
        <li><a href="admin.php">Home</a></li>
    </ul>



    <section class="adminContent">
        <?php
            if(mysqli_num_rows($messagesQuery)>0){  
               while($messDiv = mysqli_fetch_assoc($messagesQuery)){
        ?>

           <div>
                <p>Time: <?php echo $messDiv['time']; ?></p>
                <p>Name: <?php echo $messDiv['name']; ?></p>
                <p>Phone: <?php echo $messDiv['phone']; ?></p>
                <p>Email: <?php echo $messDiv['email']; ?></p>
                <p>Text: <?php echo $messDiv['text']; ?></p>
                <div>
                  <?php if($messDiv['status'] == 0){  
                    echo '<button type="button" class="btn btn-info buttUpdata" data-id="'.$messDiv['id'].'">Public</button>';
                  } ?>
                    <button type="button" class="btn btn-danger buttDel" data-id="<?php echo $messDiv['id']; ?>">Delete</button>
               </div>
            </div>
                
        <?php            
                }
            } 
        ?>

    </section>


</div>
    <script src="../js/jquery-3.2.1.min.js"></script> 
    <script src="../js/scriptAdmin.js"></script>
</body>
</html>