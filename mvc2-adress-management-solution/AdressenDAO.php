<?php
class AdressenDAO {
	private $daten = array(
    );
	
	public function __construct() {
        $this->erzeugeAdresse(
            new Adresse("Singer, Georg", "12345", "Beispielhausen"));
        $this->erzeugeAdresse(
            new Adresse("Coder, Codie", "54321", "Sourcetown"));  
	}

	public function gibAdressenZuFilter($name, $plz, $ort, $sortierung) {
		return $this->daten;
	}
	
	public function gibAdresseZuName($name) {
		return $this->daten[$name];
	}
	
	public function loescheAdresse($name) {
		unset($this->daten[$name]);
	}
	
	public function erzeugeAdresse($adresse) {
		$this->daten[$adresse->getName()] = $adresse;
	}
	
	public function aendereAdresse($adresse) {
		$adr = $this->daten[$adresse->getName()];
		if (isset($adr)) {
			$adr->setPlz($adresse->getPlz());
			$adr->setOrt($adresse->getOrt());
		}
	}
}
?>