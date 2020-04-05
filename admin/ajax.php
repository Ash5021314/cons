<?php
session_start();
require "../connect.php";

if (!isset($_SESSION['userName'])) {
    header('location: index.php');
}

$allFileFormat = ['jpg', 'jpeg', 'png', 'gif', 'webp'];



/****************************************************************************** 

            ADMIN Header, About me, Gallery, News
        (header.php, about_me.php, gallery.php, news.php) 

 *******************************************************************************/

//--------------- Function Insert ---------------------------------------
if (isset($_POST['database_ins'])) {

    // if (!isset($_FILES['file_ins'])) {
    //     echo 2;
    //     return false;
    // }

    $takeFileFormat = explode('.', $_FILES['file_ins']['name']);
    $insFileFormat = end($takeFileFormat);

    // if (in_array(strtolower($insFileFormat), $allFileFormat)) {
    //if($_FILES['file_ins']['size'] < 2000000){

    $NewFileName = (date('Ymdhis') * 2) . "." . $insFileFormat;
    $database_num = $_POST['database_ins'];

    if ($database_num == "z1_1") {
        $titleIns = $_POST['textar_ins'];
        $titleIns_2 = $_POST['textar_ins_2'];
    }
    if ($database_num == "z4") {
        $textIns = $_POST['textar_ins'];
        $textIns_2 = $_POST['textar_ins_2'];
    }


    if ($database_num == "z1") {
        $base_NameAdres = ["product_slide", "../assets/images/product/"];
        $sql_date = "slide_image";
        $sql_insBaseDate = "'$NewFileName'";
    } else if ($database_num == "z1_1") {
        $base_NameAdres = ["product_desc"];
        $sql_date = "text, text_eng";
        $sql_insBaseDate = "'$titleIns'" . "," . "'$titleIns_2'";
    } else if ($database_num == "z4") {
        $base_NameAdres = ["visit_desc", "../assets/images/visit/"];
        $sql_date = "description, description_eng, image";
        $sql_insBaseDate = "'$textIns'" . "," . "'$textIns_2'" . "," . "'$NewFileName'";
    };

    $insertFile = move_uploaded_file($_FILES['file_ins']['tmp_name'], $base_NameAdres[1] . $NewFileName);

    $imgSet = mysqli_query($connDB, "INSERT INTO $base_NameAdres[0] ($sql_date) VALUES ($sql_insBaseDate) ");
    $idSelect = mysqli_query($connDB, "SELECT * FROM $base_NameAdres[0]");

    $arrJson = mysqli_fetch_assoc($idSelect);

    if (is_array($arrJson)) {
        echo json_encode($arrJson);
    } else {
        echo 2;
    }
}
//  else {
//     echo 3;
// }
// }
// }

//-------------------------------------------------------------------------------

//------------------------ Function Delete --------------------------------------
if (isset($_POST['DeleteId'])) {
    $deleteId = $_POST['DeleteId'];
    $delImgUrl = $_POST['ingURL'];

    if ($_POST['BaseN'] == "z1") {
        $delBaseName = "product_slide";
    } else if ($_POST['BaseN'] == "z1_1") {
        $delBaseName = "product_desc";
    } else if ($_POST['BaseN'] == "z4_1") {
        $delBaseName = "visit_desc";
    } else if ($_POST['BaseN'] == "z4") {
        $delBaseName = "news";
    }



    $queryDel = mysqli_query($connDB, "DELETE FROM $delBaseName WHERE id='$deleteId' ");
    if ($queryDel) {
        $DeleteFile = unlink($delImgUrl);

        echo 1;
    } else {
        echo 2;
    }
}
//----------------------------------------------------------------------------------


//----------------- Function Updata -------------------------------------------------
if (isset($_POST['base_Up'])) {
    $NewOrOldFile = 0;

    if (isset($_FILES['file_Up'])) {
        $takeFileFormat = explode('.', $_FILES['file_Up']['name']);
        $insFileFormat = end($takeFileFormat);

        if (in_array(strtolower($insFileFormat), $allFileFormat)) {
            //if($_FILES['file_Up']['size'] < 2000000){
            // print_r($_POST['oldImgUrl']);

            $deleteOldFile = unlink($_POST['oldImgUrl']);

            if ($deleteOldFile) {
                $NewFileName = (date('Ymdhis') * 2) . "." . $insFileFormat;
                $NewOrOldFile = 1;
            } else {
            }
            // }
        }
    } else {
        $takeFileFormat = explode('/', $_POST['oldImgUrl']);
        $NewFileName = end($takeFileFormat);
        $NewOrOldFile = 2;
    }

    // if ($NewOrOldFile == 1 || $NewOrOldFile == 2) {

    $id_Up = $_POST['id_Up'];
    $database_num = $_POST['base_Up'];


    if ($database_num == "z3" || $database_num == "z2") {
        $titleIns = $_POST['title_Up'];
        $titleIns_2 = $_POST['title_Up_2'];
    }
    if ($database_num == "z1_1" || $database_num == "z2" || $database_num == "z3" || $database_num == "z4_1") {
        $textIns = $_POST['text_Up'];
        $textIns_2 = $_POST['text_Up_2'];
    }




    if ($database_num == "z1") {
        $base_NameAdress = ["product_slide", "../assets/images/product/"];
        $sql_date = " slide_image='$NewFileName'";
    } else if ($database_num == "z1_1") {
        $base_NameAdress = ["product_desc"];
        $sql_date = "text='$textIns', text_eng='$textIns_2'";
    } else if ($database_num == "z2") {
        $base_NameAdress = ["travel", "../assets/images/travel/"];
        $sql_date = "title='$titleIns', title_eng='$titleIns_2',text = '$textIns', text_eng = ' $textIns_2', first_image='$NewFileName'";
    } else if ($database_num == "z3") {
        $base_NameAdress = ["visit_desc"];
        $sql_date = "title='$textIns', title_eng='$textIns_2'";
    } else if ($database_num == "z4_1") {
        $base_NameAdress = ["visit_desc", "../assets/images/visit/"];
        $sql_date = "description='$textIns', description_eng='$textIns_2', image='$NewFileName'";
    };


    // if ($NewOrOldFile == 1) {
    $uploadFile = move_uploaded_file($_FILES['file_Up']['tmp_name'], $base_NameAdress[1] . $NewFileName);
    // }

    $Updata = mysqli_query($connDB, "UPDATE $base_NameAdress[0] SET $sql_date WHERE id = '$id_Up'");
    if ($Updata) {
        echo  $NewFileName;
    } else {
    }
}
// }
//------------------------------------------------------------------------------------

/***************************************************************************************** *
 ********************************************************************************************/










//ini_set('display_errors','Off');