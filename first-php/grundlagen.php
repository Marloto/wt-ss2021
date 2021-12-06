<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $someString = 1;
        $someString2 = 'Beispiel 2';

        echo $someString;

        error_log("Ein einfaches Beispiel!");
        // var_dump und printr für weitere Möglichkeiten

        if($someString === "0") {
            echo "passt!";
        } else if($someString == 1) {
            echo "wie wäre es damit?";
        } else {
            echo "passt nicht!";
        }

        // For
        // Start, Bedingung und Inkr.
        for($i = 0; $i < 10; $i ++) {
            echo $i . "<br>";
        }

        echo "----<br>";

        // While
        $k = 0;
        while($k < 10) {
            echo $k . "<br>";
            $k ++;
        }

        echo "----<br>";

        $l = 0;
        do {
            echo $l . "<br>";
            $l ++;
        } while($l < 10);



    function something($param1) {
        echo "hello?! " . $param1 . "<br>";
    }
    something("a");
    something(2);
    something(42);
    something("c");
    ?>
</body>
</html>