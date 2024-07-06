<?php
include_once '../config/db.php'; // Adjust the path to db.php if necessary

$db = new Database();
$conn = $db->getConnection();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];
    switch ($action) {
        case 'addUser':
            addUser($conn);
            break;
        case 'updateUser':
            updateUser($conn);
            break;
        case 'deleteUser':
            deleteUser($conn);
            break;
        case 'addAnimal':
            addAnimal($conn);
            break;
        case 'updateAnimal':
            updateAnimal($conn);
            break;
        case 'deleteAnimal':
            deleteAnimal($conn);
            break;
        case 'addHabitat':
            addHabitat($conn);
            break;
        case 'updateHabitat':
            updateHabitat($conn);       
            break;
        case 'deleteHabitat':
            deleteHabitat($conn);
            break;
    }
}

function addUser($conn) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $email = $_POST['email'];
    $rank = $_POST['rank'];

    $query = "INSERT INTO users (Username, `Password`, Email, User_rank) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->execute([$username, $password, $email, $rank]);

    $to = $email;
    $subject = 'Welcome to Zoo Arcadia!';
    $message = "Dear $username,\n\nWelcome to Zoo Arcadia! We are thrilled to have you as a member of our community.";

    // You can use PHP's built-in mail() function or a library like PHPMailer to send the email
    // Example using mail() function (make sure SMTP is configured properly in php.ini)
    $mailSent = mail($to, $subject, $message);

    if ($mailSent) {
        echo "Email sent successfully to $email";
    } else {
        echo "Failed to send email to $email";
    }

    header("Location: ../public/admin_dash.php");
}

function updateUser($conn) {
    $userId = $_POST['user_id'];
    $column = $_POST['column'];
    $value = $_POST['value'];

    $query = "UPDATE users SET $column = ? WHERE User_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$value, $userId]);

    header("Location: ../public/admin_dash.php");
}

function deleteUser($conn) {
    $userId = $_POST['user_id'];

    $query = "DELETE FROM users WHERE User_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$userId]);

    header("Location: ../public/admin_dash.php");
}

function listUsers($conn) {
    $query = "SELECT * FROM users";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($users as $user) {
        echo "<div class='user list-item'>
                <span>{$user['Username']}</span>
                <span>{$user['Email']}</span>
                <form method='POST' action='../controllers/manageController.php'>
                    <input type='hidden' name='user_id' value='{$user['User_id']}'>
                    <input type='hidden' name='action' value='deleteUser'>
                    <button type='submit'>Supprimer</button>
                </form>
                <form method='POST' action='../controllers/manageController.php'>
                    <input type='hidden' name='user_id' value='{$user['User_id']}'>
                    <input type='text' name='value' placeholder='Nouveau username'>
                    <input type='hidden' name='column' value='Username'>
                    <input type='hidden' name='action' value='updateUser'>
                    <button type='submit'>Modifier</button>
                </form>
                <form method='POST' action='../controllers/manageController.php'>
                    <input type='hidden' name='user_id' value='{$user['User_id']}'>
                    <input type='text' name='value' placeholder='Nouveau email'>
                    <input type='hidden' name='column' value='Email'>
                    <input type='hidden' name='action' value='updateUser'>
                    <button type='submit'>Modifier</button>
                </form>
            </div>";
    }
}

function addAnimal($conn) {
    $nom = $_POST['nom'];
    $race = $_POST['race'];
    $img = file_get_contents($_FILES['img']['tmp_name']);
    $habitat_id = $_POST['habitat_id'];

    $query = "INSERT INTO animaux (Nom, Race, Img, Habitat_Id) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->execute([$nom, $race, $img, $habitat_id]);

    header("Location: ../public/admin_dash.php");
}

function updateAnimal($conn) {
    $animalId = $_POST['animal_id'];
    $column = $_POST['column'];
    $value = $_POST['value'];

    $query = "UPDATE animaux SET $column = ? WHERE Animal_Id = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$value, $animalId]);

    header("Location: ../public/admin_dash.php");
}

function deleteAnimal($conn) {
    $animalId = $_POST['animal_id'];

    $query = "DELETE FROM animaux WHERE Animal_Id = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$animalId]);

    header("Location: ../public/admin_dash.php");
}

function listAnimals($conn) {
    $query = "SELECT a.*, p.Etat FROM animaux a LEFT JOIN passages p ON a.Animal_Id = p.Animal_Id";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $animals = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($animals as $animal) {
        echo "<div class='animal list-item'>
                <span>{$animal['Nom']}</span>
                <span>{$animal['Race']}</span>
                <span>{$animal['Etat']}</span>
                <form method='POST' action='../controllers/manageController.php'>
                    <input type='hidden' name='animal_id' value='{$animal['Animal_Id']}'>
                    <input type='hidden' name='action' value='deleteAnimal'>
                    <button type='submit'>Supprimer</button>
                </form>
                <form method='POST' action='../controllers/manageController.php'>
                    <input type='hidden' name='animal_id' value='{$animal['Animal_Id']}'>
                    <input type='text' name='value' placeholder='Nouveau nom'>
                    <input type='hidden' name='column' value='Nom'>
                    <input type='hidden' name='action' value='updateAnimal'>
                    <button type='submit'>Modifier</button>
                </form>
                <form method='POST' action='../controllers/manageController.php'>
                    <input type='hidden' name='animal_id' value='{$animal['Animal_Id']}'>
                    <input type='text' name='value' placeholder='Nouvelle race'>
                    <input type='hidden' name='column' value='Race'>
                    <input type='hidden' name='action' value='updateAnimal'>
                    <button type='submit'>Modifier</button>
                </form>
            </div>";
    }
}

function addHabitat($conn) {
    $nom = $_POST['nom'];
    $img = file_get_contents($_FILES['img']['tmp_name']);
    $desc = $_POST['desc'];

    $query = "INSERT INTO habitats (Nom, Img, `Desc`) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->execute([$nom, $img, $desc]);

    header("Location: ../public/admin_dash.php");
}

function updateHabitat($conn) {
    $habitatId = $_POST['habitat_id'];
    $column = $_POST['column'];
    $value = $_POST['value'];

    if ($column === "Desc") {
        $column = "`$column`"; // Backticks added for SQL column names
    }

    $query = "UPDATE habitats SET $column = ? WHERE Habitat_Id = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$value, $habitatId]);

    header("Location: ../public/admin_dash.php");
}

function deleteHabitat($conn) {
    $habitatId = $_POST['habitat_id'];

    $query = "DELETE FROM habitats WHERE Habitat_Id = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$habitatId]);

    header("Location: ../public/admin_dash.php");
}

function listHabitats($conn) {
    $query = "SELECT * FROM habitats";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $habitats = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($habitats as $habitat) {
        echo "<div class='habitat list-item'>
                <span>{$habitat['Nom']}</span>
                <span>{$habitat['Desc']}</span>
                <form method='POST' action='../controllers/manageController.php'>
                    <input type='hidden' name='habitat_id' value='{$habitat['Habitat_Id']}'>
                    <input type='hidden' name='action' value='deleteHabitat'>
                    <button type='submit'>Supprimer</button>
                </form>
                <form method='POST' action='../controllers/manageController.php'>
                    <input type='hidden' name='habitat_id' value='{$habitat['Habitat_Id']}'>
                    <input type='text' name='value' placeholder='Nouveau nom'>
                    <input type='hidden' name='column' value='Nom'>
                    <input type='hidden' name='action' value='updateHabitat'>
                    <button type='submit'>Modifier</button>
                </form>
                <form method='POST' action='../controllers/manageController.php'>
                    <input type='hidden' name='habitat_id' value='{$habitat['Habitat_Id']}'>
                    <input type='text' name='value' placeholder='Nouvelle description'>
                    <input type='hidden' name='column' value='Desc'>
                    <input type='hidden' name='action' value='updateHabitat'>
                    <button type='submit'>Modifier</button>
                </form>
            </div>";
    }
}
?>