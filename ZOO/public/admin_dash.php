<?php
// Include the check_login.php file which contains our functions
require_once '../config/check_login.php';

// Call the check_admin() function to enforce admin access
check_admin();

// If check_admin() passes, continue to display the admin panel
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

  <!-- end Manage Users,animals,habitats,services section -->

  <div class="container">
    <!-- User Management Section -->
    <section id="user-management">
        <h2>Gestion des Utilisateurs</h2>
        <div class="add-bar">
            <form id="add-user-form" method="POST" action="../controllers/ManageController.php">
                <input type="text" name="username" placeholder="Nom d'utilisateur" required>
                <input type="password" name="password" placeholder="Mot de passe" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="number" name="rank" placeholder="Rank" required>
                <input type="hidden" name="action" value="addUser">
                <button type="submit">Ajouter</button>
            </form>
        </div>
        <div id="user-list">
            <!-- Users will be listed here -->
            <?php
            // Set the error reporting level
            error_reporting(E_ALL);
            ini_set('display_errors', 1);

            // Include the ManageController to list users
            require_once '../controllers/ManageController.php';
            listUsers($conn);
            ?>
        </div>
    </section>
    <!-- Animal Management Section -->
    <section id="animal-management">
        <h2>Gestion des Animaux</h2>
        <div class="add-bar">
            <form id="add-animal-form" method="POST" action="../controllers/ManageController.php" enctype="multipart/form-data">
                <input type="text" name="nom" placeholder="Nom" required>
                <input type="text" name="race" placeholder="Race" required>
                <input type="file" name="img" placeholder="Image" required>
                <input type="number" name="habitat_id" placeholder="ID Habitat" required>
                <input type="hidden" name="action" value="addAnimal">
                <button type="submit">Ajouter</button>
            </form>
        </div>
        <div id="animal-list">
            <!-- Animals will be listed here -->
            <?php
            listAnimals($conn);
            ?>
        </div>
    </section>
    <!-- Habitat Management Section -->
    <section id="habitat-management">
        <h2>Gestion des Habitats</h2>
        <div class="add-bar">
            <form id="add-habitat-form" method="POST" action="../controllers/ManageController.php" enctype="multipart/form-data">
                <input type="text" name="nom" placeholder="Nom" required>
                <input type="file" name="img" placeholder="Image" required>
                <input type="text" name="desc" placeholder="Description" required>
                <input type="hidden" name="action" value="addHabitat">
                <button type="submit">Ajouter</button>
            </form>
        </div>
        <div id="habitat-list">
            <!-- Habitats will be listed here -->
            <?php
            listHabitats($conn);
            ?>
        </div>
    </section>
  </div>
  

  <!-- end Manage Users,animals,habitats,services section -->

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