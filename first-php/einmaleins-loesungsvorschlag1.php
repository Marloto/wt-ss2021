<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
    <table style="border: 1px solid black; border-collapse:collapse;">
    <?php 
    for ($i = 1; $i <= 10; $i++) { 
        ?>
 
    <tr style="border: 1px solid black; border-collapse:collapse;">
    <?php 
    for ($j = 1; $j <= 10; $j++) { 
        ?>
    <td style="border: 1px solid black; border-collapse:collapse;"> <?php echo($j*$i);?></td>
    <?php }?>
   </tr>
   <?php }?>
</table>
    </div>
</body>
</html>