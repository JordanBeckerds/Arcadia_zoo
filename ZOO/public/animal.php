<?php
require_once '../config/db.php';

if (!isset($_GET['id'])) {
    die('Animal ID not specified.');
}

$animalId = $_GET['id'];

$database = new Database();
$conn = $database->getConnection();

// Fetch animal details
$query = "SELECT * FROM animaux WHERE Animal_Id = ?";
$stmt = $conn->prepare($query);
$stmt->execute([$animalId]);
$animal = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$animal) {
    die('Animal not found.');
}

// Fetch passages for the animal
$query = "SELECT * FROM passages WHERE Animal_Id = ? ORDER BY DATE DESC";
$stmt = $conn->prepare($query);
$stmt->execute([$animalId]);
$passages = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Arcadia</title>

  <!-- slider stylesheet -->
  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
          <a class="navbar-brand" href="index.php">
            <span>
              Arcadia
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
            <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="habitats.php"> Habitats </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="services.php"> Services </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="reviews.php"> Reviews </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.php">Contact us</a>
                </li>
              </ul>
              <div class="user_option">
                <a href="login.php">
                  <img src="../img/user.png" alt="">
                </a>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>


  <!-- who section -->

  <div class="passage-container">
        <div class="animal-detail">
            <h2><?php echo htmlspecialchars($animal['Nom']); ?></h2>
            <img src="data:image/jpeg;base64,<?php echo base64_encode($animal['Img']); ?>" alt="<?php echo htmlspecialchars($animal['Nom']); ?>">
            <p>Race: <?php echo htmlspecialchars($animal['Race']); ?></p>
            <p>Dernier passage: <?php echo $passages[0]['DATE'] ?? 'N/A'; ?></p>
            <p>Dernier état: <?php echo $passages[0]['Etat'] ?? 'N/A'; ?></p>
        </div>
        <div class="add-passage">
            <h3>Ajouter un passage</h3>
            <form action="../controllers/PassagesController.php" method="post">
                <input type="hidden" name="animal_id" value="<?php echo $animal['Animal_Id']; ?>">
                <label for="vet_username">Vétérinaire(Username):</label>
                <input type="text" id="vet_username" name="vet_username" required>
                <label for="etat">État:</label>
                <input type="text" id="etat" name="etat" required>
                <label for="nourriture">Nourriture:</label>
                <input type="text" id="nourriture" name="nourriture" required>
                <label for="poids_nourriture">Poids de la nourriture (kg):</label>
                <input type="number" id="poids_nourriture" name="poids_nourriture" step="0.01" required>
                <label for="detail_animal">Détails sur l'animal:</label>
                <textarea id="detail_animal" name="detail_animal"></textarea>
                <label for="detail_habitat">Détails sur l'habitat:</label>
                <textarea id="detail_habitat" name="detail_habitat" required></textarea>
                <button type="submit">Ajouter</button>
            </form>
        </div>
        <div class="passages">
            <h3>Historique des passages</h3>
            <?php foreach ($passages as $passage): ?>
                <div class="passage">
                    <p><strong>Date:</strong> <?php echo $passage['DATE']; ?></p>
                    <p><strong>Vétérinaire:</strong> <?php echo htmlspecialchars($passage['Vet_Username']); ?></p>
                    <p><strong>État:</strong> <?php echo htmlspecialchars($passage['Etat']); ?></p>
                    <p><strong>Nourriture:</strong> <?php echo htmlspecialchars($passage['Nourriture']); ?></p>
                    <p><strong>Poids de la nourriture:</strong> <?php echo $passage['Poids_Nourriture']; ?> kg</p>
                    <p><strong>Détails sur l'animal:</strong> <?php echo htmlspecialchars($passage['Detail_Animal']); ?></p>
                    <p><strong>Détails sur l'habitat:</strong> <?php echo htmlspecialchars($passage['Detail_Habitat']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

  <!-- end who section -->


  <!-- info section -->
  <section class="info_section ">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="info_contact">
            <h5>
              About Shop
            </h5>
            <div>
              <div class="img-box">
                <img src="images/location-white.png" width="18px" alt="">
              </div>
              <p>
                Address
              </p>
            </div>
            <div>
              <div class="img-box">
                <img src="images/telephone-white.png" width="12px" alt="">
              </div>
              <p>
                +01 1234567890
              </p>
            </div>
            <div>
              <div class="img-box">
                <img src="images/envelope-white.png" width="18px" alt="">
              </div>
              <p>
                demo@gmail.com
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_info">
            <h5>
              Informations
            </h5>
            <p>
              ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
            </p>
          </div>
        </div>

        <div class="col-md-3">
          <div class="info_insta">
            <h5>
              Instagram
            </h5>
            <div class="insta_container">
              <div>
                <a href="">
                  <div class="insta-box b-1">
                    <img src="images/insta.png" alt="">
                  </div>
                </a>
                <a href="">
                  <div class="insta-box b-2">
                    <img src="images/insta.png" alt="">
                  </div>
                </a>
              </div>

              <div>
                <a href="">
                  <div class="insta-box b-3">
                    <img src="images/insta.png" alt="">
                  </div>
                </a>
                <a href="">
                  <div class="insta-box b-4">
                    <img src="images/insta.png" alt="">
                  </div>
                </a>
              </div>
              <div>
                <a href="">
                  <div class="insta-box b-3">
                    <img src="images/insta.png" alt="">
                  </div>
                </a>
                <a href="">
                  <div class="insta-box b-4">
                    <img src="images/insta.png" alt="">
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_form ">
            <h5>
              Newsletter
            </h5>
            <form action="">
              <input type="email" placeholder="Enter your email">
              <button>
                Subscribe
              </button>
            </form>
            <div class="social_box">
              <a href="">
                <img src="images/fb.png" alt="">
              </a>
              <a href="">
                <img src="images/twitter.png" alt="">
              </a>
              <a href="">
                <img src="images/linkedin.png" alt="">
              </a>
              <a href="">
                <img src="images/youtube.png" alt="">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end info_section -->

  <!-- footer section -->

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- owl carousel script 
    -->
  <script type="text/javascript">
    $(".owl-carousel").owlCarousel({
      loop: true,
      margin: 0,
      navText: [],
      center: true,
      autoplay: true,
      autoplayHoverPause: true,
      responsive: {
        0: {
          items: 1
        },
        1000: {
          items: 3
        }
      }
    });
  </script>
  <!-- end owl carousel script -->

</body>

</html>