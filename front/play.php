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
</style>
<header style="background-color: #f49f80">
  <?php include 'header.php'; ?>
</header>

<body>


  <?php
  $dsn = 'mysql:host=localhost;dbname=casseb;charset=utf8';
  $username = 'root';
  $password = '';

  try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    die('Erreur de connexion : ' . $e->getMessage());
  }
  if (isset($_GET['id_jeux'])) {
    $id_jeux = $_GET['id_jeux'];

    $query = $pdo->prepare("SELECT * FROM jeux_ WHERE Id_Jeux_ = :id");
    $query->bindParam(':id', $id_jeux);
    $query->execute();

    // Vérifie s'il y a des résultats
    if ($query->rowCount() > 0) {
      $jeu = $query->fetch();

      echo '<div class="card text-center">
        <div class="card-header">
          <h3 class="pt-4">Game</h3>
        </div>
        <div class="card-body">
        <iframe width="1200" height="538" src="https://www.youtube.com/embed/dQw4w9WgXcQ?si=TRzMAyZAupvAgTTn" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

          <h5 class="card-title">' . $jeu["nom_jeux"] . '</h5>
          <p class="card-text">' . $jeu["description"] . '</p>
        </div>
        <div class="card-footer text-body-secondary">créer en : 
        ' . $jeu["date_creation"] . '
        </div>
      </div>';
    } else {
      echo "Aucun jeu trouvé avec cet ID.";
    }
  } else {
    echo "ID du jeu non spécifié";
  }
  ?>




</body>


<footer class="text-center text-white" style="background-color: #662483">
<?php include 'footer.php'; ?>

</footer>

</html>