$(document).ready(function() {
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
});

//TODO validate Methods
function checkLength(object, min, max ) {
	return !(object.val().length < min || object.val().length > max);
}

function checkRegexp(object, regexp) {
	return regexp.test(object.val());
}

function isValidDate(dateString)
{
	var matches = /^(\d{2})[\.](\d{2})[\.](\d{4})$/.exec(dateString);
    if (matches == null) {
    	return false;
    }
    var d = matches[1];
    var m = matches[2] - 1;
    var y = matches[3];
    var composedDate = new Date(y, m, d);
    return composedDate.getDate() == d &&
            composedDate.getMonth() == m &&
            composedDate.getFullYear() == y;
}

function isDateOneBeforDateTwo(dateOne, dateTwo) {
	return dateOne < dateTwo;
}

function convertStringToDate(dateString) {
	var matches = /^(\d{2})[\.](\d{2})[\.](\d{4})$/.exec(dateString);
	if (matches == null) {
    	return new Date();
    }
    var d = matches[1];
    var m = matches[2] - 1;
    var y = matches[3];
    return new Date(y, m, d);
}

/*
//examples
checkLength( name, "username", 3, 16 );
checkLength( email, "email", 6, 80 );
checkLength( password, "password", 5, 16 );
checkRegexp( name, /^[a-z]([0-9a-z_])+$/i, "Username may consist of a-z, 0-9, underscores, begin with a letter." );
checkRegexp( email, /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i, "eg. ui@jquery.com" );
checkRegexp( password, /^([0-9a-zA-Z])+$/, "Password field only allow : a-z 0-9" );
*/