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

<body>
    <?php
      session_start();
      $guestSignedIn = isset($_SESSION['guest_id']);
    ?>

    <!-- Trigger/Open The Popup -->
    <button id="signInBtn" style="display:none;">Guest Sign In</button>

    <!-- The Popup -->
    <div id="signInPopup" class="popup">
        <!-- Popup content -->
        <div class="popup-content">
            <span class="close">&times;</span>
            <h2>Guest Sign In</h2>
            <form id="signInForm" action="guest_signin.php" method="post">
                <input type="email" name="guest_email" placeholder="Email" required>
                <input type="password" name="guest_password" placeholder="Password" required>
                <button type="submit">Sign In</button>
            </form>
        </div>
    </div>

    <script>
        // Get the popup
        var popup = document.getElementById('signInPopup');

        // Get the <span> element that closes the popup
        var span = document.getElementsByClassName('close')[0];

        // Check if the guest is signed in
        var guestSignedIn = <?php echo json_encode($guestSignedIn); ?>;

        // When the user clicks on <span> (x), close the popup
        span.onclick = function() {
            popup.style.display = 'none';
        }

        // When the user clicks anywhere outside of the popup, close it
        window.onclick = function(event) {
            if (event.target == popup) {
                popup.style.display = 'none';
            }
        }

        // Show the popup if the guest is not signed in
        if (!guestSignedIn) {
            popup.style.display = 'block';
        }
    </script>
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
                <a href="login.php" >
                  <img src="../img/user.png" alt="">
                </a>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class=" slider_section position-relative">
      <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="row">
                <div class="col">
                  <div class="detail-box">
                    <div>
                      <h2>
                        Bienvenu à
                      </h2>
                      <h1>
                        Arcadia
                      </h1>
                      <p>
                        Le zoo Arcadia est un parc zoologique moderne dédié à la conservation de la faune, offrant des habitats naturels et des programmes éducatifs immersifs pour les visiteurs de tous âges.
                      </p>
                      <div class="">
                        <a href="">
                          Contacter-nous
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="row">
                <div class="col">
                  <div class="detail-box">
                    <div>
                      <h2>
                        Explorez nos
                      </h2>
                      <h1>
                        Habitats Exotiques
                      </h1>
                      <p>
                        Découvrez une variété d'habitats exotiques recréés pour offrir un environnement naturel à nos animaux, allant des savanes africaines aux jungles tropicales.
                      </p>
                      <div class="">
                        <a href="">
                          En savoir plus
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="row">
                <div class="col">
                  <div class="detail-box">
                    <div>
                      <h2>
                        Participez à
                      </h2>
                      <h1>
                        Nos Programmes Éducatifs
                      </h1>
                      <p>
                        Joignez-vous à nos ateliers interactifs et nos visites guidées pour en apprendre davantage sur la conservation de la faune et les efforts de préservation des espèces menacées.
                      </p>
                      <div class="">
                        <a href="">
                          Réservez maintenant
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end slider section -->
  </div>

  <!-- do section -->

  <section class="do_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          What we do
        </h2>
        <p>
          Le parc Arcadia se consacre à la conservation de la faune et à l'éducation environnementale. 
          Il offre des soins de santé de qualité pour les animaux, des programmes éducatifs interactifs pour les visiteurs, et des services variés pour assurer une expérience enrichissante et confortable.
        </p>
      </div>
      <div class="do_container">
        <div class="box arrow-start arrow_bg">
          <div class="img-box">
            <img src="../img/d-1.png" alt="">
          </div>
          <div class="detail-box">
            <h6>
              Marketing
            </h6>
          </div>
        </div>
        <div class="box arrow-middle arrow_bg">
          <div class="img-box">
            <img src="../img/d-2.png" alt="">
          </div>
          <div class="detail-box">
            <h6>
              Education
            </h6>
          </div>
        </div>
        <div class="box arrow-middle arrow_bg">
          <div class="img-box">
            <img src="../img/d-3.png" alt="">
          </div>
          <div class="detail-box">
            <h6>
              Services
            </h6>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end do section -->

  <!-- who section -->

  <section class="who_section ">
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <div class="img-box">
            <img src="../img/who-img.jpg" alt="">
          </div>
        </div>
        <div class="col-md-7">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                WHO WE ARE?
              </h2>
            </div>
            <p>
              Le parc Arcadia est dirigé par une équipe passionnée de professionnels de la faune, incluant des vétérinaires, des biologistes et des éducateurs. 
              Ils travaillent ensemble pour garantir le bien-être des animaux, promouvoir la conservation et offrir une expérience mémorable à chaque visiteur.
            </p>
            <div>
              <a href="">
                Read More
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end who section -->


  <!-- work section -->
  <section class="work_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Nos animaux
        </h2>
        <p>
        Nous aimons les animaux et nous nous engageons à leur offrir un environnement sûr et enrichissant où ils peuvent s'épanouir.
        </p>
      </div>
      <div class="work_container layout_padding2">
        <div class="box b-1">
          <img src="../img/w-1.png" alt="">
        </div>
        <div class="box b-2">
          <img src="../img/w-2.png" alt="">

        </div>
        <div class="box b-3">
          <img src="../img/w-3.png" alt="">

        </div>
        <div class="box b-4">
          <img src="../img/w-4.png" alt="">

        </div>
      </div>
    </div>
  </section>

  <!-- end work section -->

  <!-- client section -->
  <section class="client_section">
    <div class="container">
      <div class="heading_container">
        <h2>
          Nos avis
        </h2>
      </div>
      <div class="carousel-wrap">
        <div class="owl-carousel">
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="../img/c-1.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Une expérience enrichissante <br>
                  <span>
                    Très instructif
                  </span>
                </h5>
                <img src="../img/quote.png" alt="">
                <p>
                  J'ai passé un moment formidable au parc Arcadia, découvrant des informations fascinantes sur la faune et la conservation.
                </p>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="../img/c-2.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Très bien organisé <br>
                  <span>
                    Éducatif et amusant
                  </span>
                </h5>
                <img src="../img/quote.png" alt="">
                <p>
                  Le zoo Arcadia offre une expérience éducative exceptionnelle, avec des installations bien entretenues et une équipe passionnée.
                </p>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="../img/c-3.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Magnifique découverte <br>
                  <span>
                    À ne pas manquer
                  </span>
                </h5>
                <img src="../img/quote.png" alt="">
                <p>
                  Mes enfants et moi avons adoré notre visite au zoo Arcadia. Les animaux étaient bien soignés et l'atmosphère était conviviale.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end client section -->

  <!-- target section -->
  <section class="target_section layout_padding2">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-6">
          <div class="detail-box">
            <h2>
              Plus de 5000
            </h2>
            <h5>
              Espèces Animales
            </h5>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="detail-box">
            <h2>
              100+
            </h2>
            <h5>
              Programmes Éducatifs
            </h5>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="detail-box">
            <h2>
              300000+
            </h2>
            <h5>
              Visiteurs Annuellement
            </h5>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="detail-box">
            <h2>
              50+
            </h2>
            <h5>
              Années de Conservation
            </h5>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end target section -->


  <!-- contact section -->

  <section class="contact_section layout_padding">
    <div class="container">

      <div class="heading_container">
        <h2>
          Review
        </h2>
      </div>
      <div class="">
        <div class="">
          <div class="row">
            <div class="col-md-9 mx-auto">
              <div class="contact-form">
                <form action="">
                  <div>
                    <input type="text" placeholder="Full Name">
                  </div>
                  <div>
                    <input type="text" placeholder="Phone Number">
                  </div>
                  <div>
                    <input type="email" placeholder="Email Address">
                  </div>
                  <div>
                    <input type="text" placeholder="Message" class="input_message">
                  </div>
                  <div class="d-flex justify-content-center">
                    <button type="submit" class="btn_on-hover">
                      Send
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- end contact section -->


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
                <img src="../img/location-white.png" width="18px" alt="">
              </div>
              <p>
                Address
              </p>
            </div>
            <div>
              <div class="img-box">
                <img src="../img/telephone-white.png" width="12px" alt="">
              </div>
              <p>
                +01 1234567890
              </p>
            </div>
            <div>
              <div class="img-box">
                <img src="../img/envelope-white.png" width="18px" alt="">
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
                    <img src="../img/insta.png" alt="">
                  </div>
                </a>
                <a href="">
                  <div class="insta-box b-2">
                    <img src="../img/insta.png" alt="">
                  </div>
                </a>
              </div>

              <div>
                <a href="">
                  <div class="insta-box b-3">
                    <img src="../img/insta.png" alt="">
                  </div>
                </a>
                <a href="">
                  <div class="insta-box b-4">
                    <img src="../img/insta.png" alt="">
                  </div>
                </a>
              </div>
              <div>
                <a href="">
                  <div class="insta-box b-3">
                    <img src="../img/insta.png" alt="">
                  </div>
                </a>
                <a href="">
                  <div class="insta-box b-4">
                    <img src="../img/insta.png" alt="">
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
                <img src="../img/fb.png" alt="">
              </a>
              <a href="">
                <img src="../img/twitter.png" alt="">
              </a>
              <a href="">
                <img src="../img/linkedin.png" alt="">
              </a>
              <a href="">
                <img src="../img/youtube.png" alt="">
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