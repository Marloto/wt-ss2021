<?php
class Controller {
	public function __construct() {
	}	
	
	public function filterAnzeigen() {
		$dialog = new AdressenSuchenDialog();
		$dialog->filterAnzeigen();
	}
	
	public function suchen($onload) {
		$dialog = new AdressenSuchenDialog();
		$dialog->ergebnisseAnzeigen($onload);
	}
	
	public function neueAdresseAnlegen() {
		$dialog = new AdresseAnlegenDialog(true);
		$dialog->anzeigen("");
	}
	
	public function neueAdresseSpeichern() {
		try {
			$adr = new Adresse(
				$_POST['nameNeu'], 
				$_POST['plzNeu'], 
				$_POST['ortNeu'] 
			);
			$adr->pruefe();
			$_SESSION['adressenDAO']->erzeugeAdresse($adr);
			$this->suchen("");
		} catch (Exception $e) {
			$onload = "onload='alert(\"".$e->getMessage()."\");'";
			$dialog = new AdresseAnlegenDialog(true);
			$dialog->anzeigen($onload);
		}
	}
	
	public function adresseBearbeiten() {
		if (!isset($_POST['auswahl'])) {
			$this->suchen("onload=\"alert('Bitte wählen Sie eine Adresse aus!')\"");
		} else {
			$dialog = new AdresseAnlegenDialog(false);
			$dialog->anzeigen("");
		}
	}
	
	public function adressBearbeitungSpeichern() {
		try {
			$adr = new Adresse(
				$_POST['nameNeu'], 
				$_POST['plzNeu'], 
				$_POST['ortNeu'] 
			);
			$adr->pruefe();
			$_SESSION['adressenDAO']->aendereAdresse($adr);
			$this->suchen("onload='\"Adresse geändert!\");'");
		} catch (Exception $e) {
			$onload = "onload='alert(\"".$e->getMessage()."\");'";
			$dialog = new AdresseAnlegenDialog(false);
			$dialog->anzeigen($onload);
		}		
	}
	
	public function adresseLoeschen() {
		if (!isset($_POST['auswahl'])) {
			$this->suchen("onload=\"'Bitte wählen Sie eine Adresse aus!')\"");
		} else {
            $auswahl = $_POST['auswahl'];
			$_SESSION['adressenDAO']->loescheAdresse($auswahl);
			$this->suchen("");
		}
	}

	public function run() {
        if (!isset($_POST['aktion']))
			$aktion = 'filterAnzeigen';
        else
            $aktion = $_POST['aktion'];

        switch ($aktion) {
			case 'filterAnzeigen':
				$this->filterAnzeigen();
				break;
			case 'suchen':
				$this->suchen("");
				break;
			case 'neueAdresseAnlegen':
				$this->neueAdresseAnlegen();
				break;
			case 'adresseBearbeiten':
				$this->adresseBearbeiten();
				break;
			case 'adresseLoeschen':
				$this->adresseLoeschen();
				break;
			case 'neueAdresseSpeichern':
				$this->neueAdresseSpeichern();
				break;
			case 'adressBearbeitungSpeichern':
				$this->adressBearbeitungSpeichern();
				break;
			default:
				echo "Fehler: Aktion $aktion ist ung�ltig!";
				break;
		}
	}
}
?>