<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        th,
        td {
            width: 50px;
            text-align: right;
        }
    </style>
</head>

<body>
    <!--table>
        <thead>
            <tr>
                <th>-</th>
                <th>1</th>
                <th>2</th>
                <th>3</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>1</th>
                <td>1</td>
                <td>2</td>
                <td>3</td>
            </tr>
            <tr>
                <th>2</th>
                <td>4</td>
                <td>6</td>
                <td>8</td>
            </tr>
            <tr>
                <th>3</th>
                <td>6</td>
                <td>9</td>
                <td>12</td>
            </tr>
        </tbody>
    </table-->























    <?php
    function generateFunction($maxX, $maxY) {
        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>-</th>";
        for ($y = 1; $y <= $maxY; $y++) {
            echo "<th>" . $y . "</th>";
        }
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        for ($x = 1; $x <= $maxX; $x++) {
            echo "<tr>";
            echo "<th>" . $x . "</th>";
            for ($y = 1; $y <= $maxY; $y++) {
                echo "<td>" . ($x * $y) . "</td>";
            }
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }

    generateFunction(6, 8);
    ?>
</body>

</html>