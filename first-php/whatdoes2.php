<?php
function doSomething($x, $y) {
    echo "something"; // wo landet das in der Ausgabe
    return $x * $y;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <p><?php
    function printAnswer() {
        echo "Answer: " . doSomething(7, 6);
    }
    echo printAnswer();
    ?></p>
</body>
</html>
