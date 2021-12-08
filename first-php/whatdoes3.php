<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <?php
    function hello($name) {
    ?>
        <b><?php echo "Hello, $name"; ?></b>
    <?php
    }
    ?>
    <p><?php hello("world"); ?></p>

    <?php
    function hello2($name) {
        echo "<b>Hello, $name</b>";
    }
    ?>
    <p><?php hello2("world"); ?></p>
</body>
</html>