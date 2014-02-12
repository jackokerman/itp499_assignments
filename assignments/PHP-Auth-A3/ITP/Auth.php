<?php

namespace ITP;

class Auth {

    protected $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function attempt($username, $password) {
        $user = $this->getUser($username);
        if (!is_null($user)) {
            return $user["password"] == sha1($password);
        } else {
            return false;
        }
    }

    public function getUser($username) {
        $sql = "SELECT *
                FROM users
                WHERE username=?";

        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(1, $username);

        $statement->execute();
        $result = $statement->fetchAll();

        return count($result) > 0 ? $result[0] : null;
    }
}