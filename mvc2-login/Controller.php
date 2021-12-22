<?php
class Controller {
    private $users;
    public function __construct($users) {
        $this->users = $users;
    }
    public function showLoginForm() {
        $view = new View\LoginForm();
        $view->defaultForm();
    }
    public function handleLogin() {
        $username = "";
        $password = "";
        $error = false;
        if(isset($_POST["username"]) && !empty($_POST["username"])) {
            $username = $_POST["username"];
        } else {
            $error = true;
        }
        if(isset($_POST["password"]) && !empty($_POST["password"])) {
            $password = $_POST["password"];
        } else {
            $error = true;
        }
    
        if($error) {
            $view = new View\LoginForm();
            $view->formWithFormError(!$username, !$password);
        } else {
            $user = $this->users->findByUsername($username);
            if(isset($user) && $user->verify($username, $password)) {
                $_SESSION["authentificated"] = true;
                $_SESSION["user"] = "Ich";

                $this->showInternal();
            } else {
                $view = new View\LoginForm();
                $view->formWithLoginError();
            }
        }
    }
    public function showInternal() {
        $view = new View\Internal();
        $view->show($_SESSION["user"]);
    }
    public function handleLogout() {
        // todo: sauberes session reset besser
        $_SESSION["authentificated"] = false;
        $_SESSION["user"] = null;
        $this->showLoginForm();
    }
    public function run() {
        $action = "";
        if(isset($_REQUEST["action"])) {
            $action = $_REQUEST["action"];
        } else {
            if(isset($_SESSION["authentificated"]) && $_SESSION["authentificated"]) {
                $action = "internal";
            } else {
                $action = "show-login-form";
            }
        }
        switch($action) {
            case "show-login-form":
                $this->showLoginForm();
                break;
            case "login":
                $this->handleLogin();
                break;
            case "internal":
                $this->showInternal();
                break;
            case "logout":
                $this->handleLogout();
                break;
            default:
                $view = new View\Errors();
                $view->show("Unbekannte Aktion!");
                break;
        }
    }
}
?>