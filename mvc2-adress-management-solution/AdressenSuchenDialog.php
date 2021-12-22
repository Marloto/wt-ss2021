<?php
class AdressenSuchenDialog {
	private $name = "";
	private $plz = 0;
	private $ort = "";
	private $sortierung = "";

	public function __construct() {
        if (!isset($_POST['name'])) {
            $_POST['name'] = "";
            $_POST['plz'] = "";
            $_POST['ort'] = "";
            $_POST['sortierung'] = "";
        }
		$this->name = $_POST['name'];
		$this->plz = $_POST['plz'];
		$this->ort = $_POST['ort'];
		$this->sortierung = $_POST['sortierung'];
	}	
	
	public function filterAnzeigen() {
		$this->filterAnzeigenIntern(true, "");
	}
	
	public function filterAnzeigenIntern($finish, $onload) {
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Adressen suchen</title>
		<meta charset="utf-8">
		<script src="funktionen.js" type="text/javascript"></script>
		<script>
			selektiertenNamenZurücksetzen();
		</script>
	</head>
	<body <?php echo $onload; ?>>
		<form method="post" action="index.php" name="formular">
			<input type="hidden" id="aktion" name="aktion" value="suchen">
			<fieldset>
				<legend>Filter</legend>
				<table>
				<tr>
					<td>Name</td>
					<td><input type="text" name="name" value="<?php echo $this->name; ?>"></td>
					<td>Postleitzahl</td>
					<td><input type="text" name="plz" value="<?php echo $this->plz; ?>"></td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Ort</td>
					<td><input type="text" name="ort" value="<?php echo $this->ort; ?>"></td>
					<td>Sortierung</td>
					<td>
						<select name="sortierung">
							<option value="sortName"
<?php
							if ($this->sortierung == 'sortName') {
								echo "selected";
							}
?>
							>Name</option>
							<option value="sortPlz"
<?php
							if ($this->sortierung == 'sortPlz') {
								echo "selected";
							}
?>
							>PLZ</option>
							<option value="sortOrt"
<?php
							if ($this->sortierung == 'sortOrt') {
								echo "selected";
							}
?>
							>Ort</option>
						</select>
					</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td colspan="4">&nbsp;</td>
					<td><input name="suchenButton" type="submit" value="suchen"></td>
				</tr>
			</table>
		</fieldset>
<?php
		if ($finish) {
?>
	</form></body></html>
<?php
		}
	}
	
	public function ergebnisseAnzeigen($onload) {
		$liste = $_SESSION['adressenDAO']->gibAdressenZuFilter(
            $this->name, $this->plz, $this->ort, $this->sortierung);
		$this->filterAnzeigenIntern(false, $onload);
?>
		<fieldset>
			<legend>Suchergebnisse</legend>
		<input type="button" value="Neueintrag" onclick="behandleButton('formular', 'neueAdresseAnlegen');">
		<input type="button" value="Bearbeiten" onclick="behandleButton('formular', 'adresseBearbeiten');">
		<input type="button" value="Löschen" onclick="behandleLoeschenButton('adresseLoeschen');"><p></p>
		<table border="1" id="sucherergebnisse">
			<tr><td>&nbsp;</td><td>Name</td><td>PLZ</td><td>Ort</td></tr>
<?php
		foreach ($liste as $adresse) {
?>
			<tr>
				<td><input type="radio" name="auswahl" 
					value="<?php echo $adresse->getName(); ?>"
					onclick="behandleSelektion(this);">
				</td>
				<td><?php echo $adresse->getName(); ?></td>
				<td><?php echo $adresse->getPlz(); ?></td>
				<td><?php echo $adresse->getOrt(); ?></td>
			</tr>
<?php
		}
?>
		</table>
		</fieldset>
		</form>
		</body>
		</html>
<?php
	}
}
?>