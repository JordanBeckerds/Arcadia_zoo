<?php
// Include the check_login.php file which contains our functions
require_once '../config/check_login.php';

// Call the check_admin() function to enforce admin access
check_vet();

// If check_admin() passes, continue to display the admin panel

require_once '../config/db.php';

$database = new Database();
$conn = $database->getConnection();

$query = "
    SELECT h.Habitat_Id, h.Nom as HabitatNom, h.Img as HabitatImg, h.Desc as HabitatDesc, 
           a.Animal_Id, a.Nom as AnimalNom, a.Race as AnimalRace, a.Img as AnimalImg, 
           p.Detail_Habitat 
    FROM habitats h
    LEFT JOIN animaux a ON h.Habitat_Id = a.Habitat_Id
    LEFT JOIN passages p ON a.Animal_Id = p.Animal_Id
    GROUP BY h.Habitat_Id, a.Animal_Id
    ORDER BY h.Nom, a.Nom, p.DATE DESC";
$stmt = $conn->prepare($query);
$stmt->execute();

$habitats = [];
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $habitatId = $row['Habitat_Id'];
    if (!isset($habitats[$habitatId])) {
        $habitats[$habitatId] = [
            'Nom' => $row['HabitatNom'],
            'Desc' => $row['HabitatDesc'],
            'Detail_Habitat' => $row['Detail_Habitat'],
            'Animaux' => []
        ];
    }
    if ($row['Animal_Id']) {
        $habitats[$habitatId]['Animaux'][] = [
            'Animal_Id' => $row['Animal_Id'],
            'Nom' => $row['AnimalNom'],
            'Race' => $row['AnimalRace'],
            'Img' => $row['AnimalImg']
        ];
    }
}
?>

<!-- Reviews.php -->

<?php
// Include database connection
include_once '../config/db.php';

// Initialize Database connection
$database = new Database();
$conn = $database->getConnection();

// Query to fetch validated reviews
$query_validated = "SELECT * FROM reviews WHERE Valider = 1";
$stmt_validated = $conn->prepare($query_validated);
$stmt_validated->execute();
$validated_reviews = $stmt_validated->fetchAll(PDO::FETCH_ASSOC);
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
        <?php foreach ($habitats as $habitat): ?>
            <div class="habitat">
                <h2><?php echo htmlspecialchars($habitat['Nom']); ?></h2>
                <p><?php echo htmlspecialchars($habitat['Desc']); ?></p>
                <p>Dernière mise à jour de l'habitat: <?php echo htmlspecialchars($habitat['Detail_Habitat']); ?></p>
                <div class="animals">
                    <?php foreach ($habitat['Animaux'] as $animal): ?>
                        <div class="animal">
                            <a href="Animal.php?id=<?php echo $animal['Animal_Id']; ?>">
                                <h3><?php echo htmlspecialchars($animal['Nom']); ?></h3>
                                <img src="data:image/jpeg;base64,<?php echo base64_encode($animal['Img']); ?>" alt="<?php echo htmlspecialchars($animal['Nom']); ?>">
                                <p><?php echo htmlspecialchars($animal['Race']); ?></p>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
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