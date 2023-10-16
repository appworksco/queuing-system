<?php

  class DepartmentsFacade extends DBConnection {

    public function fetchDepartments() {
      $sql = $this->connect()->prepare("SELECT * FROM departments");
      $sql->execute();
      return $sql;
    }

    public function fetchDepartmentById($departmentId) {
      $sql = $this->connect()->prepare("SELECT * FROM departments WHERE id = $departmentId");
      $sql->execute();
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

    public function updateDepartment($department, $departmentId)  {
      $sql = $this->connect()->prepare("UPDATE departments SET department = '$department' WHERE id = $departmentId");
      $sql->execute();
      return $sql;
    }

    public function deleteDepartment($departmentId) {
      $sql = $this->connect()->prepare("DELETE FROM departments WHERE id = $departmentId");
      $sql->execute();
      return $sql;
    }

  }

?>