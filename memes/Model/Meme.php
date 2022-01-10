<?php
namespace Model;

use JsonSerializable;

class Meme implements JsonSerializable {
    private $memeUrl;
    private $upperText;
    private $lowerText;
    private $id;

    public function __construct($id = null, $memeUrl = null, $upperText = null, $lowerText = null) {
        $this->id = $id;
        $this->memeUrl = $memeUrl;
        $this->upperText = $upperText;
        $this->lowerText = $lowerText;
    }

    public function getId() {
        return $this->id;
    }

    public function getMemeUrl() {
        return $this->memeUrl;
    }

    public function getLowerText() {
        return $this->lowerText;
    }

    public function getUpperText() {
        return $this->upperText;
    }

    public function setMemeUrl($value) {
        $this->memeUrl = $value;
    }

    public function setLowerText($value) {
        $this->lowerText = $value;
    }

    public function setUpperText($value) {
        $this->upperText = $value;
    }

    public function jsonSerialize() { 
        return get_object_vars($this);
    }

    public static function fromJson($data){
        $user = new Meme();
        foreach ($data as $key => $value) {
            $user->{$key}  = $value;
        }
        return $user;
    }
}