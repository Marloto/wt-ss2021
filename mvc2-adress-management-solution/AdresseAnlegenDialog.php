<?php
class AdresseAnlegenDialog {
	private $name = "";
	private $plz = 0;
	private $ort = "";
	private $neuAnlegen;
	
	public function __construct($neuAnlegen) {
		$this->neuAnlegen = $neuAnlegen;
	}	

	public function anzeigen($onload) {
		if ($this->neuAnlegen) {
			$titel = "Adresse anlegen";
			$aktion = "neueAdresseSpeichern";
			$nurLesen = "";
			if ($onload != "") { 
				// Aufruf nach Validierungsfehler
				$this->name = $_POST['nameNeu'];
				$this->plz = $_POST['plzNeu'];
				$this->ort = $_POST['ortNeu'];				
			}
		} else {
			$titel = "Adresse bearbeiten";
			$aktion = "adressBearbeitungSpeichern";
			$nurLesen = "readonly='true' style='background-color:lightgrey;'";
			if ($onload == "") { 
				// erster Aufruf
				$auswahl = $_POST['auswahl'];
				$adr = $_SESSION['adressenDAO']->gibAdresseZuName($auswahl);
				$this->name = $adr->getName();
				$this->plz = $adr->getPlz();
				$this->ort = $adr->getOrt();
			} else {
				// Aufruf nach Validierungsfehler
				$this->name = $_POST['nameNeu'];
				$this->plz = $_POST['plzNeu'];
				$this->ort = $_POST['ortNeu'];				
			}
		}
?>
<!DOCTYPE html>
<html>
	<head>
	<title><?php echo $titel; ?></title>
	<meta charset="utf-8">
	<script src="funktionen.js" type="text/javascript"></script>
	</head>
	<body <?php echo $onload; ?>>
		<form method="post" action="index.php" name="eingabeFormular">
			<input type="hidden" id="aktion" name="aktion" value="'.$aktion.'">
			<fieldset>
				<legend><?php echo $titel; ?></legend>
				<table>
					<tr>
						<td>Name</td>
						<td><input name="nameNeu" type="text" size="30" value="<?php echo $this->name; ?>" <?php echo $nurLesen; ?>></td>
					</tr>
					<tr>
						<td>PLZ</td>
						<td><input name="plzNeu" type="text" size="30" value="<?php echo $this->plz; ?>"></td>
					</tr>
					<tr>
						<td>Ort</td>
						<td><input name="ortNeu" type="text" size="30" value="<?php echo $this->ort; ?>"></td>
					</tr>
				</table>
				<br>
				<input type="button" value="abbrechen" onclick="behandleButton('eingabeFormular', 'suchen');">
				<input type="button" value="speichern" onclick="behandleButton('eingabeFormular', '<?php echo $aktion; ?>');">
			</fieldset>
		</form>
	</body>
</html>
<?php
	}
}
?>