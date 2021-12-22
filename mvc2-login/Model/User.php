<?php
namespace Model;

class User {
    private $username;
    private $password;

    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }

    public function getUsername() {
        return $this->username;
    }

    public function verify($username, $password) {
        return $this->username === $username && $this->password === $password;
    }
}
?>