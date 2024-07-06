<?php
require_once '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $animalId = $_POST['animal_id'];
    $vetUsername = $_POST['vet_username'];
    $etat = $_POST['etat'];
    $nourriture = $_POST['nourriture'];
    $poidsNourriture = $_POST['poids_nourriture'];
    $detailAnimal = $_POST['detail_animal'];
    $detailHabitat = $_POST['detail_habitat'];

    $database = new Database();
    $conn = $database->getConnection();

    $query = "
        INSERT INTO passages (Vet_Username, Etat, Nourriture, Poids_Nourriture, Detail_Animal, Detail_Habitat, Animal_Id, Habitat_Id, DATE)
        VALUES (:vet_username, :etat, :nourriture, :poids_nourriture, :detail_animal, :detail_habitat, :animal_id, (SELECT Habitat_Id FROM animaux WHERE Animal_Id = :animal_id), NOW())
    ";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':vet_username', $vetUsername);
    $stmt->bindParam(':etat', $etat);
    $stmt->bindParam(':nourriture', $nourriture);
    $stmt->bindParam(':poids_nourriture', $poidsNourriture);
    $stmt->bindParam(':detail_animal', $detailAnimal);
    $stmt->bindParam(':detail_habitat', $detailHabitat);
    $stmt->bindParam(':animal_id', $animalId);

    if ($stmt->execute()) {
        header("Location: ../public/Animal.php?id=$animalId");
    } else {
        echo "Erreur lors de l'ajout du passage.";
    }
}
?>
