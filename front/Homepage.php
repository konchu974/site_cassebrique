<?php
session_start();

?>


<!DOCTYPE html>
<html lang="fr">

<head>
  <title>instant Casse-brique</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
   * {
    font-family: "Poppins", sans-serif;

  }

  h1, h2, h3, h4, h5{
    font-family: "Abril Fatface", serif;
  }

  .carousel {
    width: 100%;
    height: 546;
    text-align: center;
    padding: auto;
    margin-bottom: 100px;
  }
</style>
<header style="background-color: #f49f80">
  <?php include 'header.php'; ?>
</header>

<body>
  <div style="background-color: #fddfbc">
    <div class="container pt-5 pb-3">
      <h1 class="text-center display-1">Instant Casse-brique</h1>
      <p class="text-center">
        Le site regroupant tout les casse brique des DI
      </p>
      <div class="text-center">
        <?php
        if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) {

          echo ' <a href="gamepage.php"><button type="button" class="btn" style="
            text-align: center;
            background-color: #662483;
            color: #fddfbc;
          ">
        jouer
      </button></a>';
        } else {

          echo ' <a href="#"><button type="button" class="btn" style="
              text-align: center;
              background-color: #662483;
              color: #fddfbc;
            "
            id="monBouton">
          jouer
        </button></a>';
        }
        ?>

      </div>
    </div>

    <div id="carouselExampleSlidesOnly" class="carousel slide pb-5" data-bs-ride="carousel">
      <div class="carousel-inner pt-5 pb_5">
        <div class="carousel-item active">
          <img src="https://picsum.photos/1200/446" class="d-block w-100" alt="..." />
        </div>
        <div class="carousel-item">
          <img src="https://picsum.photos/1201/446" class="d-block w-100" alt="..." />
        </div>
        <div class="carousel-item">
          <img src="https://picsum.photos/1203/446" class="d-block w-100" alt="..." />
        </div>
      </div>
    </div>
  </div>

  <!-- _________________________________________________________________________________________________________________ -->

  <?php

  // Connexion à la base de données
  $dsn = 'mysql:host=localhost;dbname=casseb;charset=utf8';
  $username = 'root';
  $password = '';

  try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    die('Erreur de connexion : ' . $e->getMessage());
  }

  // Requête SQL pour sélectionner deux jeux aléatoires avec leurs créateurs
  $sql = "SELECT j.*, c.*
        FROM jeux_ j
        LEFT JOIN creer cr ON j.Id_Jeux_ = cr.Id_Jeux_
        LEFT JOIN createur c ON cr.Id_createur = c.Id_createur
        ORDER BY RAND()
        LIMIT 2";

  // Exécution de la requête
  try {
    $stmt = $pdo->query($sql);
    $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
    die('Erreur d\'exécution de la requête : ' . $e->getMessage());
  }

  // Affichage des résultats dans le format Bootstrap
  foreach ($resultats as $key => $row) {
  ?>
    <div class="card m-5 mt-5" style="max-width: 90%">
      <div class="row g-0">
        <?php if ($key == 0) { ?>
          <div class="col-md-3">
            <img src="<?php echo $row['img_jeux']; ?>" class="img-fluid rounded-start m-5 pb-5" alt="..." width="504" height="524" />
          </div>
          <div class="col-md-8">
            <div class="card-body m-5 pb-5">
              <h2 class="card-title m-5"><?php echo $row['nom_jeux']; ?></h2>
              <p class="card-text m-5 pb-5">
                <?php echo $row['description']; ?>
              </p>
              <p class="card-text">
                <small class="text-body-secondary m-5 pb-3">créé en <?php echo $row['date_creation']; ?></small>
              </p>
            </div>
          </div>
        <?php } else { ?>
          <div class="col-md-8">
            <div class="card-body m-5 pb-5">
              <h2 class="card-title m-5"><?php echo $row['nom_jeux']; ?></h2>
              <p class="card-text m-5 pb-5">
                <?php echo $row['description']; ?>
              </p>
              <p class="card-text">
                <small class="text-body-secondary m-5 pb-3">créé en <?php echo $row['date_creation']; ?></small>
              </p>
            </div>
          </div>
          <div class="col-md-3">
            <img src="<?php echo $row['img_jeux']; ?>" class="img-fluid rounded-start m-5 pb-5" alt="..." width="504" height="524" />
          </div>
        <?php } ?>
      </div>
    </div>
  <?php
  }

  ?>
  <!-- -------------------------------------------------- -->

  <div class="container pt-5 pb-5">
    <p class="text-center">Une experience unique</p>
    <h1 class="text-center">Le meilleur Casse-brique</h1>
  </div>

  <div class="embed-responsive embed-responsive-16by9 m-5 pb-5" style="text-align: center">
    <iframe width="1200" height="538" src="https://www.youtube.com/embed/dQw4w9WgXcQ?si=TRzMAyZAupvAgTTn" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
  </div>
  <script>
    var bouton = document.getElementById("monBouton");

    // Ajout d'un gestionnaire d'événements pour le clic sur le bouton
    bouton.addEventListener("click", function() {
      // Affichage de l'alerte
      alert("Vous n'êtes pas connectez? Vous allez être redirigé vers une autre page.");

      // Redirection vers une autre page après une courte pause (par exemple, 1 seconde)
      setTimeout(function() {
        // Remplacez "page_destination.php" par l'URL de la page vers laquelle vous souhaitez rediriger
        window.location.href = "connexion.php";
      }, 1000); // Délai en millisecondes (ici, 1000 ms = 1 seconde)
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

<footer class="text-center text-white" style="background-color: #662483">
<?php include 'footer.php'; ?>

</footer>

</html>