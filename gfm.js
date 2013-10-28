//TODO temp variable
var usercount = 5;
var rowcount = 2;

$(document).ready(function() {
	for (var i = 0; i < products.length; i++) {
		getUserByName(products[i]["buyer"])["pay"] += parseFloat(products[i]["price"]);
	}
	
	addUserHeader();
	addUserConsumptions();
	addUserSummaries();
	
	$("#sortable").sortable({
		placeholder : "ui-state-highlight",
		cursor: "move",
		delay: "200",
		opacity: 0.8,
		revert: true,
		update: function(event, ui) {
			alert($(this).sortable('serialize'));
		}
	});
	$("#sortable").disableSelection();
	$(document).tooltip();
	$.datepicker.regional['de'] = {clearText: 'l&ouml;schen', clearStatus: 'aktuelles Datum l&ouml;schen',
            closeText: 'schliessen', closeStatus: 'ohne &Auml;nderungen schliessen',
            prevText: '<zur&uuml;ck', prevStatus: 'letzten Monat zeigen',
            nextText: 'Vor>', nextStatus: 'n&auml;chsten Monat zeigen',
            currentText: 'heute', currentStatus: '',
            monthNames: ['Januar','Februar','M&auml;rz','April','Mai','Juni',
            'Juli','August','September','Oktober','November','Dezember'],
            monthNamesShort: ['Jan','Feb','M&auml;r','Apr','Mai','Jun',
            'Jul','Aug','Sep','Okt','Nov','Dez'],
            monthStatus: 'anderen Monat anzeigen', yearStatus: 'anderes Jahr anzeigen',
            weekHeader: 'Wo', weekStatus: 'Woche des Monats',
            dayNames: ['Sonntag','Montag','Dienstag','Mittwoch','Donnerstag','Freitag','Samstag'],
            dayNamesShort: ['So','Mo','Di','Mi','Do','Fr','Sa'],
            dayNamesMin: ['So','Mo','Di','Mi','Do','Fr','Sa'],
            dayStatus: 'Setze DD als ersten Wochentag', dateStatus: 'W&auml;hle D, M d',
            dateFormat: 'dd.mm.yy', firstDay: 1, 
            initStatus: 'W&auml;hle ein Datum', isRTL: false};
    $.datepicker.setDefaults($.datepicker.regional['de']);
	$("#birthday_picker").datepicker({
		changeMonth: true,
		changeYear: true,
		maxDate: 0,
		yearRange: "1913:2014"
	});
	$("#add_item_date_picker").datepicker({
		changeMonth: true,
		maxDate: 0
	});
	
	$("#add_item_buyer").prop("selectedIndex", -1);
	$("#edit_item_buyer").prop("selectedIndex", -1);
});

function displayPage(displayedPage, itemId) {
	if (typeof displayedPage === "undefined") {
		displayedPage = "pot_page";
	}
	
	$("#pot_page").hide();
	$("#addItem_page").hide();
	$("#editItem_page").hide();
	$("#participant_page").hide();
	
	$("#" + displayedPage).show();
	if ("pot_page" == displayedPage) {
		window.history.pushState("object or string", displayedPage, "/gfm/" + pot["url"] + "/overview");
	} else if ("addItem_page" == displayedPage) {
		window.history.pushState("object or string", displayedPage, "/gfm/" + pot["url"] + "/item/add");
	} else if ("editItem_page" == displayedPage) {
		window.history.pushState("object or string", displayedPage, "/gfm/" + pot["url"] + "/item/edit/" + itemId);
	} else if ("participant_page" == displayedPage) {
		window.history.pushState("object or string", displayedPage, "/gfm/" + pot["url"] + "/participant");
	}
}

function displayEditItemPage(rowId) {
	fillEditForm(products[getProductIndexFromRowId(rowId)]);
	displayPage("editItem_page");
}

function fillEditForm(product) {
	$("#editItemForm input[name=id]").val(product["rowId"]);
	$("#editItemForm input[name=name]").val(product["name"]);
	$("#editItemForm input[name=amount]").val(product["price"]);
	$("#editItemForm input[name=date]").val(product["date"]);
	$("#editItemForm select[name=buyer]").val(product["buyer"]);
	
	for (var i = 0; i < users.length; i++) {
		$("#edit_item_" + users[i]["name"] + "_percentage").val(100 * product[users[i]["name"]]);
	}
}

function getUserByName(username) {
	for (var i = 0; i < users.length; i++) {
		if (users[i]["name"] == username) {
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
	var userColumn = "<th>" + user["name"] + "</th>";
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
	row += "<td>" + product["date"] + "</td>";
	row += "<td class='clickable' onclick='removeEntry(\"" + product["rowId"] + "\")'>X</td>";
	row += "<td onclick='displayEditItemPage(\"" + product["rowId"] + "\")'>E</td>";
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
	var userColumn = "<td";
	var part = product[user["name"]];
	if (0 < part) {
		userColumn += ' class="tooltipable"';
		var use = roundToRap(product["price"] * part);
		user["use"] += product["price"] * part;
		userColumn += ' title="CHF ' + use + ' (' + (part * 100) + '%)"';
		userColumn += ">Ja";
	} else {
		userColumn += ">Nein";
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
	var payCell = '<td id="sum_pay_' + user["name"] + '">' + pay + "</td>";
	$("#sum_pay").append(payCell);
	var useCell = '<td id="sum_use_' + user["name"] + '">' + use + "</td>";
	$("#sum_use").append(useCell);
	var diffCell = '<th id="sum_diff_' + user["name"] + '"';
	if (0 > diff) {
		diffCell += ' class="negative"';
	} else if (0 < diff) {
		diffCell += ' class="positive"';
	}
	diffCell += ">" + diff + "</th>";
	$("#sum_diff").append(diffCell);
}

function checkNewItem(form) {
	var consumptions = getConsumption("add");
	if (checkItem(form, consumptions)) {
		addItem(form.name.value, form.amount.value, form.date.value, form.buyer.value, consumptions);
	}
}

function checkEditItem(form) {
	var consumptions = getConsumption("edit");
	if (checkItem(form, consumptions)) {
		editItem(form.id.value, form.name.value, form.amount.value, form.date.value, form.buyer.value, consumptions);
	}
}

function checkItem(form, consumptions) {
	var valid = true;
	if (form.name.value == "") {
		valid = false;
		$("#name_error").html("Bitte einen Namen eingeben.");
	} else {
		$("#name_error").html("");
	}
	if (form.amount.value == "") {
		valid = false;
		$("#amount_error").html("Bitte einen Betrag eingeben.");
	} else {
		$("#amount_error").html("");
	}
	if (form.date.value == "") {
		valid = false;
		$("#date_error").html("Bitte ein valides Datum eingeben.");
	} else {
		$("#date_error").html("");
	}
	if (form.buyer.selectedIndex == -1) {
		valid = false;
		$("#buyer_error").html("Bitte einen Zahler ausw&auml;hlen.");
	} else {
		$("#buyer_error").html("");
	}
	if (!validateConsumption(consumptions)) {
		valid = false;
		$("#add_item_error").html("Die Anteile m&uuml;ssen zusammen 100% ergeben.");
	} else {
		$("#add_item_error").html("");
	}
	return valid;
}

function getConsumption(scope) {
	var consumptions = [];
	for (var i = 0; i < users.length; i++) {
		consumptions.push([users[i]["name"], $("#" + scope + "_item_" + users[i]["name"] + "_percentage").val()]);
	}
	return consumptions;
}

function validateConsumption(consumptions) {
	// TODO check if numbers and sum = 1
	return true;
}

function addItem(name, amount, date, buyer, consumptions) {
	// TODO add item in db and get id
	var id = "row_" + rowcount++;
	var newProduct = {
			"rowId"	: id,
			"name"	: name,
			"price"	: amount,
			"date"	: date,
			"buyer"	: buyer,
	}
	for (var i = 0; i < consumptions.length; i++) {
		newProduct[consumptions[i][0]] = consumptions[i][1]/100;
	}
	products.push(newProduct);
	getUserByName(newProduct["buyer"])["pay"] += parseFloat(newProduct["price"]);
	
	addProductColumns(newProduct, true);
	for (var i = 0; i < users.length; i++) {
		addUserConsumptionColumn(users[i], newProduct);
	}
	updateSumValues();
	clearItemFormAndReturn("add");
}

function editItem(id, name, amount, date, buyer, consumptions) {
	// TODO edit item in db
	var editProduct = {
			"rowId"	: id,
			"name"	: name,
			"price"	: amount,
			"date"	: date,
			"buyer"	: buyer,
	}
	for (var i = 0; i < consumptions.length; i++) {
		editProduct[consumptions[i][0]] = consumptions[i][1]/100;
	}
	var index = getProductIndexFromRowId(id);
	var oldProduct = products[index];
	products[index] = editProduct;
	getUserByName(oldProduct["buyer"])["pay"] -= parseFloat(oldProduct["price"]);
	getUserByName(editProduct["buyer"])["pay"] += parseFloat(editProduct["price"]);
	
	$("#" + id).empty();
	addProductColumns(editProduct, false);
	for (var i = 0; i < users.length; i++) {
		users[i]["use"] -= oldProduct["price"] * oldProduct[users[i]["name"]];
		addUserConsumptionColumn(users[i], editProduct);
	}
	updateSumValues();
	clearItemFormAndReturn("edit");
}

function updateSumValues() {
	for (var i = 0; i < users.length; i++) {
		var pay = roundToRap(users[i]["pay"]);
		var use = roundToRap(users[i]["use"]);
		var diff = roundToRap(pay - use);
		$("#sum_pay_" + users[i]["name"]).text(pay);
		$("#sum_use_" + users[i]["name"]).text(use);
		$("#sum_diff_" + users[i]["name"]).text(diff);
		$("#sum_diff_" + users[i]["name"]).removeClass("negative")
		$("#sum_diff_" + users[i]["name"]).removeClass("positive");
		if (0 > diff) {
			$("#sum_diff_" + users[i]["name"]).addClass("negative");
		} else if (0 < diff) {
			$("#sum_diff_" + users[i]["name"]).addClass("positive");
		}
	}
}

function removeEntry(rowId) {
	//TODO ajax db call
	var indexToProductToDelete = getProductIndexFromRowId(rowId);
	var productToDelete = products[indexToProductToDelete];
	products.splice(indexToProductToDelete, 1);
	getUserByName(productToDelete["buyer"])["pay"] -= productToDelete["price"];
	for (var i = 0; i < users.length; i++) {
		var part = productToDelete[users[i]["name"]];
		users[i]["use"] -= productToDelete["price"] * part;
	}
	$("#" + rowId).remove();
	updateSumValues();
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
		userDiffArray.push([users[i]["name"], parseFloat(roundToRap(users[i]["pay"] - users[i]["use"]))]);
	}
	return userDiffArray;
}

function removeParticipantFromPot(userId) {
	// TODO check if user is needed, only delete if not needed
}

function checkNewParticipant(form) {
	var valid = true;
	if (form.name.value == "") {
		valid = false;
		$("#name_error").html("Bitte einen Namen eingeben.");
	} else {
		$("#name_error").html("");
	}
	if (form.firstname.value == "") {
		valid = false;
		$("#firstname_error").html("Bitte einen Vornamen eingeben.");
	} else {
		$("#firstname_error").html("");
	}
	if (form.email.value == "") {
		valid = false;
		$("#email_error").html("Bitte eine valide Emailadresse eingeben.");
	} else {
		$("#email_error").html("");
	}
	if (form.birthday.value == "") {
		valid = false;
		$("#birthday_error").html("Bitte ein valides Datum eingeben.");
	} else {
		$("#birthday_error").html("");
	}
	if (valid) {
		addParticipant(form.name.value, form.firstname.value, form.email.value, form.birthday.value)
	}
}

function addParticipant(name, firstname, email, birthday) {
	// TODO add user in db and get id
	var id = usercount++;
	var newParticipant = {
			"id"		: id,
			"name"		: name,
			"firstname"	: firstname,
			"email"		: email,
			"birthday"	: birthday,
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
}

function addParticipantToUserList(participant) {
	var row = "<tr id='" + participant["id"] + "'>";
	row += "<td>" + participant["name"] + "</td>";
	row += "<td class='clickable' onclick='removeParticipantFromPot(\"" + participant["id"] + "\")'>X</td>";
	row += "<td>E</td>";
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
		products[i][participant["name"]] = 0.0;
		addUserConsumptionColumn(participant, products[i]);
	}
}

function addUserRowToItemForm(participant, scope) {
	$("#" + scope + "_item_tbody").append(getUserItemRow(participant, scope));
}

function getUserItemRow(participant, scope) {
	var row = "<tr id='" + scope + "_item_" + participant["name"] + "'>";
	row += "<td>&nbsp;</td>";
	row += "<td>" + participant["name"] + "<div class='percentageDiv'><input type='text' name='" + scope + "_item_" + participant["name"] + "_percentage' id='" + scope + "_item_" + participant["name"] + "_percentage' /> %</div></td>";
	row += "<td>&nbsp;</td>";
	row += "</tr>";
	return row;
}

function addUserToSelectInItemForm(participant, scope) {
	var option = "<option value='" + participant["name"] + "' id='" + scope + "_item_option_" + participant["name"] + "'>" + participant["name"] + "</option>";
	$("#" + scope + "_item_buyer").append(option);
}

function clearParticipantFormAndReturn() {
	clearForm("addParticipantForm");
	displayPage("pot_page");
}

function clearItemFormAndReturn(scope) {
	clearForm(scope + "ItemForm");
	$("#" + scope + "_item_buyer").prop("selectedIndex", -1);
	displayPage("pot_page");
}

function clearForm(formId) {
	$("#" + formId).find("input[type=text], textarea").val("");
}