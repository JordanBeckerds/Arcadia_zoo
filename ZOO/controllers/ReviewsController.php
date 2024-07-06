<?php 
// ReviewsController.php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include_once '../config/db.php';
    $database = new Database();
    $conn = $database->getConnection();

    // Handle validating review
    if (isset($_POST['validate_review'])) {
        $review_id = $_POST['review_id'];
        $query_validate = "UPDATE reviews SET Valider = 1 WHERE Review_Id = :review_id";
        $stmt = $conn->prepare($query_validate);
        $stmt->bindParam(':review_id', $review_id);
        $stmt->execute();
        header("Location: ../public/employee_dash.php");
    }

    // Handle unvalidating review
    if (isset($_POST['unvalidate_review'])) {
        $review_id = $_POST['review_id'];
        $query_unvalidate = "UPDATE reviews SET Valider = 0 WHERE Review_Id = :review_id";
        $stmt = $conn->prepare($query_unvalidate);
        $stmt->bindParam(':review_id', $review_id);
        $stmt->execute();
        header("Location: ../public/employee_dash.php");
    }

    // Handle adding new review
    if (isset($_POST['add_review'])) {
        $nom = $_POST['nom'];
        $review = $_POST['review'];
        $query_add = "INSERT INTO reviews (Nom, Review, Valider) VALUES (:nom, :review, 0)";
        $stmt = $conn->prepare($query_add);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':review', $review);
        $stmt->execute();
        header("Location: ../public/reviews.php");
    }

    // Redirect back to the appropriate page after handling the form submission
    exit();
}
?>

