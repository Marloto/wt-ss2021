<?php
namespace View;

class LoginForm {
    public function defaultForm() {
        $this->formWithErrors(false, false, false);
    }
    
    public function formWithLoginError() {
        $this->formWithErrors(false, false, true);
    }

    public function formWithFormError($usernameMissing, $passwordMissing) {
        $this->formWithErrors($usernameMissing, $passwordMissing, false);
    }

    public function formWithErrors($usernameMissing, $passwordMissing, $loginFailed) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form method="post" action="index.php">
        <?php if($usernameMissing) { ?><p>Nutzername fehlt</p><?php } ?>
        <?php if($passwordMissing) { ?><p>Passwort fehlt</p><?php } ?>
        <?php if($loginFailed) { ?><p>Login hat nicht geklappt</p><?php } ?>
        <input name="username" placeholder="">
        <input name="password" type="password" placeholder="">
        <button name="action" value="login">Anmelden</button>
    </form>
</body>
</html>
<?php
    }
}
?>