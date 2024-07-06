<!-- controller.php -->
<?php
require_once('../config/db.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize session (if not already started)
    session_start();

    // Get form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate credentials
    $database = new Database();
    $db = $database->getConnection();

    $query = "SELECT * FROM users WHERE Username = :username";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    // Check if username exists
    if ($stmt->rowCount() == 1) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Verify password
        if (password_verify($password, $user['Password'])) {
            // Password is correct, start session and set session variables
            $_SESSION['user_id'] = $user['User_id'];
            $_SESSION['username'] = $user['Username'];
            $_SESSION['user_rank'] = $user['User_rank'];

            // Redirect to dashboard or any other page after successful login
            
            if ($_SESSION['user_rank'] == 1) {
                header("Location: ../public/admin_dash.php");
                exit();
            } elseif ($_SESSION['user_rank'] == 2) {
                header("Location: ../public/employee_dash.php");
                exit();
            } elseif ($_SESSION['user_rank'] == 3) {
                header("Location: ../public/vet_dash.php");
                exit();
            }
        } else {
            // Password incorrect
            echo "<script>alert('Invalid username or password');</script>";
        }
    } else {
        // Username not found
        echo "<script>alert('Invalid username or password');</script>";
    }
}
?>