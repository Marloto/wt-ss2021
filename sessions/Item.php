<?php
class Item {
    public $article;
    public $count;

    public function __construct($article, $count) {
        $this->article = $article;
        $this->count = $count;
    }
}
?>