$(document).ready(function() {
	for (var i = 0; i < products.length; i++) {
		var user = getUserByNickname(products[i]["buyer"]);
		user["pay"] = parseFloat(user["pay"]) + parseFloat(products[i]["price"]);
	}
	
	addUserHeader();
	addUserConsumptions();
	addUserSummaries();
	
	$('[rel="tooltip"]').tooltip();
	
	$("#sortable").sortable({
		placeholder : "ui-state-highlight",
		cursor: "move",
		delay: "200",
		opacity: 0.8,
		revert: true,
		handle: ".sorthandle",
		update: function(event, ui) {
			updateItemOrder($(this).sortable('toArray'));
		}
	});
	$("#sortable").disableSelection();
	$("#add_participant_birthday_picker").datepicker({
		changeMonth: true,
		changeYear: true,
		maxDate: 0,
		yearRange: "1913:2014"
	});
	$("#edit_participant_birthday_picker").datepicker({
		changeMonth: true,
		changeYear: true,
		maxDate: 0,
		yearRange: "1913:2014"
	});
	$("#add_item_date_picker").datepicker({
		changeMonth: true,
		maxDate: 0
	});
	$("#edit_item_date_picker").datepicker({
		changeMonth: true,
		maxDate: 0
	});
	
	$("#editParticipantFormDiv").modal({
		  keyboard: true,
		  show: false
	});
	
	$("#add_item_buyer").prop("selectedIndex", -1);
});

$(window).bind('popstate', function(event) {
    // if the event has our history data on it, load the page fragment with AJAX
    if (null != event.originalEvent && null != event.originalEvent.state && event.originalEvent.state["page"]) {
    	if ("pot_page" == event.originalEvent.state["page"]) {
    		reloadPotPage();
    	} else if ("participant_page" == event.originalEvent.state["page"]) {
    		reloadParticipantPage();
    	} else if ("addItem_page" == event.originalEvent.state["page"]) {
    		reloadAddItemPage();
    	} else if ("editItem_page" == event.originalEvent.state["page"]) {
    		reloadEditItemPage("row_" + event.originalEvent.state["item"]);
    	}
    }
});

function reloadEditItemPage(rowId) {
	clearAllNavLi();
	fillEditItemForm(products[getProductIndexFromRowId(rowId)]);
	reloadPage("editItem_page");
}

function reloadParticipantPage() {
	clearAllNavLi();
	$('.navbar-collapse').collapse('hide');
	$("#nav_participant_li").addClass("active");
	clearForms();
	reloadPage('participant_page')
}

function reloadAddItemPage() {
	clearAllNavLi();
	$('.navbar-collapse').collapse('hide');
	$("#nav_addItem_li").addClass("active");
	clearForms();
	reloadPage('addItem_page')
}

function reloadPotPage() {
	clearAllNavLi();
	$('.navbar-collapse').collapse('hide');
	$("#nav_pot_li").addClass("active");
	clearForms();
	reloadPage("pot_page");
}

function reloadPage(displayedPage) {
	if (typeof displayedPage === "undefined") {
		displayedPage = "pot_page";
	}
	
	$("#pot_page").hide();
	$("#addItem_page").hide();
	$("#editItem_page").hide();
	$("#participant_page").hide();
	
	$("#" + displayedPage).show();
}

function displayPage(displayedPage, itemId) {
	if (typeof displayedPage === "undefined") {
		displayedPage = "pot_page";
	}
	
	$("#pot_page").hide();
	$("#addItem_page").hide();
	$("#editItem_page").hide();
	$("#participant_page").hide();
	
	$("#" + displayedPage).show();
	var sessionObj = {page: displayedPage};
	if ("pot_page" == displayedPage) {
		window.history.pushState(sessionObj, displayedPage, "/gfm/" + pot["url"] + "/overview");
	} else if ("addItem_page" == displayedPage) {
		window.history.pushState(sessionObj, displayedPage, "/gfm/" + pot["url"] + "/item/add");
	} else if ("editItem_page" == displayedPage) {
		sessionObj["item"] = itemId;
		window.history.pushState(sessionObj, displayedPage, "/gfm/" + pot["url"] + "/item/edit/" + itemId);
	} else if ("participant_page" == displayedPage) {
		window.history.pushState(sessionObj, displayedPage, "/gfm/" + pot["url"] + "/participant");
	}
}

function displayEditItemPage(rowId) {
	clearAllNavLi();
	fillEditItemForm(products[getProductIndexFromRowId(rowId)]);
	displayPage("editItem_page", rowId.substring(4));
}

function displayParticipantPage() {
	clearAllNavLi();
	$('.navbar-collapse').collapse('hide');
	$("#nav_participant_li").addClass("active");
	clearForms();
	displayPage('participant_page')
}

function displayAddItemPage() {
	clearAllNavLi();
	$('.navbar-collapse').collapse('hide');
	$("#nav_addItem_li").addClass("active");
	clearForms();
	displayPage('addItem_page')
}

function displayPotPage() {
	clearAllNavLi();
	$('.navbar-collapse').collapse('hide');
	$("#nav_pot_li").addClass("active");
	clearForms();
	displayPage("pot_page");
}

function clearForms() {
	clearForm("addParticipantForm");
	clearForm("addItemForm");
	$("#add_item_buyer").prop("selectedIndex", -1);
	clearForm("editItemForm");
	$("#edit_item_buyer").prop("selectedIndex", -1);
}

function clearAllNavLi() {
	$("#nav_pot_li").removeClass("active");
	$("#nav_participant_li").removeClass("active");
	$("#nav_addItem_li").removeClass("active");
}

function clearForm(formId) {
	$("#" + formId).find("input[type=text], input[type=email], textarea").val("");
}

function fillEditItemForm(product) {
	$("#edit_item_id").val(product["rowId"]);
	$("#edit_item_name").val(product["name"]);
	$("#edit_item_amount").val(product["price"]);
	$("#edit_item_date_picker").val(product["date"]);
	$("#edit_item_buyer").val(product["buyer"]);
	
	for (var i = 0; i < users.length; i++) {
		$("#edit_item_" + users[i]["nickname"] + "_percentage").val(100 * product[users[i]["nickname"]]);
	}
}

function getUserByNickname(nickname) {
	for (var i = 0; i < users.length; i++) {
		if (users[i]["nickname"] == nickname) {
			return users[i];
		}
	}
}

function addUserHeader() {
	for (var i = 0; i < users.length; i++) {
		addUserConsumptionHeader(users[i]);
	}
}

function addUserConsumptionHeader(user) {
	var userColumn = "<th id='column_" + user["nickname"] + "'>" + user["nickname"] + "</th>";
	$("#expense_header_row").append(userColumn);
}

function addUserConsumptions() {
	for (var i = 0; i < products.length; i++) {
		addProductColumns(products[i], true);
		for (var j = 0; j < users.length; j++) {
			addUserConsumptionColumn(users[j], products[i]);
		}
	}
}

function addProductColumns(product, newProduct) {
	var row = "";
	if (newProduct) {
		row += "<tr id='" + product["rowId"] + "'>";
	}
	row += "<td class='sorthandle'>" + product["date"] + "</td>";
	row += "<td class='clickable' onclick='removeItem(\"" + product["rowId"] + "\")'><span class='glyphicon glyphicon-trash'></span></td>";
	row += "<td class='clickable' onclick='displayEditItemPage(\"" + product["rowId"] + "\")'><span class='glyphicon glyphicon-pencil'></span></td>";
	row += "<td>" + product["name"] + "</td>";
	row += "<td>" + roundToRap(product["price"]) + "</td>";
	row += "<td>" + product["buyer"] + "</td>";
	if (newProduct) {
		$("#sortable").append(row);
	} else {
		$("#" + product["rowId"]).append(row);
	}
}

function addUserConsumptionColumn(user, product) {
	var userColumn = "<td>";
	var part = product[user["nickname"]];
	if (0 < part) {
		var use = roundToRap(product["price"] * part);
		user["use"] = parseFloat(user["use"]) + (product["price"] * part);
		userColumn += '<span class="tooltipable" rel="tooltip" data-original-title="CHF ' + use + ' (' + (part * 100) + '%)">';
		userColumn += "Ja";
		userColumn += "</span>";
	} else {
		userColumn += "Nein";
	}
	userColumn += "</td>";
	$("#" + product["rowId"]).append(userColumn);
}

function roundToRap(value)
{
	var k = (Math.round(value * 20) / 20).toString();
	k += (k.indexOf('.') == -1)? ".00" : "00";
	return k.substring(0, k.indexOf('.') + 3);
}

function addUserSummaries() {
	for (var i = 0; i < users.length; i++) {
		addUserSummary(users[i]);
	}
}

function addUserSummary(user) {
	var pay = roundToRap(user["pay"]);
	var use = roundToRap(user["use"]);
	var diff = roundToRap(pay - use);
	var payCell = '<td id="sum_pay_' + user["nickname"] + '">' + pay + "</td>";
	$("#sum_pay").append(payCell);
	var useCell = '<td id="sum_use_' + user["nickname"] + '">' + use + "</td>";
	$("#sum_use").append(useCell);
	var diffCell = '<th id="sum_diff_' + user["nickname"] + '"';
	if (0 > diff) {
		diffCell += ' class="negative"';
	} else if (0 < diff) {
		diffCell += ' class="positive"';
	}
	diffCell += ">" + diff + "</th>";
	$("#sum_diff").append(diffCell);
}

function updateItemOrder(positions) {
	var request = $.ajax({
		type: "POST",
		data: {
			action: "changeProductOrder",
			positions: positions,
			potId: pot["id"]
		},
		beforeSend: function(x) {
			if(x && x.overrideMimeType) {
				x.overrideMimeType("application/json;charset=UTF-8");
			}
		},
		url: 'actions.php'
	});

	request.done(function(data) {
		if (data.success) {
			$("#successText").html(data.message);
			$("#successDiv").show().delay(5000).fadeOut();
		} else {
			$("#errorText").html(data.message);
			$("#errorDiv").show().delay(10000).fadeOut();
		}
	});
	request.fail(function(jqXHR, textStatus) {
		alert( "Request failed: " + textStatus );
	});
}

function checkNewItem() {
	var consumptions = getConsumption("add");
	if (checkItem(consumptions, "add")) {
		addItem($("#add_item_name").val(), $("#add_item_amount").val(), $("#add_item_date_picker").val(), $("#add_item_buyer").val(), consumptions);
	}
}

function checkEditItem() {
	var consumptions = getConsumption("edit");
	if (checkItem(consumptions, "edit")) {
		editItem($("#edit_item_id").val(), $("#edit_item_name").val(), $("#edit_item_amount").val(), $("#edit_item_date_picker").val(), $("#edit_item_buyer").val(), consumptions);
	}
	
}

function checkItem(consumptions, scope) {
	var valid = true;
	if (!checkLength($("#" + scope + "_item_name"), 3, 32)) {
		valid = false;
		$("#" + scope + "_item_name_div").addClass("has-error");
		$("#" + scope + "_item_name_error").html("Die L&auml;nge des Namens muss zwischen 3 und 32 sein.");
	} else {
		$("#" + scope + "_item_name_div").removeClass("has-error");
		$("#" + scope + "_item_name_error").html("");
	}
	if (!checkRegexp($("#" + scope + "_item_amount"), /^\d+(?:\.\d+)?$/)) {
		valid = false;
		$("#" + scope + "_item_amount_div").addClass("has-error");
		$("#" + scope + "_item_amount_error").html("Bitte einen validen Betrag eingeben.");
	} else {
		$("#" + scope + "_item_amount_div").removeClass("has-error");
		$("#" + scope + "_item_amount_error").html("");
	}
	if (!isValidDate($("#" + scope + "_item_date_picker").val())) {
		valid = false;
		$("#" + scope + "_item_date_div").addClass("has-error");
		$("#" + scope + "_item_date_error").html("Kein valides Datum (Format: DD.MM.YYYY)");
	} else {
		$("#" + scope + "_item_date_div").removeClass("has-error");
		$("#" + scope + "_item_date_error").html("");
	}
	if ($("#" + scope + "_item_buyer").prop("selectedIndex") == -1) {
		valid = false;
		$("#" + scope + "_item_buyer_div").addClass("has-error");
		$("#" + scope + "_item_buyer_error").html("Bitte einen Zahler ausw&auml;hlen.");
	} else {
		$("#" + scope + "_item_buyer_div").removeClass("has-error");
		$("#" + scope + "_item_buyer_error").html("");
	}
	var validConsumptions = validateConsumption(consumptions, scope);

	return (valid && validConsumptions);
}

function getConsumption(scope) {
	var consumptions = [];
	for (var i = 0; i < users.length; i++) {
		consumptions.push([users[i]["nickname"], $("#" + scope + "_item_" + users[i]["nickname"] + "_percentage").val()]);
	}
	return consumptions;
}

function validateConsumption(consumptions, scope) {
	var valid = true;
	var sum = 0;
	for (var i = 0; i < users.length; i++) {
		if (!checkRegexp($("#" + scope + "_item_" + users[i]["nickname"] + "_percentage"), /^\d+(?:\.\d+)?$/)) {
			valid = false;
			$("#" + scope + "_item_" + users[i]["nickname"] + "_percentage_div").addClass("has-error");
			$("#" + scope + "_item_" + users[i]["nickname"] + "_percentage_error").html("Bitte einen validen Betrag eingeben.");
		} else {
			$("#" + scope + "_item_" + users[i]["nickname"] + "_percentage_div").removeClass("has-error");
			$("#" + scope + "_item_" + users[i]["nickname"] + "_percentage_error").html("");
			sum += parseFloat($("#" + scope + "_item_" + users[i]["nickname"] + "_percentage").val());
		}
	}
	if (valid && 100 != sum) {
		valid = false;
		$("#" + scope + "_item_" + users[users.length-1]["nickname"] + "_percentage_div").addClass("has-error");
		$("#" + scope + "_item_" + users[users.length-1]["nickname"] + "_percentage_error").html("Die Summe der Konsumationen ergibt nicht 100%.");
	} else if (valid) {
		$("#" + scope + "_item_" + users[users.length-1]["nickname"] + "_percentage_div").removeClass("has-error");
		$("#" + scope + "_item_" + users[users.length-1]["nickname"] + "_percentage_error").html("");
	}
	return valid;
}

function addItem(name, amount, date, buyer, consumptions) {
	var request = $.ajax({
		type: "POST",
		data: {
			action: "addItem",
			name: name,
			amount: amount,
			date: date,
			buyer: buyer,
			potId: pot["id"],
			consumptions: consumptions
		},
		beforeSend: function(x) {
			if(x && x.overrideMimeType) {
				x.overrideMimeType("application/json;charset=UTF-8");
			}
		},
		url: 'actions.php'
	});

	request.done(function(data) {
		if (data.success) {
			var newProduct = {
					"rowId"	: "row_" + data.itemId,
					"name"	: data.name,
					"price"	: data.price,
					"date"	: data.date,
					"buyer"	: data.buyer
			}
			for (var i = 0; i < data.consumptions.length; i++) {
				newProduct[data.consumptions[i][0]] = data.consumptions[i][1]/100;
			}
			products.push(newProduct);
			getUserByNickname(newProduct["buyer"])["pay"] += parseFloat(newProduct["price"]);
			
			addProductColumns(newProduct, true);
			for (var i = 0; i < users.length; i++) {
				addUserConsumptionColumn(users[i], newProduct);
			}
			updateSumValues();
			displayPotPage();
			$('[rel="tooltip"]').tooltip();

			$("#successText").html(data.message);
			$("#successDiv").show().delay(5000).fadeOut();
		} else {
			$("#errorText").html(data.message);
			$("#errorDiv").show().delay(10000).fadeOut();
		}
	});
	request.fail(function(jqXHR, textStatus) {
		alert( "Request failed: " + textStatus );
	});
}

function editItem(id, name, amount, date, buyer, consumptions) {
	var request = $.ajax({
		type: "POST",
		data: {
			action: "editItem",
			id: id.substring(4),
			name: name,
			amount: amount,
			date: date,
			buyer: buyer,
			potId: pot["id"],
			consumptions: consumptions
		},
		beforeSend: function(x) {
			if(x && x.overrideMimeType) {
				x.overrideMimeType("application/json;charset=UTF-8");
			}
		},
		url: 'actions.php'
	});

	request.done(function(data) {
		if (data.success) {
			var editProduct = {
					"rowId"	: "row_" + data.itemId,
					"name"	: data.name,
					"price"	: data.price,
					"date"	: data.date,
					"buyer"	: data.buyer
			}
			for (var i = 0; i < data.consumptions.length; i++) {
				editProduct[data.consumptions[i][0]] = data.consumptions[i][1]/100;
			}
			var index = getProductIndexFromRowId("row_" + data.itemId);
			var oldProduct = products[index];
			products[index] = editProduct;
			getUserByNickname(oldProduct["buyer"])["pay"] -= parseFloat(oldProduct["price"]);
			getUserByNickname(editProduct["buyer"])["pay"] += parseFloat(editProduct["price"]);
			
			$("#" + id).empty();
			addProductColumns(editProduct, false);
			for (var i = 0; i < users.length; i++) {
				users[i]["use"] -= oldProduct["price"] * oldProduct[users[i]["nickname"]];
				addUserConsumptionColumn(users[i], editProduct);
			}
			updateSumValues();
			displayPotPage();
			$('[rel="tooltip"]').tooltip();

			$("#successText").html(data.message);
			$("#successDiv").show().delay(5000).fadeOut();
		} else {
			$("#errorText").html(data.message);
			$("#errorDiv").show().delay(10000).fadeOut();
		}
		
	});
	request.fail(function(jqXHR, textStatus) {
		alert( "Request failed: " + textStatus );
	});
	
}

function updateSumValues() {
	for (var i = 0; i < users.length; i++) {
		var pay = roundToRap(users[i]["pay"]);
		var use = roundToRap(users[i]["use"]);
		var diff = roundToRap(pay - use);
		$("#sum_pay_" + users[i]["nickname"]).text(pay);
		$("#sum_use_" + users[i]["nickname"]).text(use);
		$("#sum_diff_" + users[i]["nickname"]).text(diff);
		$("#sum_diff_" + users[i]["nickname"]).removeClass("negative")
		$("#sum_diff_" + users[i]["nickname"]).removeClass("positive");
		if (0 > diff) {
			$("#sum_diff_" + users[i]["nickname"]).addClass("negative");
		} else if (0 < diff) {
			$("#sum_diff_" + users[i]["nickname"]).addClass("positive");
		}
	}
}

function removeItem(rowId) {
	var request = $.ajax({
		type: "POST",
		data: {
			action: "removeItem",
			id: rowId.substring(4)
		},
		beforeSend: function(x) {
			if(x && x.overrideMimeType) {
				x.overrideMimeType("application/json;charset=UTF-8");
			}
		},
		url: 'actions.php'
	});

	request.done(function(data) {
		if (data.success) {
			var indexToProductToDelete = getProductIndexFromRowId("row_" + data.rowId);
			var productToDelete = products[indexToProductToDelete];
			products.splice(indexToProductToDelete, 1);
			getUserByNickname(productToDelete["buyer"])["pay"] -= productToDelete["price"];
			for (var i = 0; i < users.length; i++) {
				var part = productToDelete[users[i]["nickname"]];
				users[i]["use"] -= productToDelete["price"] * part;
			}
			$("#" + rowId).remove();
			updateSumValues();

			$("#successText").html(data.message);
			$("#successDiv").show().delay(5000).fadeOut();
		} else {
			$("#errorText").html(data.message);
			$("#errorDiv").show().delay(10000).fadeOut();
		}
	});
	request.fail(function(jqXHR, textStatus) {
		alert( "Request failed: " + textStatus );
	});
}

function getProductIndexFromRowId(rowId) {
	for (var i = 0; i < products.length; i++) {
		if (products[i]["rowId"] == rowId) {
			return i;
		}
	}
}

function calcSolution() {
	$("#solution").empty();
	$("#solution_div").show();
	var userDiffs = getUserDiffArray();
	for (var i = 0; i < userDiffs.length; i++) {
		var amountCreditor = userDiffs[i][1];
		if (amountCreditor > 0) {
			for (var j = 0; j < userDiffs.length; j++) {
				var amountDebitor = userDiffs[j][1];
				if (amountDebitor < 0 && amountCreditor + amountDebitor < 0) {
					appendSolutionRow(userDiffs[j][0], userDiffs[i][0], roundToRap(Math.abs(amountCreditor)));
					userDiffs[j][1] = parseFloat((amountCreditor + amountDebitor).toFixed(2));
					userDiffs[i][1] = 0;
					break;
				} else if (amountDebitor < 0) {
					appendSolutionRow(userDiffs[j][0], userDiffs[i][0], roundToRap(Math.abs(amountDebitor)));
					userDiffs[j][1] = 0;
					amountCreditor = parseFloat((amountCreditor + amountDebitor).toFixed(2));
					userDiffs[i][1] = amountCreditor;
				}
				
				if (amountCreditor == 0) {
					break;
				}
			}
		}
	}
}

function appendSolutionRow(debitor, creditor, amount) {
	$("#solution").append("<tr><td>" + debitor + "</td><td>" + creditor + "</td><td>CHF " + amount + "</td></tr>");
}

function getUserDiffArray() {
	var userDiffArray = [];
	for (var i = 0; i < users.length; i++) {
		userDiffArray.push([users[i]["nickname"], parseFloat(roundToRap(users[i]["pay"] - users[i]["use"]))]);
	}
	return userDiffArray;
}

function checkNewParticipant() {
	if (checkParticipant("add")) {
		addParticipant($("#add_participant_nickname").val(), $("#add_participant_name").val(), $("#add_participant_firstname").val(), $("#add_participant_email").val(), $("#add_participant_birthday_picker").val())
	}
}

function checkEditParticipant() {
	if (checkParticipant("edit")) {
		editParticipant($("#edit_participant_id").val(), $("#edit_participant_nickname").html(), $("#edit_participant_name").val(), $("#edit_participant_firstname").val(), $("#edit_participant_email").val(), $("#edit_participant_birthday_picker").val());
		closeEditparticipantDialog();
	}
}

function checkParticipant(scope) {
	var valid = true;
	if ("add" == scope && !checkLength($("#" + scope + "_participant_nickname"), 3, 32)) {
		valid = false;
		$("#" + scope + "_participant_nickname_div").addClass("has-error");
		$("#" + scope + "_participant_nickname_error").html("Die L&auml;nge des Nicknamens muss zwischen 3 und 32 sein.");
	} else {
		$("#" + scope + "_participant_nickname_div").removeClass("has-error");
		$("#" + scope + "_participant_nickname_error").html("");
	}
	if (!checkLength($("#" + scope + "_participant_name"), 3, 32)) {
		valid = false;
		$("#" + scope + "_participant_name_div").addClass("has-error");
		$("#" + scope + "_participant_name_error").html("Die L&auml;nge des Namens muss zwischen 3 und 32 sein.");
	} else {
		$("#" + scope + "_participant_name_div").removeClass("has-error");
		$("#" + scope + "_participant_name_error").html("");
	}
	if (!checkLength($("#" + scope + "_participant_firstname"), 3, 32)) {
		valid = false;
		$("#" + scope + "_participant_firstname_div").addClass("has-error");
		$("#" + scope + "_participant_firstname_error").html("Die L&auml;nge des Vornamens muss zwischen 3 und 32 sein.");
	} else {
		$("#" + scope + "_participant_firstname_div").removeClass("has-error");
		$("#" + scope + "_participant_firstname_error").html("");
	}
	if (!checkRegexp($("#" + scope + "_participant_email"), /\w+@\w+\.\w+/)) {
		valid = false;
		$("#" + scope + "_participant_email_div").addClass("has-error");
		$("#" + scope + "_participant_email_error").html("Keine valide E-Mail-Adresse (z.B.: hans@muster.ch)");
	} else {
		$("#" + scope + "_participant_email_div").removeClass("has-error");
		$("#" + scope + "_participant_email_error").html("");
	}
	if (!isValidDate($("#" + scope + "_participant_birthday_picker").val())) {
		valid = false;
		$("#" + scope + "_participant_birthday_div").addClass("has-error");
		$("#" + scope + "_participant_birthday_error").html("Kein valides Datum (Format: DD.MM.YYYY)");
	} else if (!isDateOneBeforDateTwo(convertStringToDate($("#" + scope + "_participant_birthday_picker").val()), new Date())) {
		valid = false;
		$("#" + scope + "_participant_birthday_div").addClass("has-error");
		$("#" + scope + "_participant_birthday_error").html("Das Datum muss vor heute sein.");
	} else {
		$("#" + scope + "_participant_birthday_div").removeClass("has-error");
		$("#" + scope + "_participant_birthday_error").html("");
	}
	return valid;
}

function addParticipant(nickname, name, firstname, email, birthday) {
	var request = $.ajax({
		type: "POST",
		data: {
			action: "addParticipant",
			nickname: nickname,
			name: name,
			firstname: firstname,
			email: email,
			birthday: birthday,
			potId: pot["id"]
		},
		beforeSend: function(x) {
			if(x && x.overrideMimeType) {
				x.overrideMimeType("application/json;charset=UTF-8");
			}
		},
		url: 'actions.php'
	});

	request.done(function(data) {
		if (data.success) {
			var newParticipant = {
					"id"		: data.id,
					"nickname"	: data.nickname,
					"name"		: data.name,
					"firstname"	: data.firstname,
					"email"		: data.email,
					"birthday"	: data.birthday,
					"pay"		: 0.0,
					"use"		: 0.0
			}
			users.push(newParticipant);
			addParticipantToUserList(newParticipant);
			addParticipantColumnInPot(newParticipant);
			addUserSummary(newParticipant);
			addUserRowToItemForm(newParticipant, "add");
			addUserRowToItemForm(newParticipant, "edit");
			addUserToSelectInItemForm(newParticipant, "add");
			addUserToSelectInItemForm(newParticipant, "edit");
			
			clearForm("addParticipantForm");

			$("#successText").html(data.message);
			$("#successDiv").show().delay(5000).fadeOut();
		} else {
			$("#errorText").html(data.message);
			$("#errorDiv").show().delay(10000).fadeOut();
		}
	});
	request.fail(function(jqXHR, textStatus) {
		alert( "Request failed: " + textStatus );
	});
}

function addParticipantToUserList(participant) {
	var row = "<tr id='" + participant["id"] + "'>";
	row += "<td>" + participant["nickname"] + "</td>";
	row += "<td class='clickable' onclick='removeParticipant(\"" + participant["id"] + "\",\"" + participant["nickname"] + "\")'><span class='glyphicon glyphicon-trash'></span></td>";
	row += "<td class='clickable' onclick='openEditParticipantDialog(\"" + participant["nickname"] + "\")'><span class='glyphicon glyphicon-pencil'></span></td>";
	row += "<td>" + participant["name"] + "</td>";
	row += "<td>" + participant["firstname"] + "</td>";
	row += "<td>" + participant["email"] + "</td>";
	row += "<td>" + participant["birthday"] + "</td>";
	row += "</tr>";

	$("#participant_tbody").append(row);
}

function addParticipantColumnInPot(participant) {
	addUserConsumptionHeader(participant);
	for (var i = 0; i < products.length; i++) {
		// könnte das mit prototype gehen
		products[i][participant["nickname"]] = 0.0;
		addUserConsumptionColumn(participant, products[i]);
	}
}

function addUserRowToItemForm(participant, scope) {
	$("#" + scope + "_item_participants_consumptions").append(getUserConsumptionRow(participant, scope));
}

function getUserConsumptionRow(participant, scope) {
	var row = "<div class='form-group' id='" + scope + "_item_" + participant["nickname"] + "_percentage_div'>";
	row += "<label class='control-label col-sm-2' for='" + scope + "_item_" + participant["nickname"] + "_percentage'>" + participant["nickname"] + "</label>";
	row += "<div class='percentageDiv col-sm-5'><div class='percentageDiv col-sm-4'>";
	row	+= "<input type='text' class='form-control' id='" + scope + "_item_" + participant["nickname"] + "_percentage' />";
	row += "</div><label class='control-label col-sm-1'> %</label></div>";
	row += "<span class='help-block col-sm-5' id='" + scope + "_item_" + participant["nickname"] + "_percentage_error'></span>";
	row += "</div>";
	
	return row;
}

function addUserToSelectInItemForm(participant, scope) {
	var option = "<option value='" + participant["nickname"] + "' id='" + scope + "_item_option_" + participant["nickname"] + "'>" + participant["nickname"] + "</option>";
	$("#" + scope + "_item_buyer").append(option);
}

function openEditParticipantDialog(nickname) {
	var user = getUserByNickname(nickname);
	fillEditParticipantForm(user);
	$("#editParticipantFormDiv").modal("show");
}

function closeEditparticipantDialog() {
	clearForm("editParticipantForm");
	$("#editParticipantFormDiv").modal("hide");
}

function fillEditParticipantForm(user) {
	$("#edit_participant_id").val(user["id"]);
	$("#edit_participant_nickname").html(user["nickname"]);
	$("#edit_participant_name").val(user["name"]);
	$("#edit_participant_firstname").val(user["firstname"]);
	$("#edit_participant_email").val(user["email"]);
	$("#edit_participant_birthday_picker").val(user["birthday"]);
}

function editParticipant(id, nickname, name, firstname, email, birthday) {
	var request = $.ajax({
		type: "POST",
		data: {
			action: "editParticipant",
			id: id, 
			nickname: nickname,
			name: name,
			firstname: firstname,
			email: email,
			birthday: birthday
		},
		beforeSend: function(x) {
			if(x && x.overrideMimeType) {
				x.overrideMimeType("application/json;charset=UTF-8");
			}
		},
		url: 'actions.php'
	});

	request.done(function(data) {
		if (data.success) {			
			editParticipantInUserList(data.id, data.nickname, data.name, data.firstname, data.email, data.birthday);

			$("#successText").html(data.message);
			$("#successDiv").show().delay(5000).fadeOut();
		} else {
			$("#errorText").html(data.message);
			$("#errorDiv").show().delay(10000).fadeOut();
		}
	});
	request.fail(function(jqXHR, textStatus) {
		alert( "Request failed: " + textStatus );
	});
}

function editParticipantInUserList(id, nickname, name, firstname, email, birthday) {
	var participant = getUserByNickname(nickname);
	participant["name"] = name;
	$("#" + id + " td:nth-child(4)").text(name);
	participant["firstname"] = firstname;
	$("#" + id + " td:nth-child(5)").text(firstname);
	participant["email"] = email;
	$("#" + id + " td:nth-child(6)").text(email);
	participant["birthday"] = birthday;
	$("#" + id + " td:nth-child(7)").text(birthday);
}

function removeParticipant(id, nickname) {
	var request = $.ajax({
		type: "POST",
		data: {
			action: "removeParticipant",
			id: id, 
			nickname: nickname,
			potId: pot["id"]
		},
		beforeSend: function(x) {
			if(x && x.overrideMimeType) {
				x.overrideMimeType("application/json;charset=UTF-8");
			}
		},
		url: 'actions.php'
	});

	request.done(function(data) {
		if (data.success) {			
			removeParticipantFromUserList(data.id);
			removeParticipantColumnFromPot(data.nickname);
			removeUserRowInItemForm(data.nickname, "add");
			removeUserRowInItemForm(data.nickname, "edit");
			removeUserInSelectInItemForm(data.nickname, "add");
			removeUserInSelectInItemForm(data.nickname, "edit");

			$("#successText").html(data.message);
			$("#successDiv").show().delay(5000).fadeOut();
		} else {
			$("#errorText").html(data.message);
			$("#errorDiv").show().delay(10000).fadeOut();
		}
	});
	request.fail(function(jqXHR, textStatus) {
		alert( "Request failed: " + textStatus );
	});
}

function removeParticipantFromUserList(id) {
	$("#" + id).remove();
}

function removeParticipantColumnFromPot(nickname) {
	var participantHeaderCell = $("#column_" + nickname);
	var participantHeaderCellPosition = participantHeaderCell.parent().children().index(participantHeaderCell);
	$("#expense_table thead tr").each(function() {
		$(this).find('td').eq(participantHeaderCellPosition).remove();	
		$(this).find('th').eq(participantHeaderCellPosition).remove();
	});
	$("#expense_table tbody tr").each(function() {
		$(this).find('td').eq(participantHeaderCellPosition).remove();
		$(this).find('th').eq(participantHeaderCellPosition).remove();
	});
	$("#expense_table tfoot tr").each(function() {
		$(this).find('td').eq(participantHeaderCellPosition - 4).remove();
		$(this).find('th').eq(participantHeaderCellPosition - 4).remove();
	});
}

function removeUserRowInItemForm(nickname, scope) {
	$("#" + scope + "_item_" + nickname + "_percentage_div").remove();
}

function removeUserInSelectInItemForm(nickname, scope) {
	$("#" + scope + "_item_option_" + nickname).remove();
}