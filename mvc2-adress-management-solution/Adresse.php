<?php
class Adresse {
	private $name;
	private $plz;
	private $ort;
	
	function __construct($name, $plz, $ort) {
		$this->name = $name;
		$this->plz = $plz;
		$this->ort = $ort;
	}
	
	function pruefe() {
		$meldung = "ok";

		if (!isset($this->name) || $this->name == "") {
			$meldung = "Der Name darf nicht leer sein!";
		} else if ($this->plz == "") {
			$meldung = "Die Postleitzahl darf nicht leer sein!";
		} else if ($this->ort == "") {
			$meldung = "Der Ort darf nicht leer sein!";
		}
        if (!is_numeric($this->plz) || $this->plz <= 0) {
            $meldung = "Die Postleitzahl muss eine Zahl > 0 sein!";
        }
        
		if ($meldung != "ok")
			throw new Exception($meldung);
	}
	
	function getName() {
		return $this->name;
	}
	function getPlz() {
		return $this->plz;
	}
	function getOrt() {
		return $this->ort;
	}
	function setPlz($plz) {
		$this->plz = $plz;
	}
	function setOrt($ort) {
		$this->ort = $ort;
	}
}
?>