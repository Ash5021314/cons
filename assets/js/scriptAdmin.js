/*================= ADMIN Coment Public (coment.php) ==================*/

//----------- Delete Button
$(".buttDel").click(function () {
	var divId = $(this).attr("data-id");
	var thisParDiv = $(this).parent().parent();
	$.post({
		url: "ajax.php",
		data: { divId },
		success: function (res) {
			if (res == 1) {
				thisParDiv.remove();
			}
		},
	});
});

//---------- Update Button
$(".buttUpdata").click(function () {
	var updata = $(this).attr("data-id");
	var thisDiv = $(this);
	$.post({
		url: "ajax.php",
		data: { updata },
		success: function (res) {
			if (res == 1) {
				thisDiv.remove();
			}
		},
	});
});
/*=======================================================================*/

/****************************************************************************** 

            ADMIN Header, About me, Gallery, News
        (header.php, about_me.php, gallery.php, news.php) 

*******************************************************************************/

var boolCount = true;
var divCount = 0;
//--------------- Function Insert ---------------------------------------

$(document).on("click", "#buttInsert", function () {
	var data_b = $(this).parent().parent().attr("data-b");
	var thisParChil = $(this).parent().parent().children("td");

	var fileIns = thisParChil.children(".file").prop("files")[0];

	var ArrayDat = new FormData();
	ArrayDat.append("database_ins", data_b);
	ArrayDat.append("file_ins", fileIns);
	// if (data_b == "z3") {
	// 	var titleIns = thisParChil.children(".title").val().trim();
	// 	var titleIns_2 = thisParChil.children(".title_2").val().trim();
	// 	ArrayDat.append("title_ins", titleIns);
	// 	ArrayDat.append("title_ins_2", titleIns_2);
	// }

	if (data_b == "z4") {
		var textIns = thisParChil.children(".textarea").val();
		var textIns_2 = thisParChil.children(".textarea_2").val();
		ArrayDat.append("textar_ins", textIns);
		ArrayDat.append("textar_ins_2", textIns_2);
	}

	$.post({
		cache: false,
		contentType: false,
		processData: false,
		url: "ajax.php",
		data: ArrayDat,
		dataType: "json",
		success: function (res) {
			if (res) {
				window.location.reload();
				if (data_b == "z1") {
					$(".adminContent").prepend(
						'<tr class="newDiv tableBody_1" data-base="z1" data-Id="' +
							res["id"] +
							'"> \
                        <td><img src="../assets/images/product/' +
							res["slide_image"] +
							'"><input type="file" class="file"></td> \
                        <td><button type="button" class="btn btn-info" id="UpdtaButt">UPDATE</button><button type="button" class="btn btn-danger" id="DeleteButt" >DELETE</button></td> \
                    </tr>'
					);
				} else if (data_b == "z3") {
					$(".adminContent").prepend(
						'<tr class="newDiv tableBody_1" data-base="z3" data-Id="' +
							res["id"] +
							'"> \
                        <td><img src="../img/gallery/' +
							res["image"] +
							'"> <input type="file" class="file" ></td> \
                        <td><input type="text" class="title" value="' +
							titleIns +
							'" placeholder="page 1"></td> \
                        <td><input type="text" class="title_2" value="' +
							titleIns_2 +
							'" placeholder="page 2"></td> \
                        <td><button type="button" class="btn btn-info" id="UpdtaButt">UPDATA</button><button type="button" class="btn btn-danger" id="DeleteButt" >DELETE</button></td> \
                    </tr>'
					);
				} else if (data_b == "z4") {
					$(".adminContent").prepend(
						'<tr class="newDiv tableBody_1" data-base="z4" data-Id="' +
							res["id"] +
							'"> \
                    <td><img src="../assets/images/visit/' +
							res["image"] +
							'"><input type="file" class="file"></td>\
                    <td><input type="text" class="textarea" placeholder="page 1" value = "' +
							textIns +
							'"><input type="text" class="textarea_2" placeholder="page 2" value="' +
							textIns_2 +
							'"></td>\
                    <td><button type="button" class="btn btn-info" id="UpdtaButt">UPDATE</button> <button type="button" class="btn btn-danger" id="DeleteButt" >DELETE</button></td> \
                    </tr>'
					);
				}
			}
		},
	});
	thisParChil
		.children(".title, .textarea, .title_2, .textarea_2, .pint_square")
		.val("");
});

$(document).on("click", "#buttInsertText", function () {
	var data_b = $(this).parent().parent().attr("data-b");
	var thisParChil = $(this).parent().parent().children("td");

	var ArrayDat = new FormData();
	ArrayDat.append("database_ins", data_b);

	if (data_b == "z1_1") {
		var titleIns = thisParChil.children(".textarea").val().trim();
		var titleIns_2 = thisParChil.children(".textarea_1").val().trim();
		ArrayDat.append("textar_ins", titleIns);
		ArrayDat.append("textar_ins_2", titleIns_2);
	}

	$.post({
		cache: false,
		contentType: false,
		processData: false,
		url: "ajax.php",
		data: ArrayDat,
		dataType: "json",
		success: function (res) {
			window.location.reload();
			if (res) {
				if (data_b == "z1_1") {
					$(".adminContentText").prepend(
						'<tr class="newDiv tableBody_1" data-base="z1_1" data-Id="' +
							res["id"] +
							'"> \
                            <td>\
                            <textarea name="" id="" cols="30" rows="10">' +
							titleIns +
							'</textarea>\
                        <textarea name="" id="" cols="30" rows="10">' +
							titleIns_2 +
							'</textarea></td> \
                        <td><button type="button" class="btn btn-info" id="UpdtaButt' +
							res["id"] +
							'">UPDATE</button><button type="button" class="btn btn-danger" id="DeleteButt" >DELETE</button></td> \
                    </tr>'
					);
				} else if (data_b == "z3") {
					$(".adminContent").prepend(
						'<tr class="newDiv tableBody_1" data-base="z3" data-Id="' +
							res["id"] +
							'"> \
                        <td><img src="../img/gallery/' +
							res["image"] +
							'"> <input type="file" class="file" ></td> \
                        <td><input type="text" class="title" value="' +
							titleIns +
							'" placeholder="page 1"></td> \
                        <td><input type="text" class="title_2" value="' +
							titleIns_2 +
							'" placeholder="page 2"></td> \
                        <td><button type="button" class="btn btn-info" id="UpdtaButt">UPDATA</button><button type="button" class="btn btn-danger" id="DeleteButt" >DELETE</button></td> \
                    </tr>'
					);
				} else if (data_b == "z4") {
					$(".adminContent").prepend(
						'<tr class="newDiv tableBody_1" data-base="z4" data-Id="' +
							res["id"] +
							'"> \
                    <td><input type="text" class="pint_square" value="' +
							pintURLIns +
							'" > </td> \
                    <td><input type="text" class="textarea" placeholder="page 1" value = "' +
							textIns +
							'"><input type="text" class="textarea_2" placeholder="page 2" value="' +
							textIns_2 +
							'"></td>\
                    <td><button type="button" class="btn btn-info" id="UpdtaButt">UPDATA</button> <button type="button" class="btn btn-danger" id="DeleteButt" >DELETE</button></td> \
                    </tr>'
					);
				}
			}
		},
	});
	thisParChil
		.children(".title, .textarea, .title_2, .textarea_1, .pint_square")
		.val("");
});

//-------------------------------------------------------------------------------

//------------------------ Function Delete ------------------------------------------

$(document).on("click", ".DeleteButt", function () {
	var thisDiv = $(this).parent().parent();

	var ingURL = thisDiv.children("td").children("img").attr("src");
	var BaseN = thisDiv.attr("data-base");
	var DeleteId = thisDiv.attr("data-Id");

	$.post({
		url: "ajax.php",
		data: { ingURL, BaseN, DeleteId },
		success: function (res) {
			window.location.reload();
			if (res == 1) {
				thisDiv.remove();
			}
		},
	});
});
//----------------------------------------------------------------------------------

//----------------- Function Updata -------------------------------------------------

$(".updtaButt").click(function () {
	var thisContent = $(this).parent().parent();
	var thisParChil = $(this).parent().parent().children("td");

	var base_Up = thisContent.attr("data-base");
	var id_Up = thisContent.attr("data-Id");
	var oldImgUrl = thisParChil.children("img").attr("src");
	// var oldImgUrl = thisParChil.children("td").each(function () {
	// 	return $(this).children("img").attr("src");
	// 	// if ($(item).children("img").hasAttr("src")) {
	// 	// }
	// });
	// if ($(".file").get(0).files.length !== 0) {
	var file_Up = thisParChil.children(".file").prop("files")[0];
	// }
	var ArrayDat = new FormData();
	ArrayDat.append("base_Up", base_Up);
	ArrayDat.append("id_Up", id_Up);
	ArrayDat.append("oldImgUrl", oldImgUrl);
	console.log(file_Up);
	ArrayDat.append("file_Up", file_Up);

	if (base_Up == "z2") {
		var title_Up = thisParChil.children(".title").val().trim();
		var title_Up_2 = thisParChil.children(".title_2").val().trim();
		var textIns = thisParChil.children(".textarea").val();
		var textIns_2 = thisParChil.children(".textarea_2").val();
		ArrayDat.append("text_Up", textIns);
		ArrayDat.append("text_Up_2", textIns_2);
		ArrayDat.append("title_Up", title_Up);
		ArrayDat.append("title_Up_2", title_Up_2);
	}

	if (base_Up == "z1_1" || base_Up == "z4_1") {
		var text_Up = thisParChil.children(".textarea").val();
		var text_Up_2 = thisParChil.children(".textarea_1").val();
		ArrayDat.append("text_Up", text_Up);
		ArrayDat.append("text_Up_2", text_Up_2);
	}
	if (base_Up == "z3") {
		var text_Up = thisParChil.children(".textarea").val();
		var text_Up_2 = thisParChil.children(".textarea_1").val();
		ArrayDat.append("text_Up", text_Up);
		ArrayDat.append("text_Up_2", text_Up_2);
	}

	$.post({
		cache: false,
		contentType: false,
		processData: false,
		url: "ajax.php",
		data: ArrayDat,
		success: function (res) {
			// window.location.reload();
			console.log(res);
			if (res != "") {
				if (base_Up == "z1") {
					$(
						'<tr class="newDiv tableBody_1" data-base="z1" data-Id="' +
							id_Up +
							'"> \
                        <td><img src="../assets/images/product/' +
							res +
							'"><input type="file" class="file"></td> \
                        <td><button type="button" class="btn btn-info" class="UpdtaButt">UPDATE</button><button type="button" class="btn btn-danger" class="DeleteButt" >DELETE</button></td> \
                    </tr>'
					).replaceAll(thisContent);
				} else if (base_Up == "z1_1") {
					$(
						'<tr class="newDiv tableBody_1" data-base="z1_1" data-Id="' +
							id_Up +
							'"> \
                        <td><textarea class="textarea" cols="30" rows="4"">' +
							text_Up +
							'</textarea></td> <td><textarea class="textarea_2" cols="30" rows="4">' +
							text_Up_2 +
							'</textarea></td> \
                        <td><button type="button" class="btn btn-info" id="UpdtaButt">UPDATE</button><button type="button" class="btn btn-danger" class="DeleteButt" >DELETE</button></td> \
                    </tr>'
					).replaceAll(thisContent);
				} else if (base_Up == "z2") {
					$(
						'<tr class="newDiv tableBody_1" data-base="z2" data-Id="' +
							id_Up +
							'"> \
                        <td><img src="../assets/images/travel/' +
							res +
							'"> <input type="file" class="file" ></td> \
                        <td><input type="text" class="title" value="' +
							title_Up +
							'"></td> \
                        <td><input type="text" class="title_2" value="' +
							title_Up_2 +
							'"></td> \
                        <td><button type="button" class="btn btn-info" id="UpdtaButt">UPDATA</button><button type="button" class="btn btn-danger" id="DeleteButt" >DELETE</button></td> \
                    </tr>'
					).replaceAll(thisContent);
				} else if (base_Up == "z3") {
					console.log(res);
					$(
						'<tr class="newDiv tableBody_1" data-base="z3" data-Id="' +
							id_Up +
							'"> \
                        <td><textarea class="textarea" cols="30" rows="10"">' +
							text_Up +
							'</textarea><textarea class="textarea_1" cols="30" rows="10">' +
							text_Up_2 +
							'</textarea></td> \
                        <td><button type="button" class="btn btn-info UpdtaButt">UPDATE</button></td> \
                    </tr>'
					).replaceAll(thisContent);
				} else if (base_Up == "z4_1") {
					$(
						'<tr class="newDiv tableBody_1" data-base="z4_1" data-Id="' +
							id_Up +
							'"> \
                    <td><img src="../assets/images/visit/' +
							res["image"] +
							'"><input type="file" class="file"></td>\
                    <td><input type="text" class="textarea" value ="' +
							text_Up +
							'"><input type="text" class="textarea_2"  value = "' +
							text_Up_2 +
							'"></td> \
                    <td><button type="button" class="btn btn-info" id="UpdtaButt">UPDATA</button> <button type="button" class="btn btn-danger" id="DeleteButt" >DELETE</button></td> \
                    </tr>'
					).replaceAll(thisContent);
				}
			}
		},
	});
});
//------------------------------------------------------------------------------------

/***************************************************************************************** *
 ********************************************************************************************/
