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

    if (in_array(strtolower($insFileFormat), $allFileFormat)) {
        //if($_FILES['file_ins']['size'] < 2000000){

        $NewFileName = (date('Ymdhis') * 2) . "." . $insFileFormat;
    }
    $database_num = $_POST['database_ins'];

    if ($database_num == "z1_1") {
        $titleIns = htmlentities($_POST['textar_ins'], ENT_QUOTES, "UTF-8");
        $titleIns_2 = htmlentities($_POST['textar_ins_2'], ENT_QUOTES, "UTF-8");
    }
    if ($database_num == "z4") {
        $textIns = htmlentities($_POST['textar_ins'], ENT_QUOTES, "UTF-8");
        $textIns_2 = htmlentities($_POST['textar_ins_2'], ENT_QUOTES, "UTF-8");
    }
    if ($database_num == "z7") {
        $titleIns  = htmlentities($_POST['title_Up'], ENT_QUOTES, "UTF-8");
    }
    if ($database_num == "z8") {
        $titleIns  = htmlentities($_POST['title_ins'], ENT_QUOTES, "UTF-8");
        $titleIns_2  = htmlentities($_POST['title_ins_2'], ENT_QUOTES, "UTF-8");
        $textIns = htmlentities($_POST['textar_ins'], ENT_QUOTES, "UTF-8");
        $textIns_2 = htmlentities($_POST['textar_ins_2'], ENT_QUOTES, "UTF-8");
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
    } else if ($database_num == "z7") {
        $base_NameAdres = ["follow", "../assets/images/socialIcon/"];
        $sql_date = "Icon_link, icon";
        $sql_insBaseDate = "'$titleIns'" . "," . "'$NewFileName'";
    } else if ($database_num == "z8") {
        $base_NameAdres = ["terminal", "../assets/images/terminal/"];
        $sql_date = "title,title_eng,description,description_eng , image";
        $sql_insBaseDate = "'$titleIns'" . "," . "'$titleIns_2'" . "," . "'$textIns'" . "," . "'$textIns_2'" . "," . "'$NewFileName'";
    } else if ($database_num == "z12") {
        $base_NameAdres = ["partners", "../assets/images/partners/"];
        $sql_date = "slide_image";
        $sql_insBaseDate = "'$NewFileName'";
    } else if ($database_num == "z14") {
        $base_NameAdres = ["packiging_slide", "../assets/images/package/"];
        $sql_date = "image";
        $sql_insBaseDate = "'$NewFileName'";
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
    } else if ($_POST['BaseN'] == "z7") {
        $delBaseName = "follow";
    } else if ($_POST['BaseN'] == "z8") {
        $delBaseName = "terminal";
    } else if ($_POST['BaseN'] == "z12") {
        $delBaseName = "partners";
    } else if ($_POST['BaseN'] == "z14") {
        $delBaseName = "packiging_slide";
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
    $NewOrOldFile1 = 0;

    if (isset($_FILES['file_Up'])) {
        $takeFileFormat = explode('.', $_FILES['file_Up']['name']);
        $insFileFormat = end($takeFileFormat);

        if (in_array(strtolower($insFileFormat), $allFileFormat)) {
            //if($_FILES['file_Up']['size'] < 2000000){
            // print_r($_POST['oldImgUrl']);

            $deleteOldFile = unlink($_POST['oldImgUrl']);

            if ($deleteOldFile) {
                $NewFileName = (date('Ymdhis') * 2) . "." . $insFileFormat;
                echo $NewFileName;
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


    if (isset($_FILES['file_Up1'])) {
        $takeFileFormat1 = explode('.', $_FILES['file_Up1']['name']);
        $insFileFormat1 = end($takeFileFormat1);

        if (in_array(strtolower($insFileFormat1), $allFileFormat)) {
            $deleteOldFile1 = unlink($_POST['oldImgUrl1']);

            if ($deleteOldFile1) {
                $NewFileName1 = (date('Ymdhis') * 2) . "." . $insFileFormat1;
                $NewOrOldFile1 = 1;
            } else {
            }
        }
    } else {
        $takeFileFormat1 = explode('/', $_POST['oldImgUrl1']);
        $NewFileName1 = end($takeFileFormat1);
        $NewOrOldFile = 2;
    }

    // if ($NewOrOldFile == 1 || $NewOrOldFile == 2) {

    $id_Up = $_POST['id_Up'];
    $database_num = $_POST['base_Up'];


    if ($database_num == "z3" || $database_num == "z6") {
        $titleIns = htmlentities($_POST['title_Up'], ENT_QUOTES, "UTF-8");
        $titleIns_2 = htmlentities($_POST['title_Up_2'], ENT_QUOTES, "UTF-8");
    }
    if ($database_num == "z1_1" || $database_num == "z3" || $database_num == "z4_1" || $database_num == "z6") {
        $textIns = htmlentities($_POST['text_Up'], ENT_QUOTES, "UTF-8");
        $textIns_2 = htmlentities($_POST['text_Up_2'], ENT_QUOTES, "UTF-8");
    }
    if ($database_num == "z7") {
        $titleIns = htmlentities($_POST['title_Up'], ENT_QUOTES, "UTF-8");
    }
    if ($database_num == "z7_1") {
        $titleIns = htmlentities($_POST['title_Up'], ENT_QUOTES, "UTF-8");
        $titleIns_2 = htmlentities($_POST['title_Up_2'], ENT_QUOTES, "UTF-8");
        $titleIns_3 = htmlentities($_POST['title_Up_3'], ENT_QUOTES, "UTF-8");
    }
    if ($database_num == "z8" || $database_num == "z11") {
        $titleIns = htmlentities($_POST['title_Up'], ENT_QUOTES, "UTF-8");
        $titleIns_2 = htmlentities($_POST['title_Up_2'], ENT_QUOTES, "UTF-8");
        $textIns = htmlentities($_POST['text_Up'], ENT_QUOTES, "UTF-8");
        $textIns_2 = htmlentities($_POST['text_Up_2'], ENT_QUOTES, "UTF-8");
    }
    if ($database_num == "z15") {
        $titleIns = htmlentities($_POST['title_Up'], ENT_QUOTES, "UTF-8");
        $titleIns_2 = htmlentities($_POST['title_Up_2'], ENT_QUOTES, "UTF-8");
    }


    if ($database_num == "z1") {
        $base_NameAdress = ["product_slide", "../assets/images/product/"];
        $sql_date = " slide_image='$NewFileName'";
    } else if ($database_num == "z1_1") {
        $base_NameAdress = ["product_desc"];
        $sql_date = "text='$textIns', text_eng='$textIns_2'";
    } else if ($database_num == "z3") {
        $base_NameAdress = ["visit_desc"];
        $sql_date = "title='$textIns', title_eng='$textIns_2'";
    } else if ($database_num == "z4_1") {
        $base_NameAdress = ["visit_desc", "../assets/images/visit/"];
        $sql_date = "description='$textIns', description_eng='$textIns_2', image='$NewFileName'";
    } else if ($database_num == "z6") {
        $base_NameAdress = ["idea"];
        $sql_date = "title = '$titleIns',title_eng = '$titleIns_2', text='$textIns', text_eng='$textIns_2'";
    } else if ($database_num == "z7") {
        $base_NameAdress = ["follow", "../assets/images/socialIcon/"];
        $sql_date = "Icon_link = '$titleIns', icon='$NewFileName'";
    } else if ($database_num == "z7_1") {
        $base_NameAdress = ["contact"];
        $sql_date = "email = '$titleIns', phone_1='$titleIns_2',phone_2='$titleIns_3'";
    } else if ($database_num == "z8") {
        $base_NameAdress = ["terminal", "../assets/images/terminal/"];
        $sql_date = "title = '$titleIns',title_eng = '$titleIns_2', description='$textIns', description_eng='$textIns_2', image='$NewFileName'";
    } else if ($database_num == "z11") {
        $base_NameAdress = ["history", "../assets/images/history/"];
        $sql_date = "title = '$titleIns',title_eng = '$titleIns_2', text='$textIns', history_eng='$textIns_2', historyImage='$NewFileName'";
    } else if ($database_num == "z12") {
        $base_NameAdress = ["partners", "../assets/images/partners/"];
        $sql_date = "slide_image='$NewFileName'";
    } else if ($database_num == "z14") {
        $base_NameAdress = ["packiging_slide", "../assets/images/package/"];
        $sql_date = "image='$NewFileName'";
    };

    if ($database_num == "z15") {
        $titleIns = htmlentities($_POST['title_Up'], ENT_QUOTES, "UTF-8");
        $titleIns_2 =  htmlentities($_POST['title_Up_2'], ENT_QUOTES, "UTF-8");
        $Updata = mysqli_query($connDB, "UPDATE `souvenir` SET title='$titleIns', title_eng='$titleIns_2' WHERE id = '1'");
        if ($Updata) {
            echo  $Updata;
        } else {
        }
    }


    if ($database_num == "z2") {
        $titleIns1 = htmlentities($_POST['title_Up'], ENT_QUOTES, "UTF-8");
        $titleIns_21 = htmlentities($_POST['title_Up_2'], ENT_QUOTES, "UTF-8");
        $textIns1 = htmlentities($_POST['text_Up'], ENT_QUOTES, "UTF-8");
        $textIns_21 = htmlentities($_POST['text_Up_2'], ENT_QUOTES, "UTF-8");
        $base_NameAdresss = ["travel", "../assets/images/travel/"];
        $uploadFile = move_uploaded_file($_FILES['file_Up']['tmp_name'], $base_NameAdresss[1] . $NewFileName);
        $uploadFile1 = move_uploaded_file($_FILES['file_Up1']['tmp_name'], $base_NameAdresss[1] . $NewFileName1);
        $Updata1 = mysqli_query($connDB, "UPDATE `travel` SET `title` = '$titleIns1', `title_eng` = '$titleIns_21', `text` = '$textIns1', `text_eng` = '$textIns_21', `first_image` = '$NewFileName', `seccond_image` = '$NewFileName1' WHERE id = '1'");

        if ($Updata1) {
            echo  $NewFileName;
        } else {
            die("ok");
        }
        die();
    }
    // if ($NewOrOldFile == 1) {
    $uploadFile = move_uploaded_file($_FILES['file_Up']['tmp_name'], $base_NameAdress[1] . $NewFileName);
    $uploadFile1 = move_uploaded_file($_FILES['file_Up1']['tmp_name'], $base_NameAdress[1] . $NewFileName1);
    // }
    echo 2;
    echo $base_NameAdress[0];
    $Updata = mysqli_query($connDB, "UPDATE $base_NameAdress[0] SET $sql_date WHERE id = '$id_Up'");
    echo 3;
    if ($Updata) {
        echo 4;
        echo  $base_NameAdress[1];
    } else {
    }
}
// }
//------------------------------------------------------------------------------------

/***************************************************************************************** *
 ********************************************************************************************/










//ini_set('display_errors','Off');