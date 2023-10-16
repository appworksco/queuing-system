<?php

  class CountersFacade extends DBConnection {

    public function fetchCounters() {
      $sql = $this->connect()->prepare("SELECT * FROM counters");
      $sql->execute();
      return $sql;
    }

    public function fetchCounterById($counterId) {
      $sql = $this->connect()->prepare("SELECT * FROM counters WHERE id = $counterId");
      $sql->execute();
      return $sql;
    }

    public function verifyCounter($counter) {
      $sql = $this->connect()->prepare("SELECT counter FROM counters WHERE counter = ?");
      $sql->execute([$counter]);
      $count = $sql->rowCount();
      return $count;
    }

    public function addCounter($counter) {
      $sql = $this->connect()->prepare("INSERT INTO counters(counter) VALUES (?)");
      $sql->execute([$counter]);
      return $sql;
    }

    public function updateCounter($counter, $counterId)  {
      $sql = $this->connect()->prepare("UPDATE counters SET counter = '$counter' WHERE id = $counterId");
      $sql->execute();
      return $sql;
    }

    public function deleteCounter($counterId) {
      $sql = $this->connect()->prepare("DELETE FROM counters WHERE id = $counterId");
      $sql->execute();
      return $sql;
    }

  }

?>