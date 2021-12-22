<?php
namespace View;
class Internal {
    public function show($username) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p><?php echo "Hello, " . $username; ?></p>
    <p><a href="?action=logout">Abmelden!</a></p>
</body>
</html>
<?php
    }
}
?>