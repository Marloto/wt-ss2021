<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input name="example" value="<?= isset($_POST['example']) ? $_POST['example'] : '' ?>">

        <hr>
        <?php
        $currentSelection = 0;
        // if(isset($_POST['someselect']) && $_POST['someselect'] == "1") {
        //     $currentSelection = 1;
        // }
        // if(isset($_POST['someselect']) && $_POST['someselect'] == "2") {
        //     $currentSelection = 2;
        // }
        if(isset($_POST['someselect'])) {
            $currentSelection = intval($_POST['someselect']);
        }

        ?>
        <select name="someselect">
            <option value="1" <?= $currentSelection == 1 ? "selected" : "" ?>>Something</option>
            <option value="2" <?= $currentSelection == 2 ? "selected" : "" ?>>Otherthing</option>
        </select>
        
        <hr>
        <textarea name="sometext"><?= isset($_POST['sometext']) ? $_POST['sometext'] : '' ?></textarea>
        
        <hr>
        <?php
        $currentCheck = false;
        if(isset($_POST['somecheck']) && $_POST['somecheck'] == "1") {
            $currentCheck = true;
        }
        ?>
        <input type="checkbox" name="somecheck" value="1" <?= $currentCheck ? "checked" : "" ?>>
        
        <hr>
        <!-- radios gibt es auch noch... -->
        
        
        <!-- Frage: Wie kann so ein Formular korrekt wieder ausgefüllt werden, mit PHP-Generierung, nachdem es abgesendet wurde 
        - was kommt eigentlich bei select, textarea und input-checkbox im Server an?
        - was kommt im server von dem Formularfeld "select" an? someselect=1
        - in HTML muss man "selected" für Select-Boxen nutzen, um eine Vorauswahl zu definieren, entsprechend muss die Generierung mit PHP realisiert werden
        - was muss bei der Textarea passieren? steckt als Tag-Inhalt im HTML
        - Wie kann man eine Checkbox vorauswählen in HTML? "checked"
        
        -->
    
        <?php var_dump($_POST); ?>
        
        <hr>
        <button>Absenden</button>
    </form>
</body>
</html>