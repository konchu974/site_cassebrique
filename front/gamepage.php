<?php
session_start();
require_once("../back/manipulation.php");
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

<header style="background-color: #f49f80;">
    <?php include 'header.php'; ?>
</header>

<body>


    <?php

    echo "<div class='row row-cols-1 row-cols-md-4 g-5 mx-auto mt-2'>";

    while ($row = $stmt->fetch()) {
        if ($row['nom_jeux'] != $current_jeux) {
            if ($current_jeux !== null) {
            }
            echo "<div class='col'>";
            echo '<div class="card h-100 ">
            <img src="' . $row["img_jeux"] . '" class="card-img-top mx-auto mt-4 img-fluid shadow rounded" alt="..." style= "width:250px;
            height: 250px">
            <div class="card-body">
              <h5 class="card-title">' . $row["nom_jeux"] . '</h5>
              <p class="card-text ">' . $row["description"] . '</p>
              </div>
              <div class="d-grid gap-2 d-md-flex justify-content-md-end m-3">
              <a href="play.php?id_jeux=' . $row["Id_Jeux_"] . '" class="btn btn-primary btn-lg shadow-lg rounded">Jouer</a>

              </div>
            <div class="card-footer">
              <small class="text-body-secondary">Creer le: ' . $row["date_creation"] . ' par: ' . $row["nom"] . ' ' . $row["prenom"] . '<br>alias ' . $row["pseudo"] . ' en ' . $row["année"] . '</small>
            </div>
          </div>
        </div>';

            $current_jeux = $row['nom_jeux']; 
            $current_jeux_id = $row['Id_Jeux_'];
        }
    }





    ?>
</body>

<footer class="text-center text-white w-100" style="background-color: #662483">
<?php include 'footer.php'; ?>

</footer>

</html>