<?php
session_start();
require_once '../config/db.php';

class Controller {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function getHabitats() {
        $query = "SELECT Habitat_Id, Nom, Img, `Desc` FROM habitats";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAnimalsByHabitat($habitat_id) {
        $query = "SELECT Animal_Id, Nom, Race, Img FROM animaux WHERE Habitat_Id = :habitat_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':habitat_id', $habitat_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLatestEtatByAnimal($animal_id) {
        $query = "SELECT `Etat` FROM passages WHERE Animal_Id = :animal_id ORDER BY `DATE` DESC LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':animal_id', $animal_id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['Etat'] : null;
    }

    public function redirect($url) {
        header("Location: $url");
        exit();
    }
}

// Create an instance of the controller
$controller = new Controller();
?>
