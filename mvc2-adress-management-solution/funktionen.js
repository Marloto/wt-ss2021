function behandleButton(formular, aktion) {
	if (aktion == '' && !adresseSelektiert()) {
		alert('Bitte wählen Sie eine Adresse aus!');
	} else {
		document.getElementById("aktion").value = aktion;
		document.forms[formular].submit();
	}
}

function behandleLoeschenButton(aktion) {
	if (!adresseSelektiert()) {
		alert('Bitte wählen Sie eine Adresse aus!');
	} else {
		var ok = confirm("Wirklich löschen?");
		
		if (ok) {
			document.getElementById("aktion").value = aktion;
			document.forms['formular'].submit();
		}
	}
}

// Liefert true, falls eine Adresse selektiert wurde
function adresseSelektiert() {
	var ergebnis = false; // nichts selektiert
	var name = localStorage.selekierterName;

	ergebnis = (name !== undefined);

	return ergebnis;
}

// speichert den gewählten Namen im localstorage, 
// Parameter ist das selektierte RadioButton-Element
function behandleSelektion(radio) {
	localStorage.selekierterName = radio.value;
}

// löscht den selektierten Namen aus dem Local Storage 	
function selektiertenNamenZurücksetzen() {
	localStorage.removeItem('selekierterName');
}