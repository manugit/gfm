$(document).ready(function() {
	$("#birthday_picker").datepicker({
		changeMonth: true,
		changeYear: true,
		maxDate: 0,
		yearRange: "1913:2014"
	});
	$("#validFrom").datepicker({
		changeMonth: true,
        onSelect: function(selected) {
        	$("#validTo").datepicker("option","minDate", selected)
        }
	});
	$("#validTo").datepicker({
		changeMonth: true,
        onSelect: function(selected) {
        	$("#validFrom").datepicker("option","maxDate", selected)
        }
	});
});

function showWellcomeScreen() {
	$("#potcreation").hide();
	$("#wellcome").show();
}

function checkNewPot() {
	var valid = true;
	if (!checkLength($("#potname"), 3, 32)) {
		valid = false;
		$("#potname_div").addClass("has-error");
		$("#potname_error").html("Die L&auml;nge des Potnamens muss zwischen 3 und 32 sein.");
	} else {
		$("#potname_div").removeClass("has-error");
		$("#potname_error").html("");
	}
	if (!checkLength($("#potdescription"), 3, 256)) {
		valid = false;
		$("#potdescription_div").addClass("has-error");
		$("#potdescription_error").html("Die L&auml;nge der Potbeschreibung muss zwischen 3 und 256 sein.");
	} else {
		$("#potdescription_div").removeClass("has-error");
		$("#potdescription_error").html("");
	}
	if (!isValidDate($("#validFrom").val())) {
		valid = false;
		$("#validFrom_div").addClass("has-error");
		$("#validFrom_error").html("Kein valides Datum (Format: DD.MM.YYYY)");
	} else {
		$("#validFrom_div").removeClass("has-error");
		$("#validFrom_error").html("");
	}
	if (!isValidDate($("#validTo").val())) {
		valid = false;
		$("#validTo_div").addClass("has-error");
		$("#validTo_error").html("Kein valides Datum (Format: DD.MM.YYYY)");
	} else if (!isDateOneBeforDateTwo(convertStringToDate($("#validFrom").val()), convertStringToDate($("#validTo").val()))) {
		valid = false;
		$("#validTo_div").addClass("has-error");
		$("#validTo_error").html("Das Bis-Datum darf nicht vor dem Von-Datum sein.");
	} else {
		$("#validTo_div").removeClass("has-error");
		$("#validTo_error").html("");
	}
	if (!checkLength($("#nickname"), 3, 32)) {
		valid = false;
		$("#nickname_div").addClass("has-error");
		$("#nickname_error").html("Die L&auml;nge des Nicknamen muss zwischen 3 und 32 sein.");
	} else {
		$("#nickname_div").removeClass("has-error");
		$("#nickname_error").html("");
	}
	if (!checkLength($("#name"), 3, 32)) {
		valid = false;
		$("#name_div").addClass("has-error");
		$("#name_error").html("Die L&auml;nge des Namen muss zwischen 3 und 32 sein.");
	} else {
		$("#name_div").removeClass("has-error");
		$("#name_error").html("");
	}
	if (!checkLength($("#firstname"), 3, 32)) {
		valid = false;
		$("#firstname_div").addClass("has-error");
		$("#firstname_error").html("Die L&auml;nge des Vornamen muss zwischen 3 und 32 sein.");
	} else {
		$("#firstname_div").removeClass("has-error");
		$("#firstname_error").html("");
	}
	if (!checkRegexp($("#email"), /\w+@\w+\.\w+/)) {
		valid = false;
		$("#email_div").addClass("has-error");
		$("#email_error").html("Keine valide E-Mail-Adresse (z.B.: hans@muster.ch)");
	} else {
		$("#email_div").removeClass("has-error");
		$("#email_error").html("");
	}
	if (!isValidDate($("#birthday_picker").val())) {
		valid = false;
		$("#birthday_div").addClass("has-error");
		$("#birthday_error").html("Kein valides Datum (Format: DD.MM.YYYY)");
	} else if (!isDateOneBeforDateTwo(convertStringToDate($("#birthday_picker").val()), new Date())) {
		valid = false;
		$("#birthday_div").addClass("has-error");
		$("#birthday_error").html("Das Datum muss vor heute sein.");
	} else {
		$("#birthday_div").removeClass("has-error");
		$("#birthday_error").html("");
	}
	if (valid) {
		addPot($("#potname").val(), $("#potdescription").val(), $("#validFrom").val(), $("#validTo").val(), $("#nickname").val(), $("#name").val(), $("#firstname").val(), $("#email").val(), $("#birthday_picker").val())
	}
}

function addPot(potname, potdescription, validFrom, validTo, nickname, name, firstname, email, birthday) {
	var request = $.ajax({
		type: "POST",
		data: {
			action: "addPot",
			potname: potname,
			potdescription: potdescription,
			validFrom: validFrom,
			validTo: validTo,
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
			$("#wellcome").hide();
			$("#potcreation").show();
			$("#link_to_new_pot").attr("href", "/gfm/" + data.urlHash + "/overview");
			$("#wholeURL").html("http://" + data.server + "/gfm/" + data.urlHash + "/overview")
			
			$("#addPotForm").find("input[type=text], textarea").val("");
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