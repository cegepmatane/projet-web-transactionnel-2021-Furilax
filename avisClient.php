<?php
class Stars {
    private $pdo;
    private $stmt;
    public $error;
    function __construct () {
      try {
          $this->pdo = new PDO (
              "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET, DB_USER, DB_PASSWORD, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_NAMED
              ]
            );
          } catch (Exception $ex) { exit($ex->getMessage()); }
    }

    function __destruct () {
        if ($this->stmt !== null) { $this->stmt = null; }
        if ($this->pdo !== null) { $this->pdo = null; }
    }

    function save ($pid, $uid, $stars) {
        try {
            $this->stmt = $this->pdo->prepare(
            "REPLACE INTO `avis` (`idLogo`, `idUtilisateur`, `evaluation`) VALUES (?,?,?)"
            );
            $this->stmt->execute([$pid, $uid, $stars]);
            return true;
        } catch (Exception $ex) {
            $this->error = $ex->getMessage();
            return false;
        }
    }

    function get ($uid) {
        $this->stmt = $this->pdo->prepare(
          "SELECT * FROM `avis` WHERE `idUtilisateur`=?"
        );
        $this->stmt->execute([$uid]);
        $ratings = [];
        while ($row = $this->stmt->fetch()) {
          $ratings[$row['idLogo']] = $row['evaluation'];
        }
        return $ratings;
    }

    function avg () {
        $this->stmt = $this->pdo->prepare(
          "SELECT `idLogo`, ROUND(AVG(`evaluation`), 2) `avg`, COUNT(`idUtilisateur`) `num`
          FROM `avis`
          GROUP BY `idLogo`"
        );
        $this->stmt->execute();
        $average = [];
        while ($row = $this->stmt->fetch()) {
          $average[$row["idLogo"]] = [
            "avg" => $row["avg"], 
            "num" => $row["num"] 
          ];
        }
        return $average;
    }

}

define("DB_HOST", "localhost");
define("DB_NAME", "logos");
define("DB_CHARSET", "utf8");
define("DB_USER", "root");
define("DB_PASSWORD", "6785");

$_STARS = new Stars();
?>