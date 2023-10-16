<?php

  class ReportsFacade extends DBConnection {

    public function fetchVideo() {
      $sql = $this->connect()->prepare("SELECT * FROM video");
      $sql->execute();
      return $sql;
    }

    public function fetchAnnouncement() {
      $sql = $this->connect()->prepare("SELECT * FROM announcement");
      $sql->execute();
      return $sql;
    }

    public function updateVideo($link)  {
      $sql = $this->connect()->prepare("UPDATE video SET link = '$link' WHERE id = '0'");
      $sql->execute();
      return $sql;
    }

    public function updateAnnouncement($message) {
      $sql = $this->connect()->prepare("UPDATE announcement SET message = '$message' WHERE id = '0'");
      $sql->execute();
      return $sql;
    }

    public function resetVideo()  {
      $sql = $this->connect()->prepare("UPDATE video SET link = '' WHERE id = '0'");
      $sql->execute();
      return $sql;
    }
    public function resetAnnouncement() {
      $sql = $this->connect()->prepare("UPDATE announcement SET message = '' WHERE id = '0'");
      $sql->execute();
      return $sql;
    }
  }

?>