<?php
session_start();
require "../connect.php";

if(!isset($_SESSION['userName'])){
    header ('location: index.php');
}

$allFileFormat = ['jpg','jpeg','png','gif'];  



/*================= ADMIN Coment Public (coment.php) ==================*/
//----------- Delete Button 
if(isset($_POST['divId'])){
    $deleteId = $_POST['divId'];
    $queryDel = mysqli_query($connDB,"DELETE FROM messages WHERE id='$deleteId' ");
    if($queryDel){
        echo 1;
    }
    else{
        echo 0;
    }

}
//---------- Update Button
if(isset($_POST['updata'])){
    $updateId = $_POST['updata'];
    $queryUp = mysqli_query($connDB,"UPDATE messages SET status = 1 WHERE id ='$updateId' ");
    if($queryUp){
        echo 1;
    }
    else{
        echo 0;
    }
}

/*=======================================================================*/




/****************************************************************************** 

            ADMIN Header, About me, Gallery, News
        (header.php, about_me.php, gallery.php, news.php) 

*******************************************************************************/

//--------------- Function Insert ---------------------------------------
if(isset($_POST['database_ins'])){
    
    if(!isset($_FILES['file_ins'])){
        echo 2;
        return false;
    }

    $takeFileFormat = explode('.',$_FILES['file_ins']['name']);
    $insFileFormat = end($takeFileFormat);
 
    if(in_array(strtolower($insFileFormat),$allFileFormat)){
        //if($_FILES['file_ins']['size'] < 2000000){
           
            $NewFileName = (date('Ymdhis')*2).".".$insFileFormat;
            $database_num = $_POST['database_ins'];
          
            if($database_num == "z1" || $database_num == "z3"){
                $titleIns = $_POST['title_ins'] ;
                $titleIns_2 = $_POST['title_ins_2'] ;
           }
           if($database_num == "z1" || $database_num == "z4"){
                $textIns = $_POST['textar_ins'] ;
                $textIns_2 = $_POST['textar_ins_2'] ;
           }
           if($database_num == "z3" || $database_num == "z4"){ 
                $pintURLIns = $_POST['pintURL_ins'];
                $instagURLIns =$_POST['instagURL_ins'];    
                $faceURLIns = $_POST['faceURL_ins'];
           }      


            if($database_num == "z1"){
                $base_NameAdres = ["head","../img/head/"];
                $sql_date = "title, title_2, text, text_2, image";
                $sql_insBaseDate = "'$titleIns'".", "."'$titleIns_2'".", "."'$textIns'".", "."'$textIns_2'".", "."'$NewFileName'";
            }
            else if($database_num == "z3"){ 
                $base_NameAdres = ["gallery","../img/gallery/"];
                $sql_date = "name, name_2, image, squareURL, instagURL, faceURL";
                $sql_insBaseDate = "'$titleIns'".","."'$titleIns_2'".","."'$NewFileName'".", "."'$pintURLIns'".", "."'$instagURLIns'".", "."'$faceURLIns'";
             }
            else if($database_num == "z4"){ 
                $base_NameAdres = ["news","../img/news/"];
                $cklocIns = $_POST['ckloc_ins'];
                $sql_date = "text, text_2, image, clock, squareURL, instagURL, faceURL";
                $sql_insBaseDate = "'$textIns'".","."'$textIns_2'".","."'$NewFileName'".", "."'$cklocIns'".", "."'$pintURLIns'".", "."'$instagURLIns'".", "."'$faceURLIns'";                
            } ;   
            
            $insertFile = move_uploaded_file($_FILES['file_ins']['tmp_name'],$base_NameAdres[1].$NewFileName);
            if($insertFile){
                $imgSet = mysqli_query($connDB,"INSERT INTO $base_NameAdres[0] ($sql_date) VALUES ($sql_insBaseDate) ");
                $idSelect = mysqli_query($connDB,"SELECT * FROM $base_NameAdres[0] WHERE image = '$NewFileName' ");
                
                $arrJson = mysqli_fetch_assoc($idSelect);

                if(is_array($arrJson)){
                    echo json_encode($arrJson);
                }
                else{echo 2;}
            }
            else{echo 3;}
       // }
    }
}
//-------------------------------------------------------------------------------

//------------------------ Function Delete --------------------------------------
if(isset($_POST['DeleteId'])){
    $deleteId = $_POST['DeleteId'];
    $delImgUrl = $_POST['ingURL'];
   
    if($_POST['BaseN'] == "z1"){$delBaseName = "head";}
    else if($_POST['BaseN'] == "z2"){$delBaseName = "about_me";}
    else if($_POST['BaseN'] == "z3"){$delBaseName = "gallery";}
    else if($_POST['BaseN'] == "z4"){$delBaseName = "news";}



    $queryDel = mysqli_query($connDB,"DELETE FROM $delBaseName WHERE id='$deleteId' ");       
    if($queryDel){
        $DeleteFile = unlink($delImgUrl);

        echo 1;      
    }
    else{echo 2;}
    

}
//----------------------------------------------------------------------------------


//----------------- Function Updata -------------------------------------------------
if(isset($_POST['base_Up'])){
  
    $NewOrOldFile = 0;

    if(isset($_FILES['file_Up'])){
        $takeFileFormat = explode('.',$_FILES['file_Up']['name']);
        $insFileFormat = end($takeFileFormat);

        if(in_array(strtolower($insFileFormat),$allFileFormat)){
            //if($_FILES['file_Up']['size'] < 2000000){

                $deleteOldFile = unlink($_POST['oldImgUrl']);
              
                if($deleteOldFile){
                    $NewFileName = (date('Ymdhis')*2).".".$insFileFormat;
                    $NewOrOldFile = 1;
               }else{}
           // }
        }        
    }
    else{
        $takeFileFormat = explode('/',$_POST['oldImgUrl']);
        $NewFileName = end($takeFileFormat);
        $NewOrOldFile = 2;
    }

    if($NewOrOldFile == 1 || $NewOrOldFile == 2){
    
        $id_Up = $_POST['id_Up'];
        $database_num = $_POST['base_Up'];


        if($database_num == "z1" || $database_num == "z3" || $database_num =="z2"){
            $titleIns = $_POST['title_Up'] ;
            $titleIns_2 = $_POST['title_Up_2'] ;
       }
       if($database_num == "z1" || $database_num == "z4"|| $database_num == "z2"){
            $textIns = $_POST['text_Up'] ;
            $textIns_2 = $_POST['text_Up_2'] ;
       }
       if($database_num == "z3" || $database_num == "z4"){ 
            $pintURLIns = $_POST['pintURL_Up'];
            $instagURLIns =$_POST['instagURL_Up'];    
            $faceURLIns = $_POST['faceURL_Up'];
       }  
        


        if($database_num == "z1"){
            $base_NameAdres = ["head","../img/head/"];
            $sql_date = "title='$titleIns', title_2='$titleIns_2', text='$textIns', text_2='$textIns_2', image='$NewFileName'";
        }
        else if($database_num == "z2"){ 
            $base_NameAdres = ["about_me","../img/about_me/"];          
            $sql_date = "title='$titleIns', title_2='$titleIns_2', text='$textIns', text_2='$textIns_2', image='$NewFileName'";
         } 
        else if($database_num == "z3"){ 
            $base_NameAdres = ["gallery","../img/gallery/"];
            $sql_date = "name='$titleIns', name_2='$titleIns_2', image='$NewFileName', squareURL='$pintURLIns', instagURL='$instagURLIns', faceURL='$faceURLIns'";
         }
        else if($database_num == "z4"){ 
            $base_NameAdres = ["news","../img/news/"];
            $cklocIns = $_POST['clock_Up'];
            $sql_date = "text='$textIns', text_2='$textIns_2', image='$NewFileName', clock='$cklocIns', squareURL='$pintURLIns', instagURL='$instagURLIns', faceURL='$faceURLIns'";
        } ;   


        if($NewOrOldFile == 1){
            $uploadFile = move_uploaded_file($_FILES['file_Up']['tmp_name'],$base_NameAdres[1].$NewFileName);
        }
       
        $Updata = mysqli_query($connDB,"UPDATE $base_NameAdres[0] SET $sql_date WHERE id = '$id_Up'");
       if($Updata){
            echo  $NewFileName;
        } else{}
    }
}
//------------------------------------------------------------------------------------

/***************************************************************************************** *
 ********************************************************************************************/










//ini_set('display_errors','Off');
?>