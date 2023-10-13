<?php

  class DepartmentsFacade extends DBConnection {

    public function fetchDepartments() {
      $sql = $this->connect()->prepare("SELECT * FROM departments");
      $sql->execute();
      return $sql;
    }

    public function fetchUsersById($userId) {
      $sql = $this->connect()->prepare("SELECT * FROM users WHERE id = ?");
      $sql->execute([$userId]);
      return $sql;
    }

    public function verifyDepartment($department) {
      $sql = $this->connect()->prepare("SELECT department FROM departments WHERE department = ?");
      $sql->execute([$department]);
      $count = $sql->rowCount();
      return $count;
    }

    public function addDepartment($department) {
      $sql = $this->connect()->prepare("INSERT INTO departments(department) VALUES (?)");
      $sql->execute([$department]);
      return $sql;
    }

    public function updateUser($updateUserId, $firstName, $lastName, $username, $password) {
      $sql = $this->connect()->prepare("UPDATE users SET first_name = '$firstName', last_name = '$lastName', username = '$username', password = '$password' WHERE id = $updateUserId");
      $sql->execute();
      return $sql;
    }

    public function deleteDepartment($departmentId) {
      $sql = $this->connect()->prepare("DELETE FROM departments WHERE id = $departmentId");
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