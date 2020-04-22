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

	var file = $(thisParChil).children(".file").prop("files");
	var file1 = $(thisParChil).children(".file1").prop("files");
	var file2 = $(thisParChil).children(".file2").prop("files");
	var file3 = $(thisParChil).children(".file3").prop("files");
	var file4 = $(thisParChil).children(".file4").prop("files");
	var file5 = $(thisParChil).children(".file5").prop("files");
	var file6 = $(thisParChil).children(".file6").prop("files");
	var file7 = $(thisParChil).children(".file7").prop("files");

	var ArrayDat = new FormData();
	ArrayDat.append("database_ins", data_b);
	if (typeof file !== "undefined" && file.length > 0) {
		var fileIns = thisParChil.children(".file").prop("files")[0];
		ArrayDat.append("file_ins", fileIns);
	}

	if (typeof file1 !== "undefined" && file1.length > 0) {
		var fileIns1 = thisParChil.children(".file1").prop("files")[0];
		ArrayDat.append("file_ins1", fileIns1);
	}
	if (typeof file2 !== "undefined" && file2.length > 0) {
		var fileIns2 = thisParChil.children(".file2").prop("files")[0];
		ArrayDat.append("file_ins2", fileIns2);
	}
	if (typeof file3 !== "undefined" && file3.length > 0) {
		var fileIns3 = thisParChil.children(".file3").prop("files")[0];
		ArrayDat.append("file_ins3", fileIns3);
	}
	if (typeof file4 !== "undefined" && file4.length > 0) {
		var fileIns4 = thisParChil.children(".file4").prop("files")[0];
		ArrayDat.append("file_ins4", fileIns4);
	}
	if (typeof file5 !== "undefined" && file5.length > 0) {
		var fileIns5 = thisParChil.children(".file5").prop("files")[0];
		ArrayDat.append("file_ins5", fileIns5);
	}
	if (typeof file6 !== "undefined" && file6.length > 0) {
		var fileIns6 = thisParChil.children(".file6").prop("files")[0];
		ArrayDat.append("file_ins6", fileIns6);
	}
	if (typeof file7 !== "undefined" && file7.length > 0) {
		var fileIns7 = thisParChil.children(".file7").prop("files")[0];
		ArrayDat.append("file_ins7", fileIns7);
	}
	if (data_b == "z4") {
		var textIns = thisParChil.children(".textarea").val();
		var textIns_2 = thisParChil.children(".textarea_2").val();
		ArrayDat.append("textar_ins", textIns);
		ArrayDat.append("textar_ins_2", textIns_2);
	} else if (data_b == "z7") {
		var title_Up = thisParChil.children(".title").val().trim();
		ArrayDat.append("title_Up", title_Up);
	} else if (data_b == "z8") {
		var titleIns = thisParChil.children(".title").val().trim();
		var titleIns_2 = thisParChil.children(".title_2").val().trim();
		var textIns = thisParChil.children(".textarea").val();
		var textIns_2 = thisParChil.children(".textarea_2").val();
		ArrayDat.append("textar_ins", textIns);
		ArrayDat.append("textar_ins_2", textIns_2);
		ArrayDat.append("title_ins", titleIns);
		ArrayDat.append("title_ins_2", titleIns_2);
	} else if (data_b == "z13") {
		var titleIns = thisParChil.children(".title").val().trim();
		var titleIns_2 = thisParChil.children(".title_2").val().trim();
		var textIns = thisParChil.children(".textarea").val();
		var textIns_2 = thisParChil.children(".textarea_2").val();
		ArrayDat.append("textar_ins", textIns);
		ArrayDat.append("textar_ins_2", textIns_2);
		ArrayDat.append("title_ins", titleIns);
		ArrayDat.append("title_ins_2", titleIns_2);
	} else if (data_b == "z9_3") {
		var titleIns = thisParChil.children(".title").val().trim();
		var titleIns_2 = thisParChil.children(".title_2").val().trim();
		var titleIns_3 = thisParChil.children(".title_3").val().trim();
		var titleIns_4 = thisParChil.children(".title_4").val().trim();
		var titleIns_5 = thisParChil.children(".title_5").val().trim();
		var titleIns_6 = thisParChil.children(".title_6").val().trim();
		var textIns = thisParChil.children(".textarea").val();
		var textIns_2 = thisParChil.children(".textarea_2").val();
		ArrayDat.append("textar_ins", textIns);
		ArrayDat.append("textar_ins_2", textIns_2);
		ArrayDat.append("title_ins", titleIns);
		ArrayDat.append("title_ins_2", titleIns_2);
		ArrayDat.append("title_ins_3", titleIns_3);
		ArrayDat.append("title_ins_4", titleIns_4);
		ArrayDat.append("title_ins_5", titleIns_5);
		ArrayDat.append("title_ins_6", titleIns_6);
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
                    <td><input type="text" value = "' +
							textIns +
							'"><input type="text" value="' +
							textIns_2 +
							'"></td>\
                    <td><button type="button" class="btn btn-info" id="UpdtaButt">UPDATE</button> <button type="button" class="btn btn-danger" id="DeleteButt" >DELETE</button></td> \
                    </tr>'
					);
				} else if (data_b == "z7") {
					$(".adminContent").prepend(
						'<tr class="newDiv tableBody_1" data-base="z7" data-Id="' +
							res["id"] +
							'"> \
                    <td><img src="../assets/images/socialIcon/' +
							res["icon"] +
							'"><input type="file" class="file"></td>\
                    <td><input type="text" value = "' +
							title_Up +
							'"></td>\
                    <td><button type="button" class="btn btn-info UpdtaButt" >UPDATE</button> <button type="button" class="btn btn-danger" id="DeleteButt" >DELETE</button></td> \
                    </tr>'
					);
				} else if (data_b == "z8") {
					$(".adminContent").prepend(
						'<tr class="newDiv tableBody_1" data-base="z8" data-Id="' +
							res["id"] +
							'"> \
                    <td><img src="../assets/images/terminal/' +
							res["image"] +
							'"><input type="file" class="file"></td>\
                    <td><input type="text" value = "' +
							titleIns +
							'"></td>\
                    <td><input type="text" value = "' +
							titleIns_2 +
							'"></td>\
							<td><textarea class="textarea" cols="30" rows="10"">' +
							textIns +
							'</textarea></td>\
							<td><textarea class="textarea_1" cols="30" rows="10">' +
							textIns_2 +
							'</textarea></td> \
                    <td><button type="button" class="btn btn-info UpdtaButt" >UPDATE</button> <button type="button" class="btn btn-danger" id="DeleteButt" >DELETE</button></td> \
                    </tr>'
					);
				} else if (data_b == "z9_3") {
					$(".adminContent9").prepend(
						'<tr class="newDiv tableBody_1" data-base="z9_3" data-Id="' +
							res["id"] +
							'"> \
                    <td><img src="../assets/images/collection/' +
							res["first_image"] +
							'"><input type="file" class="file"></td>\
                    <td><img src="../assets/images/collection/' +
							res["seccond_image"] +
							'"><input type="file" class="file"></td>\
                    <td><img src="../assets/images/collection/' +
							res["third_image"] +
							'"><input type="file" class="file"></td>\
                    <td><input type="text" value = "' +
							titleIns +
							'"></td>\
                    <td><input type="text" value = "' +
							titleIns_2 +
							'"></td>\
					<td><textarea class="textarea" cols="30" rows="10"">' +
							textIns +
							'</textarea></td>\
					<td><textarea class="textarea_1" cols="30" rows="10">' +
							textIns_2 +
							'</textarea></td> \
                    <td><button type="button" class="btn btn-info UpdtaButt" >UPDATE</button> <button type="button" class="btn btn-danger" id="DeleteButt" >DELETE</button></td> \
                    </tr>'
					);
				} else if (data_b == "z12") {
					$(".adminContent").prepend(
						'<tr class="newDiv tableBody_1" data-base="z12" data-Id="' +
							res["id"] +
							'"> \
                        <td><img src="../assets/images/partners/' +
							res["slide_image"] +
							'"><input type="file" class="file"></td> \
                        <td><button type="button" class="btn btn-info" id="UpdtaButt">UPDATE</button><button type="button" class="btn btn-danger" id="DeleteButt" >DELETE</button></td> \
                    </tr>'
					);
				} else if (data_b == "z13") {
					$(".adminContent").prepend(
						'<tr class="newDiv tableBody_1" data-base="z13" data-Id="' +
							res["id"] +
							'"> \
                    <td><img src="../assets/images/shop/' +
							res["image"] +
							'"><input type="file" class="file"></td>\
                    <td><input type="text" value = "' +
							titleIns +
							'"></td>\
                    <td><input type="text" value = "' +
							titleIns_2 +
							'"></td>\
							<td><textarea class="textarea" cols="30" rows="10"">' +
							textIns +
							'</textarea></td>\
							<td><textarea class="textarea_1" cols="30" rows="10">' +
							textIns_2 +
							'</textarea></td> \
                    <td><button type="button" class="btn btn-info UpdtaButt" >UPDATE</button> <button type="button" class="btn btn-danger" id="DeleteButt" >DELETE</button></td> \
                    </tr>'
					);
				} else if (data_b == "z14") {
					$(".adminContent").prepend(
						'<tr class="newDiv tableBody_1" data-base="z12" data-Id="' +
							res["id"] +
							'"> \
                        <td><img src="../assets/images/package/' +
							res["image"] +
							'"><input type="file" class="file"></td> \
                        <td><button type="button" class="btn btn-info" id="UpdtaButt">UPDATE</button><button type="button" class="btn btn-danger" id="DeleteButt" >DELETE</button></td> \
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

	var ingURL = thisDiv
		.children("td")
		.children("div")
		.children("img")
		.attr("src");
	var BaseN = thisDiv.attr("data-base");
	var DeleteId = thisDiv.attr("data-Id");

	$.post({
		url: "ajax.php",
		data: { ingURL, BaseN, DeleteId },
		success: function (res) {
			// window.location.reload();
			console.log(res);
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
	var thisParChil1 = $(this)
		.parent()
		.parent()
		.children("td")
		.children("div")
		.next("div")
		.next("div");

	var thisParChil2 = $(this)
		.parent()
		.parent()
		.children("td")
		.children("div")
		.next("div")
		.next("div")
		.next("div");
	var thisParChil3 = $(this)
		.parent()
		.parent()
		.children("td")
		.children("div")
		.next("div");
	var thisParChil4 = $(this)
		.parent()
		.parent()
		.children("td")
		.children("div")
		.next("div")
		.next("div")
		.next("div")
		.next("div");
	var thisParChil5 = $(this)
		.parent()
		.parent()
		.children("td")
		.children("div")
		.next("div")
		.next("div")
		.next("div")
		.next("div")
		.next("div");
	var thisParChil6 = $(this)
		.parent()
		.parent()
		.children("td")
		.children("div")
		.next("div")
		.next("div")
		.next("div")
		.next("div")
		.next("div")
		.next("div");
	var thisParChil7 = $(this)
		.parent()
		.parent()
		.children("td")
		.children("div")
		.next("div")
		.next("div")
		.next("div")
		.next("div")
		.next("div")
		.next("div")
		.next("div");
	var base_Up = thisContent.attr("data-base");
	var id_Up = thisContent.attr("data-Id");
	var oldImgUrl = thisParChil.children("div").children("img").attr("src");
	var oldImgUrl1 = thisParChil1.children("img").attr("src");
	var oldImgUrl2 = thisParChil2.children("img").attr("src");
	var oldImgUrl3 = thisParChil3.children("img").attr("src");
	var oldImgUrl4 = thisParChil4.children("img").attr("src");
	var oldImgUrl5 = thisParChil5.children("img").attr("src");
	var oldImgUrl6 = thisParChil6.children("img").attr("src");
	var oldImgUrl7 = thisParChil7.children("img").attr("src");

	var file = $(thisParChil).children("div").children(".file").prop("files");
	var file1 = $(thisParChil1).children(".file1").prop("files");
	var file2 = $(thisParChil2).children(".file2").prop("files");
	var file3 = $(thisParChil3).children(".file3").prop("files");
	var file4 = $(thisParChil4).children(".file4").prop("files");
	var file5 = $(thisParChil5).children(".file5").prop("files");
	var file6 = $(thisParChil6).children(".file6").prop("files");
	var file7 = $(thisParChil7).children(".file7").prop("files");

	if (typeof file !== "undefined") {
		var file_Up = thisParChil
			.children("div")
			.children(".file")
			.prop("files")[0];
	}

	if (typeof file1 !== "undefined" && file1.length > 0) {
		var file_Up1 = thisParChil1.children(".file1").prop("files")[0];
	}

	if (typeof file2 !== "undefined" && file2.length > 0) {
		var file_Up2 = thisParChil2.children(".file2").prop("files")[0];
	}
	if (typeof file3 !== "undefined" && file3.length > 0) {
		var file_Up3 = thisParChil3.children(".file3").prop("files")[0];
	}
	if (typeof file4 !== "undefined" && file4.length > 0) {
		var file_Up4 = thisParChil4.children(".file4").prop("files")[0];
	}
	if (typeof file5 !== "undefined" && file5.length > 0) {
		var file_Up5 = thisParChil5.children(".file5").prop("files")[0];
	}
	if (typeof file6 !== "undefined" && file6.length > 0) {
		var file_Up6 = thisParChil6.children(".file6").prop("files")[0];
	}
	if (typeof file7 !== "undefined" && file7.length > 0) {
		var file_Up7 = thisParChil6.children(".file7").prop("files")[0];
	}
	var ArrayDat = new FormData();
	ArrayDat.append("base_Up", base_Up);
	ArrayDat.append("id_Up", id_Up);
	ArrayDat.append("oldImgUrl", oldImgUrl);
	ArrayDat.append("oldImgUrl1", oldImgUrl1);
	ArrayDat.append("oldImgUrl2", oldImgUrl2);
	ArrayDat.append("oldImgUrl3", oldImgUrl3);
	ArrayDat.append("oldImgUrl4", oldImgUrl4);
	ArrayDat.append("oldImgUrl5", oldImgUrl5);
	ArrayDat.append("oldImgUrl6", oldImgUrl6);
	ArrayDat.append("oldImgUrl7", oldImgUrl7);
	ArrayDat.append("file_Up", file_Up);
	ArrayDat.append("file_Up1", file_Up1);
	ArrayDat.append("file_Up2", file_Up2);
	ArrayDat.append("file_Up3", file_Up3);
	ArrayDat.append("file_Up4", file_Up4);
	ArrayDat.append("file_Up5", file_Up5);
	ArrayDat.append("file_Up6", file_Up6);
	ArrayDat.append("file_Up7", file_Up7);

	if (
		base_Up == "z6" ||
		base_Up == "z8" ||
		base_Up == "z2" ||
		base_Up == "z13_2"
	) {
		var title_Up = thisParChil.children(".title").val().trim();
		var title_Up_2 = thisParChil.children(".title_2").val().trim();
		var textIns = thisParChil.children(".textarea").val();
		var textIns_2 = thisParChil.children(".textarea_2").val();
		ArrayDat.append("text_Up", textIns);
		ArrayDat.append("text_Up_2", textIns_2);
		ArrayDat.append("title_Up", title_Up);
		ArrayDat.append("title_Up_2", title_Up_2);
	}

	if (base_Up == "z1_1" || base_Up == "z4_1" || base_Up == "z3") {
		var text_Up = thisParChil.children(".textarea").val();
		var text_Up_2 = thisParChil.children(".textarea_1").val();
		ArrayDat.append("text_Up", text_Up);
		ArrayDat.append("text_Up_2", text_Up_2);
	}
	if (base_Up == "z7") {
		var title_Up = thisParChil.children(".title").val().trim();
		ArrayDat.append("title_Up", title_Up);
	}
	if (base_Up == "z7_1") {
		var title_Up = thisParChil.children(".title").val().trim();
		var title_Up_2 = thisParChil.children(".title_2").val().trim();
		var title_Up_3 = thisParChil.children(".title_3").val().trim();
		ArrayDat.append("title_Up", title_Up);
		ArrayDat.append("title_Up_2", title_Up_2);
		ArrayDat.append("title_Up_3", title_Up_3);
	}

	if (base_Up == "z11") {
		var title_Up = thisParChil.children(".title").val().trim();
		var title_Up_2 = thisParChil.children(".title_2").val().trim();
		var textIns = thisParChil.children(".textarea").val();
		var textIns_2 = thisParChil.children(".textarea_2").val();
		ArrayDat.append("text_Up", textIns);
		ArrayDat.append("text_Up_2", textIns_2);
		ArrayDat.append("title_Up", title_Up);
		ArrayDat.append("title_Up_2", title_Up_2);
	}
	if (base_Up == "z9_3") {
		var title_Up = thisParChil.children(".title").val().trim();
		var title_Up_2 = thisParChil.children(".title_2").val().trim();
		var title_Up_3 = thisParChil.children(".title_3").val().trim();
		var title_Up_4 = thisParChil.children(".title_4").val().trim();
		var title_Up_5 = thisParChil.children(".title_5").val().trim();
		var title_Up_6 = thisParChil.children(".title_6").val().trim();
		var textIns = thisParChil.children(".textarea").val();
		var textIns_2 = thisParChil.children(".textarea_2").val();
		ArrayDat.append("text_Up", textIns);
		ArrayDat.append("text_Up_2", textIns_2);
		ArrayDat.append("title_Up", title_Up);
		ArrayDat.append("title_Up_2", title_Up_2);
		ArrayDat.append("title_Up_3", title_Up_3);
		ArrayDat.append("title_Up_4", title_Up_4);
		ArrayDat.append("title_Up_5", title_Up_5);
		ArrayDat.append("title_Up_6", title_Up_6);
	}
	if (
		base_Up == "z15" ||
		base_Up == "z13_1" ||
		base_Up == "z9_1" ||
		base_Up == "z9_2" ||
		base_Up == "z5_1"
	) {
		var title_Up = thisParChil.children(".title").val().trim();
		var title_Up_2 = thisParChil.children(".title_2").val().trim();
		ArrayDat.append("title_Up", title_Up);
		ArrayDat.append("title_Up_2", title_Up_2);
	}

	$.post({
		cache: false,
		contentType: false,
		processData: false,
		url: "ajax.php",
		data: ArrayDat,
		success: function (res) {
			window.location.reload();
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
				} else if (base_Up == "z6") {
					$(
						'<tr class="newDiv tableBody_1" data-base="z6" data-Id="' +
							id_Up +
							'"> \
							<td><input type="text" value ="' +
							title_Up +
							'"><input type="text" value = "' +
							title_Up_2 +
							'"></td>\
                        <td><textarea class="textarea" cols="30" rows="10"">' +
							text_Up +
							'</textarea></td><td><textarea class="textarea_1" cols="30" rows="10">' +
							text_Up_2 +
							'</textarea></td> \
                        <td><button type="button" class="btn btn-info UpdtaButt">UPDATE</button></td> \
                    </tr>'
					).replaceAll(thisContent);
				} else if (base_Up == "z7") {
					$(
						'<tr class="newDiv tableBody_1" data-base="z7" data-Id="' +
							id_Up +
							'"> \
							<td><img src="../assets/images/socialIcon/' +
							res["icon"] +
							'"><input type="file" class="file"></td>\
                    <td><input type="text" value ="' +
							title_Up +
							'"></td>\
                        <td><button type="button" class="btn btn-info UpdtaButt">UPDATE</button><button type="button" class="btn btn-danger" id="DeleteButt" >DELETE</button></td> \
                    </tr>'
					).replaceAll(thisContent);
				} else if (base_Up == "z7_1") {
					$(
						'<tr class="newDiv tableBody_1" data-base="z7_1" data-Id="' +
							id_Up +
							'"> \
                    <td><input type="text" value ="' +
							title_Up +
							'"></td>\
                    <td><input type="text" value ="' +
							title_Up_2 +
							'"></td>\
                    <td><input type="text" value ="' +
							title_Up_3 +
							'"></td>\
                        <td><button type="button" class="btn btn-info UpdtaButt">UPDATE</button></td> \
                    </tr>'
					).replaceAll(thisContent);
				} else if (base_Up == "z8") {
					$(
						'<tr class="newDiv tableBody_1" data-base="z8" data-Id="' +
							id_Up +
							'"> \
							<td><img src="../assets/images/terminal/' +
							res["image"] +
							'"><input type="file" class="file"></td>\
							<td><input type="text" value ="' +
							title_Up +
							'"><input type="text" value = "' +
							title_Up_2 +
							'"></td>\
                        <td><textarea class="textarea" cols="30" rows="10"">' +
							textIns +
							'</textarea></td><td><textarea class="textarea_1" cols="30" rows="10">' +
							textIns_2 +
							'</textarea></td> \
                        <td><button type="button" class="btn btn-info UpdtaButt">UPDATE</button><button type="button" class="btn btn-danger" id="DeleteButt" >DELETE</button></td> \
                    </tr>'
					).replaceAll(thisContent);
				} else if (base_Up == "z11") {
					$(
						'<tr class="newDiv tableBody_1" data-base="z11" data-Id="' +
							id_Up +
							'"> \
							<td><img src="../assets/images/history/' +
							res["historyImage"] +
							'"><input type="file" class="file"></td>\
							<td><input type="text" value ="' +
							title_Up +
							'"><input type="text" value = "' +
							title_Up_2 +
							'"></td>\
                        <td><textarea class="textarea" cols="30" rows="4"">' +
							textIns +
							'</textarea></td><td><textarea class="textarea_1" cols="30" rows="4">' +
							textIns_2 +
							'</textarea></td> \
                        <td><button type="button" class="btn btn-info UpdtaButt">UPDATE</button><button type="button" class="btn btn-danger" id="DeleteButt" >DELETE</button></td> \
                    </tr>'
					).replaceAll(thisContent);
				} else if (base_Up == "z13_1") {
					$(
						'<tr class="newDiv tableBody_1" data-base="z13_1" data-Id="' +
							res["id"] +
							'"> \
                    <td><img src="../assets/images/shop/' +
							res["head_image"] +
							'"><input type="file" class="file"></td>\
                    <td><input type="text" value = "' +
							title_Up +
							'"></td>\
                    <td><input type="text" value = "' +
							title_Up_2 +
							'"></td>\
                    <td><button type="button" class="btn btn-info UpdtaButt" >UPDATE</button></td> \
                    </tr>'
					);
				} else if (base_Up == "z13_2") {
					$(
						'<tr class="newDiv tableBody_1" data-base="z11" data-Id="' +
							id_Up +
							'"> \
							<td><img src="../assets/images/history/' +
							res["image"] +
							'"><input type="file" class="file"></td>\
							<td><input type="text" value ="' +
							title_Up +
							'"><input type="text" value = "' +
							title_Up_2 +
							'"></td>\
                        <td><textarea class="textarea" cols="30" rows="6"">' +
							textIns +
							'</textarea><textarea class="textarea_1" cols="30" rows="6">' +
							textIns_2 +
							'</textarea></td> \
                        <td><button type="button" class="btn btn-info UpdtaButt">UPDATE</button></td><td><button type="button" class="btn btn-danger" id="DeleteButt" >DELETE</button></td> \
                    </tr>'
					).replaceAll(thisContent);
				} else if (base_Up == "z15") {
					$(
						'<tr class="newDiv tableBody_1" data-base="z14_1" data-Id="' +
							id_Up +
							'"> \
							<td><input type="text" value ="' +
							title_Up +
							'"><input type="text" value = "' +
							title_Up_2 +
							'"></td>\
                        <td><button type="button" class="btn btn-info UpdtaButt">UPDATE</button></td> \
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
