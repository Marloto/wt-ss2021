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
    // Arrays
    //  Wie wurden in JS Arrays erzeugt?
    //  -> Java: int[] etwas = new int[length];
    //  -> JS: var fruits = ['Apple', 'Banana'];
    //  -> JS: var fruits2 = [];
    //  -> JS: var fruits2 = Array();

    $arr = array(); // erzeugt neue Arrays
    $arr[0] = 42;
    $arr[1] = 21;
    $arr[] = 321;
    $arr['hello'] = "world";
    $arr['wert2.0'] = 3.14;
    echo "Ergebnis: " . $arr[0] . "<br>";
    echo "Ergebnis: " . $arr[1] . "<br>";
    echo "Ergebnis: " . $arr[2] . "<br>";
    echo "Ergebnis: " . $arr['hello'] . "<br>";
    echo "Ergebnis: " . $arr['wert2.0'] . "<br>";

    $arr2 = array(0 => 42, 1 => 21, 2 => 321);
    var_dump($arr2);
    echo "<br>";
    
    $arr3 = array('wert1' => 42, 'wert2' => 21, 'wert3' => 321);
    var_dump($arr3);
    echo "<br>";

    // Array Laenge: $arr3.length geht so NICHT!
    $l1 = sizeof($arr2);
    $l2 = count($arr2);

    echo "Arr2: $l1, $l2<br>";

    for($i = 0; $i < count($arr2); $i ++) {
        echo $arr2[$i] . "<br>";
    }
    
    $l3 = count($arr3);
    echo "Arr3: $l3<br>";
    // Iteration über Zähler-Schleife ist so nicht möglich!

    // JS: wie war eine for-each-Schleife? -> ???
    // PHP: wie war das Beispiel einer for-each-Schleife in den Folien?

    //foreach (<arr> as [<key> =>] <value>) {}
    foreach($arr3 as $key => $value) {
        echo "$key: $value<br>";
    }
    foreach($arr3 as $value) {
        echo "$value<br>";
    }

    echo "<hr>";
    
    // Klassen (nicht als CSS-Klasse, sondern Klassen im sinne von objektorientiertem Programmieren)
    echo "<h2>Klassen</h2>";

    // Wie der Syntax  für Klassen in JavaScript? -> ???
    //  -> ebenfalls einen kompletten Syntax für Klassen, Konstruktoren, Methoden, Vererbung, usw.
    // Wie der Syntax für Klassen in Java?
    //   -> Objekterzeugung: Person person = new Person("");
    //   -> public class Person { 
    //          private String name;
    //          public Person() { ... }
    //      }

    class Fahrzeug { // Klasse definiert!
        private $name;
        public function __construct($name) {
            // keine . Notation für aufruf von Eigenschaften an Objekten, hier wird ->
            $this->name = $name;
        }
        public function doSomething() {
            echo "Hello?!<br>";
        }
        public function __toString() {
            return "Fahrzeug mit Namen $this->name<br>";
        }

        public static function someStatic() {
            echo "Something static?<br>";
        }
    }

    $fahrzeug = new Fahrzeug("Audi A3");
    $fahrzeug2 = $fahrzeug; // referenz wird übergeben
    $fahrzeug->doSomething(); // gibt "Hello?!" mittels echo aus, kein Rückgabewert!
    Fahrzeug::someStatic(); // Statischer Methodenaufruf
    echo $fahrzeug; // verwendet die __toString

    class AudiA4 extends Fahrzeug {
        public function __construct() {
            parent::__construct("Audi A4");
        }
    }
    $fahrzeug3 = new AudiA4();
    echo $fahrzeug3; // verwendet die __toString aus Fahrzeug, wurde vererbt
    // echo kann nur Zeichenketten ausgeben
    // -> $fahrzeug3 ist vom Datentyp AudiA4
    // -> keine direkte Abbildung in Zeichenkette ...
    // -> Vereinbarung wenn es an einer Klasse eine __toString gibt, dann verwende diese für die Transformation von AudiA4 -> Zeichenkette
    
    $example2 = "xxx" . $fahrzeug;
    echo $example2;

    var_dump($fahrzeug);
    echo "<br>";
    var_dump($fahrzeug2);
    echo "<br>";
    var_dump($fahrzeug3);
    echo "<br>";
    echo "<hr>";
    ?>
</body>
</html>