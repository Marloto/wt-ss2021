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
        $rows = 12;
        $cols = 12;
 
        echo "<table border= 1px green >" ;
        
 
        for ($i = 0 ; $i < $rows ; $i++){
       
            echo "<tr>";
            for ($j = 0 ; $j < $cols ; $j++){
                echo "<td>" . ($i*$j) . "</td>";
             }
             echo "</tr>";
        }
        echo "</table>";
?>
</body>
</html>