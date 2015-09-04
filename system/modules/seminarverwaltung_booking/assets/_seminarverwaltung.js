/**
 * @copyright  Gerd Regnery 2011 - 2013
 * @author     Gerd Regnery <info@webdesign-impulse.de>
 * @package    Seminarverwaltung
 * @license    Commercial
 */


/**
 * Functions:
 *
 *    onChangeEventCat() - aktualisiert die Seminarselect.
 *                         ruft PHP: system/modules/seminarverwaltung/seminarselect.php?kategorie=...
 *    onChangeEvent()    - aktualisiert die Seminardaten.
 *                         ruft PHP: system/modules/seminarverwaltung/seminardaten.php?seminaridx=...
 *  
 * @copyright  Gerd Regnery 2011
 * @author     Gerd Regnery <info@webdesign-impulse.de>
 */
// Hauptfunktion für OnChange-Event beim SELECT "seminar"
function xmlhttp() {
    var xhr;
    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest(); // IE 7+, alle anderen Browser
    } else if (window.ActiveXObject) {
        xhr = new ActiveXObject("Microsoft.XMLHTTP"); // IE 5-6
    }
    return xhr;
}
//
var xhr = xmlhttp();
var rt;
//
function onChangeEvent() {
	// Voraussetzungen prüfen
	xhr.open("POST", "system/modules/seminarverwaltung_booking/classes/seminardaten.php", true);
	xhr.onreadystatechange = gibDatenAus;
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// Voraussetzungen prüfen
	if (document["seminarbuchung"] === null) {
		return false;
	}
	if (document["seminarbuchung"].elements['seminar'] === null) {
		return false;
	}
	// Selektierten Index merken
	var rt = jQuery('INPUT[name="REQUEST_TOKEN"]').val();
	var idx = document["seminarbuchung"].elements['seminar'].selectedIndex;
	// Optionswert auslesen
	var seminaridx = escape(document["seminarbuchung"].elements['seminar'].options[idx].value);
	// optionswert an PHP senden, um Seminartdaten zu erhalten
	xhr.send("seminaridx=" + seminaridx + "&REQUEST_TOKEN=" + rt);
}
function gibDatenAus() {
	if (xhr.readyState == 4) {
		var daten = eval("(" + xhr.responseText + ")");
		var seminaridx   = daten['seminaridx']	== null? "":daten['seminaridx'];
		var title        = daten['title']  		== null? "":daten['title'];
		var teaser       = daten['teaser']  	== null? "":daten['teaser'];
		var details      = daten['details']  	== null? "":daten['details'];
		var specials     = daten['specials']  	== null? "":daten['specials'];
		var location     = daten['location']  	== null? "":daten['location'];
		var duration     = daten['duration']  	== null? "":daten['duration'];
		var cost         = daten['cost']        == null? "":daten['cost'];
		var currency     = daten['currency']    == null? "":daten['currency'];
		var reducedcost  = daten['reducedcost'] == null? "":daten['reducedcost'];
		var eventidx     = daten['eventidx']  	== null? "":daten['eventidx'];
		var intern       = daten['intern']  	== null? "":daten['intern'];
		var evtDetails   = daten['evtDateils'] 	== null? "":daten['evtDateils'];
		var startDate    = daten['startDate'] 	== null? "":daten['startDate'];
		var endDate      = daten['endDate'] 	== null? "":daten['endDate'];
		var startTime    = daten['startTime'] 	== null? "":daten['startTime'];
		var endTime      = daten['endTime'] 	== null? "":daten['endTime'];
		jQuery('INPUT[name="REQUEST_TOKEN"]').val(rt);
		jQuery('INPUT[name="seminaridx"]').val(seminaridx);
		jQuery('INPUT[name="eventidx"]').val(eventidx);
		jQuery('#title').html(title);
		jQuery('#intern').html(intern);
		jQuery('#teaser').html(teaser);
		jQuery('#details').html(details);
		jQuery('#evtDetails').html(evtDetails);
		jQuery('#specials').html(specials);
		jQuery('#location').html(location);
		jQuery('#duration').html(duration);
		jQuery('#cost').html(cost);
		jQuery('#currency').html(currency);
		jQuery('#reducedcost').html(reducedcost);
		jQuery('#intern').html(intern);
		jQuery('#startDate').html(startDate);
		jQuery('#endDate').html(endDate);
		jQuery('#startTime').html(startTime);
		jQuery('#endTime').html(endTime);
		jQuery('.seminarinfo').show();
	}
}
function onChangeEventCat() {
	// Voraussetzungen prüfen
	xhr.open("POST", "system/modules/seminarverwaltung_booking/classes/seminarselect.php", true);
	xhr.onreadystatechange = gibDatenAusCat;
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	// Voraussetzungen prüfen
	if (document["seminarbuchung"] === null) {
		return false;
	}
	if (document["seminarbuchung"].elements['seminar_kategorie'] === null) {
		return false;
	}
	var rt = jQuery('INPUT[name="REQUEST_TOKEN"]').val();
	// Selektierten Index merken
	var idx = document["seminarbuchung"].elements['seminar_kategorie'].selectedIndex;
	// Optionswert auslesen
	var catidx = jQuery("select[name=seminar_kategorie] option:selected").val();
	//var catidx = jQuery("input[name=seminar_kategorie]:checked").val();
	// optionswert an PHP senden, um Seminartdaten zu erhalten
	xhr.send("kategorie=" + catidx + "&REQUEST_TOKEN=" + rt);

}
function gibDatenAusCat() {
	if (xhr.readyState == 4) {
		var daten = eval("(" + xhr.responseText + ")");
		jQuery('INPUT[name="REQUEST_TOKEN"]').val(rt);
		jQuery("select[name=seminar]").replaceWith(daten);
		jQuery('.seminarinfo').hide();
	}
}
