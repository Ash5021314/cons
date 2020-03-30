<?php
session_start();
require "../connect.php";

if(!isset($_SESSION['userName'])){
    header ('location: index.php');
}

$newsQuery = mysqli_query($connDB,"SELECT * FROM news ORDER BY id DESC");

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
<!-- ============================== Header ======================================= -->
  
    <ul class="adminHead">
        <li><p>News</p></li> 
        <li><a href="exit.php">Exit</a></li>
        <li><a href="admin.php">Home</a></li>
    </ul>
<!-- =============================================================================== -->



<!-- ============================== Insert Section =================================== -->

    <p class="instalHead">Instal New Division</p>
    <table class="table table-bordered table_1">        
        <thead>
            <tr  class="tableHead_1">
                <th>Search File (Necessarily)</th>
                <th>Text (2 pages)</th>
                <th>Time</th>
                <th style="font:700 16px verdana;">1. Pints quare URL <br>2. Instagram URL<br>3. Facebook URL</th>
                <th>Submit</th>
            </tr>
        </thead> 
        <tbody>
            <tr class="tableBody_1" data-b="z4">
                <td><input type="file" class="file" style="width:none;"></td>
                <td>
                    <textarea cols="30" rows="4" class="textarea"  placeholder="page 1"></textarea>
                    <textarea cols="30" rows="4" class="textarea_2"  placeholder="page 2"></textarea>
                </td>
                <td><input type="text" class="clockIns"  placeholder="00:00"></td>
                <td>    
                    <input type="text" class="pint_square"  placeholder="pint_square"><br>
                    <input type="text" class="instagram"  placeholder="instagrampage 1"><br>
                    <input type="text" class="facebook"  placeholder="facebook">
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
            <tr  class="tableHead_1">
                 <th>Search File (not necessary)</th>
                <th>Text (2 pages)</th>
                <th>Time</th>
                <th style="font:700 16px verdana;">1. Pints quare URL <br>2. Instagram URL<br>3. Facebook URL</th>
                <th>Submit</th>
            </tr>
        </thead> 
        <tbody class="adminContent">
            <?php
                if(mysqli_num_rows($newsQuery)>0){  
                    while($newsDiv = mysqli_fetch_assoc($newsQuery)){
            ?>  
                <tr class="newDiv tableBody_1" data-base="z4" data-Id="<?php echo $newsDiv['id']; ?>">
                    <td>
                        <img src="../img/news/<?php echo $newsDiv['image']; ?>" >  
                        <input type="file" class="file" >
                    </td>
                    <td>
                        <textarea cols="30" rows="4" class="textarea"><?php echo $newsDiv['text']; ?></textarea>
                        <textarea cols="30" rows="4" class="textarea_2"><?php echo $newsDiv['text_2']; ?></textarea>     
                    </td>
                    <td><input type="text" class="clockIns" value="<?php echo $newsDiv['clock']; ?>"></td>
                    <td>
                        <input type="text" class="pint_square" value="<?php echo $newsDiv['squareURL']; ?>">
                        <input type="text" class="instagram" value="<?php echo $newsDiv['instagURL']; ?>">
                        <input type="text" class="facebook" value="<?php echo $newsDiv['faceURL']; ?>">
                    </td>
                    
                    <td>
                        <button type="button" class="btn btn-info" id="UpdtaButt">UPDATA</button>
                        <button type="button" class="btn btn-danger" id="DeleteButt" >DELETE</button>
                    </td>
                </tr>
            <?php            
                    }
                } 
            ?>
        </tbody>
    </table>  
<!-- ============================================================================================ -->

</div>

    <script src="../js/jquery-3.2.1.min.js"></script> 
    <script src="../js/scriptAdmin.js"></script>
</body>
</html>