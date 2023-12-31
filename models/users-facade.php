<?php

  class UsersFacade extends DBConnection {

    public function fetchUsers() {
      $sql = $this->connect()->prepare("SELECT * FROM users WHERE user_type = '1'");
      $sql->execute();
      return $sql;
    }

    public function fetchUsersById($userId) {
      $sql = $this->connect()->prepare("SELECT * FROM users WHERE id = ?");
      $sql->execute([$userId]);
      return $sql;
    }

    public function verifyUsernameAndPassword($username, $password) {
      $sql = $this->connect()->prepare("SELECT username, password FROM users WHERE username = ? AND password = ?");
      $sql->execute([$username, $password]);
      $count = $sql->rowCount();
      return $count;
    }

    public function addUser($userType, $firstName, $lastName, $username, $password) {
      $sql = $this->connect()->prepare("INSERT INTO users(user_type, first_name, last_name, username, password) VALUES (?, ?, ?, ?, ?)");
      $sql->execute([$userType, $firstName, $lastName, $username, $password]);
      return $sql;
    }

    public function updateUser($userId, $firstName, $lastName, $username, $password) {
      $sql = $this->connect()->prepare("UPDATE users SET first_name = '$firstName', last_name = '$lastName', username = '$username', password = '$password' WHERE id = $userId");
      $sql->execute();
      return $sql;
    }

    public function deleteUser($userId) {
      $sql = $this->connect()->prepare("DELETE FROM users WHERE id = $userId");
      $sql->execute();
      return $sql;
    }

    public function login($username, $password) {
      $sql = $this->connect()->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
      $sql->execute([$username, $password]);
      return $sql;
    }

  }

?>