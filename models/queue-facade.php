<?php

  class QueueFacade extends DBConnection {

    public function fetchServing() {
      $sql = $this->connect()->prepare("SELECT * FROM serving");
      $sql->execute();
      return $sql;
    }

    public function serve($number, $type, $counter)  {
      $sql = $this->connect()->prepare("UPDATE serving SET number = '$number', type = '$type', counter = '$counter' WHERE id = '0'");
      $sql->execute();
      return $sql;
    }

    public function reset()  {
      $sql = $this->connect()->prepare("UPDATE serving SET number = '0', type = '', counter = '' WHERE id = '0'");
      $sql->execute();
      return $sql;
    }

    // Specials
    public function fetchQueueSpecials() {
      $sql = $this->connect()->prepare("SELECT * FROM specials");
      $sql->execute();
      return $sql;
    }

    public function fetchQueueSpecial() {
      $sql = $this->connect()->prepare("SELECT * FROM specials");
      $sql->execute();
      $count = $sql->rowCount();
      return $count;
    }

    public function addNumberSpecial($number, $type, $status) {
      $sql = $this->connect()->prepare("INSERT INTO specials(number, type, status) VALUES (?, ?, ?)");
      $sql->execute([$number, $type, $status]);
      return $sql;
    }

    public function fetchLatestNumberSpecial() {
      $sql = $this->connect()->prepare("SELECT * FROM specials ORDER BY number DESC LIMIT 1");
      $sql->execute();
      return $sql;
    }

    public function waitSpecial($specialId)  {
      $sql = $this->connect()->prepare("UPDATE specials SET status = 'Wait' WHERE id = $specialId");
      $sql->execute();
      return $sql;
    }

    public function serveSpecial($number, $type, $counter)  {
      $sql = $this->connect()->prepare("UPDATE serving SET number = '$number', type = '$type', counter = '$counter' WHERE id = '0'");
      $sql->execute();
      return $sql;
    }

    public function serveSpecials($specialId) {
      $sql = $this->connect()->prepare("UPDATE specials SET status = 'Serving' WHERE id = '$specialId'");
      $sql->execute();
      return $sql;
    }

    public function doneSpecial($specialId)  {
      $sql = $this->connect()->prepare("DELETE FROM specials WHERE id = $specialId");
      $sql->execute();
      return $sql;
    }

    public function fetchWaitingSpecial() {
      $sql = $this->connect()->prepare("SELECT * FROM specials WHERE status = 'Wait' ORDER BY number ASC LIMIT 1");
      $sql->execute();
      return $sql;
    }








    // Regular
    public function fetchQueueRegulars() {
      $sql = $this->connect()->prepare("SELECT * FROM regulars");
      $sql->execute();
      return $sql;
    }

    public function fetchQueueRegular() {
      $sql = $this->connect()->prepare("SELECT * FROM regulars");
      $sql->execute();
      $count = $sql->rowCount();
      return $count;
    }

    public function serveRegulars($regularId) {
      $sql = $this->connect()->prepare("UPDATE regulars SET status = 'Serving' WHERE id = '$regularId'");
      $sql->execute();
      return $sql;
    }

    public function addNumberRegular($number, $type, $status) {
      $sql = $this->connect()->prepare("INSERT INTO regulars(number, type, status) VALUES (?, ?, ?)");
      $sql->execute([$number, $type, $status]);
      return $sql;
    }

    public function fetchLatestNumberRegular() {
      $sql = $this->connect()->prepare("SELECT * FROM regulars ORDER BY number DESC LIMIT 1");
      $sql->execute();
      return $sql;
    }

    public function waitRegular($regularId)  {
      $sql = $this->connect()->prepare("UPDATE regulars SET status = 'Wait' WHERE id = $regularId");
      $sql->execute();
      return $sql;
    }

    public function doneRegular($regularId)  {
      $sql = $this->connect()->prepare("DELETE FROM regulars WHERE id = $regularId");
      $sql->execute();
      return $sql;
    }

    public function fetchWaitingRegular() {
      $sql = $this->connect()->prepare("SELECT * FROM regulars WHERE status = 'Wait' ORDER BY number ASC LIMIT 1");
      $sql->execute();
      return $sql;
    }




  }

?>