<?php
require 'Article.php';
require 'Cart.php';
require 'Item.php';

$articles = array();
$info = '';
if (!isset($_COOKIE['sessionData'])) {
    // first call, initialize session
    $articles = array(
        new Article('1 Liter Milk', 1.20),
        new Article('Bread (1 Loaf)', 3.25),
        new Article('Tomatoes (500 gr.)', 3.10)
    );
    $cart = new Cart('Homer Simpson');
    $cart->addItem($articles[0], 1);
    $cart->addItem($articles[1], 2);
    $cart->addItem($articles[2], 3);
} else {
    $info = 'Stored counts: ';
    $cart = Cart::fromJSON($articles, json_decode($_COOKIE['sessionData']));
    // store new item counts
    for ($i = 0; $i < count($cart->items); ++$i) {
        $cart->items[$i]->count = $_POST['count' . $i];
        $info .= $_POST['count' . $i] . ' ';
    }
}

// create cookie containing session info
setcookie('sessionData', json_encode($cart));
?>
<html>

<head>
    <title>Session mit Cookies</title>
</head>

<body>
    <p>Die Session Information wird in einem Cookie im JSON-Format zwischen Client und Server transportiert. Was passiert, wenn man das Cookie löscht?</p>
    <h3>Shopping Cart for <?= $cart->owner ?>, #<?= $cart->sequence ?></h3>
    <form method="post" action="">
        <table>
            <tr>
                <td>#</td>
                <td>Article</td>
                <td>Count</td>
            </tr>
            <?php for ($i = 0; $i < count($cart->items); ++$i) {
                $item = $cart->items[$i];
            ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= $item->article->name ?></td>
                    <td><input type="number" name="count<?= $i ?>" value="<?= $item->count ?>"></td>
                </tr>
            <?php           } ?>
        </table>
        <button>save</button><br>
        <?= $info ?>
    </form>
</body>

</html>