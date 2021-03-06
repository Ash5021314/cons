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

    $takeFileFormat = explode('.', $_FILES['file_ins']['name']);
    $takeFileFormat1 = explode('.', $_FILES['file_ins1']['name']);
    $takeFileFormat2 = explode('.', $_FILES['file_ins2']['name']);
    $takeFileFormat3 = explode('.', $_FILES['file_ins3']['name']);
    $takeFileFormat4 = explode('.', $_FILES['file_ins4']['name']);
    $takeFileFormat5 = explode('.', $_FILES['file_ins5']['name']);
    $takeFileFormat6 = explode('.', $_FILES['file_ins6']['name']);
    $takeFileFormat7 = explode('.', $_FILES['file_ins7']['name']);
    $insFileFormat = end($takeFileFormat);
    $insFileFormat1 = end($takeFileFormat1);
    $insFileFormat2 = end($takeFileFormat2);
    $insFileFormat3 = end($takeFileFormat3);
    $insFileFormat4 = end($takeFileFormat4);
    $insFileFormat5 = end($takeFileFormat5);
    $insFileFormat6 = end($takeFileFormat6);
    $insFileFormat7 = end($takeFileFormat7);



    if (isset($_FILES['file_ins'])) {
        if (in_array(strtolower($insFileFormat), $allFileFormat)) {
            $NewFileName = (date('Ymdhis') * 2) . "." . $insFileFormat;
        }
    }
    if (isset($_FILES['file_ins1'])) {
        if (in_array(strtolower($insFileFormat1), $allFileFormat)) {
            $NewFileName1 = (date('Ymdhis') * 3) . "." . $insFileFormat1;
        }
    }
    if (isset($_FILES['file_ins2'])) {
        if (in_array(strtolower($insFileFormat2), $allFileFormat)) {
            $NewFileName2 = (date('Ymdhis') * 4) . "." . $insFileFormat2;
        }
    }
    if (isset($_FILES['file_ins3'])) {
        if (in_array(strtolower($insFileFormat3), $allFileFormat)) {
            $NewFileName3 = (date('Ymdhis') * 5) . "." . $insFileFormat3;
        }
    }
    if (isset($_FILES['file_ins4'])) {
        if (in_array(strtolower($insFileFormat4), $allFileFormat)) {
            $NewFileName4 = (date('Ymdhis') * 6) . "." . $insFileFormat4;
        }
    }
    if (isset($_FILES['file_ins5'])) {
        if (in_array(strtolower($insFileFormat5), $allFileFormat)) {
            $NewFileName5 = (date('Ymdhis') * 7) . "." . $insFileFormat5;
        }
    }
    if (isset($_FILES['file_ins6'])) {
        if (in_array(strtolower($insFileFormat6), $allFileFormat)) {
            $NewFileName6 = (date('Ymdhis') * 8) . "." . $insFileFormat6;
        }
    }
    if (isset($_FILES['file_ins7'])) {
        if (in_array(strtolower($insFileFormat7), $allFileFormat)) {
            $NewFileName7 = (date('Ymdhis') * 9) . "." . $insFileFormat7;
        }
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
    if ($database_num == "z8" || $database_num == "z13") {
        $titleIns  = htmlentities($_POST['title_ins'], ENT_QUOTES, "UTF-8");
        $titleIns_2  = htmlentities($_POST['title_ins_2'], ENT_QUOTES, "UTF-8");
        $textIns = htmlentities($_POST['textar_ins'], ENT_QUOTES, "UTF-8");
        $textIns_2 = htmlentities($_POST['textar_ins_2'], ENT_QUOTES, "UTF-8");
    }
    if ($database_num == "z9_3") {
        $titleIns  = htmlentities($_POST['title_ins'], ENT_QUOTES, "UTF-8");
        $titleIns_2  = htmlentities($_POST['title_ins_2'], ENT_QUOTES, "UTF-8");
        $titleIns_3  = htmlentities($_POST['title_ins_3'], ENT_QUOTES, "UTF-8");
        $titleIns_4  = htmlentities($_POST['title_ins_4'], ENT_QUOTES, "UTF-8");
        $titleIns_5  = htmlentities($_POST['title_ins_5'], ENT_QUOTES, "UTF-8");
        $titleIns_6  = htmlentities($_POST['title_ins_6'], ENT_QUOTES, "UTF-8");
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
    } else if ($database_num == "z9_3") {
        $base_NameAdres = ["coll_desc", "../assets/images/collection/"];
        $sql_date = "title, title_eng, slide_text, slide_text_eng,`loc-pos-top`, `loc-pos-left`, text, text_eng, first_image, seccond_image,  third_image, first_image_prod, first_slide, seccond_slide, map, `loc-img`";
        $sql_insBaseDate = "'$titleIns','$titleIns_2','$titleIns_3','$titleIns_4','$titleIns_5','$titleIns_6','$textIns','$textIns_2','$NewFileName','$NewFileName1','$NewFileName2','$NewFileName3','$NewFileName4','$NewFileName5','$NewFileName6','$NewFileName7'";
    } else if ($database_num == "z12") {
        $base_NameAdres = ["partners", "../assets/images/partners/"];
        $sql_date = "slide_image";
        $sql_insBaseDate = "'$NewFileName'";
    } else if ($database_num == "z13") {
        $base_NameAdres = ["packaging", "../assets/images/shop/"];
        $sql_date = "title,title_eng,description,description_eng , image";
        $sql_insBaseDate = "'$titleIns'" . "," . "'$titleIns_2'" . "," . "'$textIns'" . "," . "'$textIns_2'" . "," . "'$NewFileName'";
    } else if ($database_num == "z14") {
        $base_NameAdres = ["packiging_slide", "../assets/images/package/"];
        $sql_date = "image";
        $sql_insBaseDate = "'$NewFileName'";
    };

    $insertFile = move_uploaded_file($_FILES['file_ins']['tmp_name'], $base_NameAdres[1] . $NewFileName);
    $insertFile1 = move_uploaded_file($_FILES['file_ins1']['tmp_name'], $base_NameAdres[1] . $NewFileName1);
    $insertFile2 = move_uploaded_file($_FILES['file_ins2']['tmp_name'], $base_NameAdres[1] . $NewFileName2);
    $insertFile3 = move_uploaded_file($_FILES['file_ins3']['tmp_name'], $base_NameAdres[1] . $NewFileName3);
    $insertFile4 = move_uploaded_file($_FILES['file_ins4']['tmp_name'], $base_NameAdres[1] . $NewFileName4);
    $insertFile5 = move_uploaded_file($_FILES['file_ins5']['tmp_name'], $base_NameAdres[1] . $NewFileName5);
    $insertFile6 = move_uploaded_file($_FILES['file_ins6']['tmp_name'], $base_NameAdres[1] . $NewFileName6);
    $insertFile7 = move_uploaded_file($_FILES['file_ins7']['tmp_name'], $base_NameAdres[1] . $NewFileName7);

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
    } else if ($_POST['BaseN'] == "z5_2") {
        $delBaseName = "map_idea";
    } else if ($_POST['BaseN'] == "z7") {
        $delBaseName = "follow";
    } else if ($_POST['BaseN'] == "z8") {
        $delBaseName = "terminal";
    } else if ($_POST['BaseN'] == "z9_3") {
        $delBaseName = "coll_desc";
    } else if ($_POST['BaseN'] == "z12") {
        $delBaseName = "partners";
    } else if ($_POST['BaseN'] == "z13_2") {
        $delBaseName = "packaging";
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

            $deleteOldFile = unlink($_POST['oldImgUrl']);

            if ($deleteOldFile) {
                $NewFileName = (date('Ymdhis') * 2) . "." . $insFileFormat;
                echo $NewFileName;
                $NewOrOldFile = 1;
            } else {
            }
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
                $NewFileName1 = (date('Ymdhis') * 3) . "." . $insFileFormat1;
                $NewOrOldFile1 = 1;
            } else {
            }
        }
    } else {
        $takeFileFormat1 = explode('/', $_POST['oldImgUrl1']);
        $NewFileName1 = end($takeFileFormat1);
        $NewOrOldFile = 2;
    }

    if (isset($_FILES['file_Up2'])) {
        $takeFileFormat2 = explode('.', $_FILES['file_Up2']['name']);
        $insFileFormat2 = end($takeFileFormat2);

        if (in_array(strtolower($insFileFormat2), $allFileFormat)) {
            $deleteOldFile2 = unlink($_POST['oldImgUrl2']);

            if ($deleteOldFile2) {
                $NewFileName2 = (date('Ymdhis') * 4) . "." . $insFileFormat2;
                $NewOrOldFile = 1;
            } else {
            }
        }
    } else {
        $takeFileFormat2 = explode('/', $_POST['oldImgUrl2']);
        $NewFileName2 = end($takeFileFormat2);
        $NewOrOldFile = 2;
    }


    if (isset($_FILES['file_Up3'])) {
        $takeFileFormat3 = explode('.', $_FILES['file_Up3']['name']);
        $insFileFormat3 = end($takeFileFormat3);

        if (in_array(strtolower($insFileFormat3), $allFileFormat)) {
            $deleteOldFile3 = unlink($_POST['oldImgUrl3']);

            if ($deleteOldFile3) {
                $NewFileName3 = (date('Ymdhis') * 6) . "." . $insFileFormat3;
                $NewOrOldFile = 1;
            } else {
            }
        }
    } else {
        $takeFileFormat3 = explode('/', $_POST['oldImgUrl3']);
        $NewFileName3 = end($takeFileFormat3);
        $NewOrOldFile = 2;
    }

    if (isset($_FILES['file_Up4'])) {
        $takeFileFormat4 = explode('.', $_FILES['file_Up4']['name']);
        $insFileFormat4 = end($takeFileFormat4);

        if (in_array(strtolower($insFileFormat4), $allFileFormat)) {
            $deleteOldFile4 = unlink($_POST['oldImgUrl4']);

            if ($deleteOldFile4) {
                $NewFileName4 = (date('Ymdhis') * 6) . "." . $insFileFormat4;
                $NewOrOldFile = 1;
            } else {
            }
        }
    } else {
        $takeFileFormat4 = explode('/', $_POST['oldImgUrl4']);
        $NewFileName4 = end($takeFileFormat4);
        $NewOrOldFile = 2;
    }

    if (isset($_FILES['file_Up5'])) {
        $takeFileFormat5 = explode('.', $_FILES['file_Up5']['name']);
        $insFileFormat5 = end($takeFileFormat5);

        if (in_array(strtolower($insFileFormat5), $allFileFormat)) {
            $deleteOldFile5 = unlink($_POST['oldImgUrl5']);

            if ($deleteOldFile5) {
                $NewFileName5 = (date('Ymdhis') * 6) . "." . $insFileFormat5;
                $NewOrOldFile = 1;
            } else {
            }
        }
    } else {
        $takeFileFormat5 = explode('/', $_POST['oldImgUrl5']);
        $NewFileName5 = end($takeFileFormat5);
        $NewOrOldFile = 2;
    }

    if (isset($_FILES['file_Up6'])) {
        $takeFileFormat6 = explode('.', $_FILES['file_Up6']['name']);
        $insFileFormat6 = end($takeFileFormat6);

        if (in_array(strtolower($insFileFormat6), $allFileFormat)) {
            $deleteOldFile6 = unlink($_POST['oldImgUrl6']);

            if ($deleteOldFile6) {
                $NewFileName6 = (date('Ymdhis') * 8) . "." . $insFileFormat6;
                $NewOrOldFile = 1;
            } else {
            }
        }
    } else {
        $takeFileFormat6 = explode('/', $_POST['oldImgUrl6']);
        $NewFileName6 = end($takeFileFormat6);
        $NewOrOldFile = 2;
    }

    if (isset($_FILES['file_Up7'])) {
        $takeFileFormat7 = explode('.', $_FILES['file_Up7']['name']);
        $insFileFormat7 = end($takeFileFormat7);

        if (in_array(strtolower($insFileFormat7), $allFileFormat)) {
            $deleteOldFile7 = unlink($_POST['oldImgUrl7']);

            if ($deleteOldFile7) {
                $NewFileName7 = (date('Ymdhis') * 10) . "." . $insFileFormat7;
                $NewOrOldFile = 1;
            } else {
            }
        }
    } else {
        $takeFileFormat7 = explode('/', $_POST['oldImgUrl7']);
        $NewFileName7 = end($takeFileFormat7);
        $NewOrOldFile = 2;
    }

    if (isset($_FILES['file_Up8'])) {
        $takeFileFormat8 = explode('.', $_FILES['file_Up8']['name']);
        $insFileFormat8 = end($takeFileFormat8);

        if (in_array(strtolower($insFileFormat8), $allFileFormat)) {
            $deleteOldFile8 = unlink($_POST['oldImgUrl8']);

            if ($deleteOldFile8) {
                $NewFileName8 = (date('Ymdhis') * 11) . "." . $insFileFormat8;
                $NewOrOldFile = 1;
            } else {
            }
        }
    } else {
        $takeFileFormat8 = explode('/', $_POST['oldImgUrl8']);
        $NewFileName8 = end($takeFileFormat8);
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
    if ($database_num == "z8" || $database_num == "z11" || $database_num == "z13_2") {
        $titleIns = htmlentities($_POST['title_Up'], ENT_QUOTES, "UTF-8");
        $titleIns_2 = htmlentities($_POST['title_Up_2'], ENT_QUOTES, "UTF-8");
        $textIns = htmlentities($_POST['text_Up'], ENT_QUOTES, "UTF-8");
        $textIns_2 = htmlentities($_POST['text_Up_2'], ENT_QUOTES, "UTF-8");
    }
    if ($database_num == "z15" || $database_num == "z13_1" || $database_num == "z9_1" || $database_num == "z9_2") {
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
    } else if ($database_num == "z9_1") {
        $base_NameAdress = ["new_souvenire"];
        $sql_date = "new_souvenirs = '$titleIns', new_souvenirs_eng = '$titleIns_2'";
    } else if ($database_num == "z9_2") {
        $base_NameAdress = ["all_collection"];
        $sql_date = "title = '$titleIns', title_eng = '$titleIns_2'";
    } else if ($database_num == "z11") {
        $base_NameAdress = ["history", "../assets/images/history/"];
        $sql_date = "title = '$titleIns',title_eng = '$titleIns_2', text='$textIns', history_eng='$textIns_2', historyImage='$NewFileName'";
    } else if ($database_num == "z12") {
        $base_NameAdress = ["partners", "../assets/images/partners/"];
        $sql_date = "slide_image='$NewFileName'";
    } else if ($database_num == "z13_1") {
        $base_NameAdress = ["packaging", "../assets/images/shop/"];
        $sql_date = "head_title = '$titleIns', head_title_eng = '$titleIns_2', head_image='$NewFileName'";
    } else if ($database_num == "z13_2") {
        $base_NameAdress = ["packaging", "../assets/images/shop/"];
        $sql_date = "title = '$titleIns',title_eng = '$titleIns_2', description='$textIns', description_eng='$textIns_2', image='$NewFileName'";
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
        $uploadFile1 = move_uploaded_file($_FILES['file_Up8']['tmp_name'], $base_NameAdresss[1] . $NewFileName8);
        $Updata1 = mysqli_query($connDB, "UPDATE `travel` SET `title` = '$titleIns1', `title_eng` = '$titleIns_21', `text` = '$textIns1', `text_eng` = '$textIns_21', `first_image` = '$NewFileName', `seccond_image` = '$NewFileName8' WHERE id = '1'");

        if ($Updata1) {
            echo  $NewFileName;
        } else {
            die("ok");
        }
        die();
    }
    if ($database_num == "z5_1") {
        $titleIns = htmlentities($_POST['title_Up'], ENT_QUOTES, "UTF-8");
        $titleIns_2 = htmlentities($_POST['title_Up_2'], ENT_QUOTES, "UTF-8");
        $Updata = mysqli_query($connDB, "UPDATE `map_idea` SET title='$titleIns', title_eng='$titleIns_2' WHERE id = '1'");
        echo 3;
        if ($Updata) {
            echo 4;
            echo  $NewFileName;
        } else {
        }
    }
    if ($database_num == "z9_3") {
        $titleIns1 = htmlentities($_POST['title_Up'], ENT_QUOTES, "UTF-8");
        $titleIns_21 = htmlentities($_POST['title_Up_2'], ENT_QUOTES, "UTF-8");
        $titleIns_3 = htmlentities($_POST['title_Up_3'], ENT_QUOTES, "UTF-8");
        $titleIns_4 = htmlentities($_POST['title_Up_4'], ENT_QUOTES, "UTF-8");
        $titleIns_5 = htmlentities($_POST['title_Up_5'], ENT_QUOTES, "UTF-8");
        $titleIns_6 = htmlentities($_POST['title_Up_6'], ENT_QUOTES, "UTF-8");
        $textIns1 = htmlentities($_POST['text_Up'], ENT_QUOTES, "UTF-8");
        $textIns_21 = htmlentities($_POST['text_Up_2'], ENT_QUOTES, "UTF-8");
        $base_NameAdresss = ["coll_desc", "../assets/images/collection/"];
        $uploadFile = move_uploaded_file($_FILES['file_Up']['tmp_name'], $base_NameAdresss[1] . $NewFileName);
        $uploadFile1 = move_uploaded_file($_FILES['file_Up1']['tmp_name'], $base_NameAdresss[1] . $NewFileName1);
        $uploadFile2 = move_uploaded_file($_FILES['file_Up2']['tmp_name'], $base_NameAdresss[1] . $NewFileName2);
        $uploadFile3 = move_uploaded_file($_FILES['file_Up3']['tmp_name'], $base_NameAdresss[1] . $NewFileName3);
        $uploadFile4 = move_uploaded_file($_FILES['file_Up4']['tmp_name'], $base_NameAdresss[1] . $NewFileName4);
        $uploadFile5 = move_uploaded_file($_FILES['file_Up5']['tmp_name'], $base_NameAdresss[1] . $NewFileName5);
        $uploadFile6 = move_uploaded_file($_FILES['file_Up6']['tmp_name'], $base_NameAdresss[1] . $NewFileName6);
        $uploadFile7 = move_uploaded_file($_FILES['file_Up7']['tmp_name'], $base_NameAdresss[1] . $NewFileName7);
        $Updata1 = mysqli_query($connDB, "UPDATE `coll_desc` SET `title` = '$titleIns1', `title_eng` = '$titleIns_21', `text` = '$textIns1', `text_eng` = '$textIns_21', `slide_text` = '$titleIns_3', `slide_text_eng` = '$titleIns_4', `loc-pos-top` = '$titleIns_5', `loc-pos-left` = '$titleIns_6', `first_image` = '$NewFileName', `seccond_image` = '$NewFileName1', `third_image` = '$NewFileName2', `first_image_prod` = '$NewFileName3', `first_slide` = '$NewFileName4', `seccond_slide` = '$NewFileName5', `map` = '$NewFileName6', `loc-img` = '$NewFileName7' WHERE id = '$id_Up'");
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
    $uploadFile2 = move_uploaded_file($_FILES['file_Up2']['tmp_name'], $base_NameAdress[1] . $NewFileName2);
    // }
    echo 2;
    echo $base_NameAdress[0];
    $Updata = mysqli_query($connDB, "UPDATE $base_NameAdress[0] SET $sql_date WHERE id = '$id_Up'");
    echo 3;
    if ($Updata) {
        echo 4;
        echo  $NewFileName;
    } else {
    }
}
// }
//------------------------------------------------------------------------------------

/***************************************************************************************** *
 ********************************************************************************************/


//ini_set('display_errors','Off');