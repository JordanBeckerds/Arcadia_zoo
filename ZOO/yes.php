<!-- hash_password.php -->
<?php
$password = "Password";

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

echo "Original Password: $password<br>";
echo "Hashed Password: $hashed_password<br>";
?>
