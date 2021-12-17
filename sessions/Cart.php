<?php
class Cart {
    public $sequence;
    public $owner;
    public $items;

    public function __construct($owner) {
        $this->sequence = 0;
        $this->owner = $owner;
        $this->items = array();
    }

    static public function fromJSON($articles, $json) {
        $cart = new Cart($json->{'owner'});
        $cart->sequence = $json->{'sequence'} + 1;
        foreach ($json->{'items'} as $item) {
            $article = new Article($item->{'article'}->{'name'}, $item->{'article'}->{'price'});
            $articles[] = $article;
            $cart->items[] = new Item($article, $item->{'count'});
        }
        return $cart;
    }

    static public function fromQuery($articles) {
        $cart = new Cart($_GET['owner']);
        $cart->sequence = $_GET['sequence'] + 1;

        foreach ($_GET['items'] as $itemArray) {
            $count = $itemArray['count'];
            $article = new Article($itemArray['article']['name'], $itemArray['article']['price']);
            $articles[] = $article;
            $item = new Item($article, $count);
            $cart->items[] = $item;
        }
        return $cart;
    }

    public function addItem($article, $count) {
        $this->items[] = new Item($article, $count);
    }
}
?>