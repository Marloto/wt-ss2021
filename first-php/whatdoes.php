<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <?php
    function doSomething($x, $y) {
        return $x * $y;
    }
    ?>
    <p><?= doSomething(6, 7) ?></p>


    <?php
    function hello($name) {
    ?>
        <b><?php echo "Hello, $name"; ?></b>
    <?php
    }
    ?>
    <p><?php hello("world"); ?></p>


    <p><?php
    function printAnswer() {
        echo "Answer: " . doSomething(7, 6);
    }
    echo printAnswer();
    ?></p>
</body>
</html>