<!-- guest_signin.php -->
<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $guestEmail = $_POST['guest_email'];
    $guestPassword = $_POST['guest_password'];

    $database = new Database();
    $conn = $database->getConnection();

    $query = "SELECT * FROM guests WHERE Guest_Email = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$guestEmail]);
    $guest = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($guest && password_verify($guestPassword, $guest['Guest_Password'])) {
        // Password matches, sign-in successful
        session_start();
        $_SESSION['guest_id'] = $guest['Guest_Id'];
        $_SESSION['guest_email'] = $guest['Guest_Email'];
        header("Location: welcome.php");
        exit();
    } else {
        // Invalid email or password
        header("Location: index.php?signin=failed");
        exit();
    }
}
?>
