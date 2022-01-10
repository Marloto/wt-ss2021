<?php 
/**
 * Data Access Object für Bestellungsobjekte
 */
class MemesDAO {
    private $memes;
    public function __construct() {
        $this->load();
    }

    public function load() {
        $this->memes = [];
        if(file_exists("data.json")) {
            $data = file_get_contents("data.json");
            $arr = json_decode($data);
            foreach($arr as $el) {
                $meme = Model\Meme::fromJson($el);
                $this->memes[$meme->getId()] = $meme;
            }
        }
    }

    public function save() {
        $data = json_encode($this->memes);
        file_put_contents("data.json", $data);
    }

    public function add($memeUrl, $upperText, $lowerText) {
        // find last Id
        $maxId = 0;
        foreach($this->memes as $meme) {
            $maxId = max($maxId, $meme->getId());
        }
        $id = $maxId + 1;
        $this->memes[$id] = new Model\Meme($id, $memeUrl, $upperText, $lowerText);
        $this->save();
    }

    public function list() {
        $list = [];
        foreach($this->memes as $meme) {
            $list[] = $meme;
        }
        return $list;
    }
    
    public function get($id) {
        if(!isset($this->memes[$id]))
            return null;
        return $this->memes[$id];
        
    }
    
    public function delete($id) {
        if(!isset($this->memes[$id])) {
            return false;
        }
        unset($this->memes[$id]);
        $this->save();
        return true;
    }
    
    public function update($id, $memeUrl, $upperText, $lowerText) {
        if(!isset($this->memes[$id])) {
            return false;
        }
        $meme = $this->memes[$id];
        $meme->setMemeUrl($memeUrl);
        $meme->setUpperText($upperText);
        $meme->setLowerText($lowerText);
        $this->save();
        return true;
    }
}
?>