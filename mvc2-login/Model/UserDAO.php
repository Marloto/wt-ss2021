<?php
namespace Model;
class UserDAO {
    private $users = array();

    public function __construct() {
        
    }

    public function insertUser($username, $password) {
        $user = new User($username, $password);
        $this->users[$username] = $user;
        return $user;
    }

    public function findByUsername($username) {
        return $this->users[$username];
    }
}
?>