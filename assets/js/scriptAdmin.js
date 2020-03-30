
/*================= ADMIN Coment Public (coment.php) ==================*/

//----------- Delete Button 
$(".buttDel").click(function(){
    var divId = $(this).attr("data-id");
    var thisParDiv = $(this).parent().parent();
    $.post({
        url: 'ajax.php',
        data: {divId},
        success: function(res){
            if(res == 1){
                thisParDiv.remove();
            }
        }
    })
});

//---------- Update Button 
$(".buttUpdata").click(function(){
    var updata = $(this).attr("data-id");
    var thisDiv=$(this);
    $.post({
        url: 'ajax.php',
        data: {updata},
        success: function(res){
            if(res == 1){
                thisDiv.remove();
            }
        }
    })
}); 
/*=======================================================================*/





/****************************************************************************** 

            ADMIN Header, About me, Gallery, News
        (header.php, about_me.php, gallery.php, news.php) 

*******************************************************************************/

var boolCount = true;
var divCount = 0;
//--------------- Function Insert ---------------------------------------

$(document).on("click","#buttInsert",function(){
   
    var data_b = $(this).parent().parent().attr("data-b");  
    var thisParChil = $(this).parent().parent().children("td"); 

    var fileIns = thisParChil.children(".file").prop('files')[0];
  
    var ArrayDat = new FormData();
    ArrayDat.append('database_ins', data_b);
    ArrayDat.append('file_ins', fileIns);

   
    if(data_b == "z3"){   
        var titleIns = thisParChil.children(".title").val().trim();
        var titleIns_2 = thisParChil.children(".title_2").val().trim();
        ArrayDat.append('title_ins', titleIns);
        ArrayDat.append('title_ins_2', titleIns_2);
    }
  
    if( data_b == "z4"){    
        var textIns = thisParChil.children(".textarea").val();
        var textIns_2 = thisParChil.children(".textarea_2").val();
        var pintURLIns = thisParChil.children(".pint_square").val();
        ArrayDat.append('textar_ins', textIns);
        ArrayDat.append('textar_ins_2', textIns_2);
        ArrayDat.append('pintURL_ins', pintURLIns);
    }

    $.post({
        cache: false,
        contentType: false,
        processData: false,
        url: 'ajax.php',
        data: ArrayDat,
        dataType: 'json',
        success: function(res){
            if(res){    
                if(data_b  == "z1"){
                    $('.adminContent').prepend('<tr class="newDiv tableBody_1" data-base="z1" data-Id="'+res['id']+'"> \
                        <td><img src="../img/head/'+res['image']+'"><input type="file" class="file"></td> \
                        <td><button type="button" class="btn btn-info" id="UpdtaButt">UPDATA</button><button type="button" class="btn btn-danger" id="DeleteButt" >DELETE</button></td> \
                    </tr>');
                }
                else if(data_b == "z3"){
                    $('.adminContent').prepend('<tr class="newDiv tableBody_1" data-base="z3" data-Id="'+res['id']+'"> \
                        <td><img src="../img/gallery/'+res['image']+'"> <input type="file" class="file" ></td> \
                        <td><input type="text" class="title" value="'+titleIns+'" placeholder="page 1"></td> \
                        <td><input type="text" class="title_2" value="'+titleIns_2+'" placeholder="page 2"></td> \
                        <td><button type="button" class="btn btn-info" id="UpdtaButt">UPDATA</button><button type="button" class="btn btn-danger" id="DeleteButt" >DELETE</button></td> \
                    </tr>');                       
                }
               
               else if(data_b == "z4"){
                    $('.adminContent').prepend('<tr class="newDiv tableBody_1" data-base="z4" data-Id="'+res['id']+'"> \
                    <td><input type="text" class="pint_square" value="'+pintURLIns+'" > </td> \
                    <td><input type="text" class="textarea" placeholder="page 1" value = "'+textIns+'"><input type="text" class="textarea_2" placeholder="page 2" value="'+textIns_2+'"></td>\
                    <td><button type="button" class="btn btn-info" id="UpdtaButt">UPDATA</button> <button type="button" class="btn btn-danger" id="DeleteButt" >DELETE</button></td> \
                    </tr>');    
                }
            }
           
        }
    });
    thisParChil.children(".title, .textarea, .title_2, .textarea_2, .pint_square").val("");
});

//-------------------------------------------------------------------------------



//------------------------ Function Delete ------------------------------------------

$(document).on("click","#DeleteButt",function(){
    var thisDiv = $(this).parent().parent(); 
  
    var ingURL = thisDiv.children("td").children("img").attr("src");
    var BaseN = thisDiv.attr("data-base");
    var DeleteId = thisDiv.attr("data-Id");
  
    $.post({
        url: 'ajax.php',
        data: {ingURL,BaseN,DeleteId},  
        success: function(res){
            if(res == 1){
                thisDiv.remove();
            }
        }
    });

    // if(BaseN == "z1"){  

    //     //max create div 5 before action  
    //     //if(boolCount == true){
    //        // divCount = $('.butStat').attr('data-count');
    //        // boolCount = false;
    //     //}
    //     //divCount--;
    //     //if(divCount < 5){
    //         $('<button type="button" class="btn btn-success" id="buttInsert" >INSERT</button>').replaceAll('.butStat');
    //     //}        
    // }
}); 
//----------------------------------------------------------------------------------





//----------------- Function Updata -------------------------------------------------

$(document).on("click","#UpdtaButt",function(){
    var thisContent = $(this).parent().parent();
    var thisParChil = $(this).parent().parent().children("td"); 


    var base_Up = thisContent.attr("data-base");
    var id_Up = thisContent.attr("data-Id");
    var oldImgUrl = thisParChil.children("img").attr("src");

    var file_Up = thisParChil.children(".file").prop('files')[0];

    var ArrayDat = new FormData();
    ArrayDat.append('base_Up', base_Up);
    ArrayDat.append('id_Up', id_Up);
    ArrayDat.append('oldImgUrl', oldImgUrl);

    ArrayDat.append('file_Up', file_Up);
 
    if(base_Up == "z3" || base_Up == "z2"){ 
        var title_Up = thisParChil.children(".title").val().trim();
        var title_Up_2 = thisParChil.children(".title_2").val().trim();
        ArrayDat.append('title_Up', title_Up);
        ArrayDat.append('title_Up_2', title_Up_2);
    }

    if(base_Up == "z4" || base_Up == "z2"){
        var text_Up = thisParChil.children(".textarea").val().trim();     
        var text_Up_2 = thisParChil.children(".textarea_2").val().trim();   
        ArrayDat.append('text_Up', text_Up);
        ArrayDat.append('text_Up_2', text_Up_2);

    }
   
    if(base_Up == "z4"){
        var pintURL_Up = thisParChil.children(".pint_square").val().trim();   
        ArrayDat.append('pintURL_Up', pintURL_Up);
    }

    $.post({
        cache: false,
        contentType: false,
        processData: false,
        url: 'ajax.php',
        data: ArrayDat,
        success: function(res){  
            if(res != ""){
                if(base_Up == "z1"){
                    $('<tr class="newDiv tableBody_1" data-base="z1" data-Id="'+id_Up+'"> \
                        <td><img src="../img/head/'+res+'"><input type="file" class="file"></td> \
                        <td><button type="button" class="btn btn-info" id="UpdtaButt">UPDATA</button><button type="button" class="btn btn-danger" id="DeleteButt" >DELETE</button></td> \
                    </tr>').replaceAll(thisContent);
                    
                }
                else if(base_Up == "z2"){
                    $('<tr class="newDiv tableBody_1" data-base="z2" data-Id="'+id_Up+'"> \
                        <td><img src="../img/about_me/'+res+'" ><input type="file" class="file"></td> \
                        <td><input type="text" class="title" value="'+title_Up+'" placeholder="page 1"><input type="text" class="title_2" value="'+title_Up_2+'" placeholder="page 2"></td> \
                        <td><textarea class="textarea" cols="30" rows="4" placeholder="page 1">'+text_Up+'</textarea></td> <td><textarea class="textarea_2" cols="30" rows="4" placeholder="page 1">'+text_Up_2+'</textarea></td> \
                        <td><button type="button" class="btn btn-info" id="UpdtaButt">UPDATA</button></td> \
                    </tr>').replaceAll(thisContent);
                }
                else if(base_Up == "z3"){
                    $('<tr class="newDiv tableBody_1" data-base="z3" data-Id="'+id_Up+'"> \
                        <td><img src="../img/gallery/'+res+'"> <input type="file" class="file" ></td> \
                        <td><input type="text" class="title" value="'+title_Up+'" placeholder="page 1"></td> \
                        <td><input type="text" class="title_2" value="'+title_Up_2+'" placeholder="page 2"></td> \
                        <td><button type="button" class="btn btn-info" id="UpdtaButt">UPDATA</button><button type="button" class="btn btn-danger" id="DeleteButt" >DELETE</button></td> \
                    </tr>').replaceAll(thisContent);                
                }
                else if(base_Up == "z4"){                  
                    $('<tr class="newDiv tableBody_1" data-base="z4" data-Id="'+id_Up+'"> \
                    <td><input type="text" class="pint_square" value="'+pintURL_Up+'" placeholder="pint square"></td> \
                    <td><input type="text" class="textarea" placeholder="page 1" value ="'+text_Up+'"><input type="text" class="textarea_2" placeholder="page 2" value = "'+text_Up_2+'"></td> \
                    <td><button type="button" class="btn btn-info" id="UpdtaButt">UPDATA</button> <button type="button" class="btn btn-danger" id="DeleteButt" >DELETE</button></td> \
                    </tr>').replaceAll(thisContent);                   
                }
           }
        }
    });
});
//------------------------------------------------------------------------------------

/***************************************************************************************** *
 ********************************************************************************************/