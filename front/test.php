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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/pagejeuw.css">
</head>


<header style="background-color: #f49f80;">
    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid ">
            <a class="navbar-brand" href="#"><img src="../asset/3logo_brickbreaker.png" width="40" height="auto" alt="" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="Homepage.html">Acceuil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Jeux</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">LeaderBoard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">A propos</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a href="register.html"><button type="button" class="btn" style="color: #f49f80; background-color: #662483">
                                    Deconnexion
                                </button></a>
                        </li>
                    </ul>
                </span>
            </div>
        </div>
    </nav>
</header>

<body>


    <?php

    $executed = false;
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
                  <button class="btn btn-primary btn-lg shadow-lg rounded" type="button">jouer</button>
              </div>
            <div class="card-footer">
              <small class="text-body-secondary">Creer le: ' . $row["date_creation"] . '</small>
            </div>
          </div>
        </div>';

            $current_jeux = $row['nom_jeux']; // Mettre à jour la jeux actuelle
            $current_jeux_id = $row['Id_Jeux_'];
        }
    }





    ?>
</body>

<footer class="text-center text-white w-100" style="background-color: #662483">
    <div class="container ">
        <section>
            <div class="row text-center d-flex justify-content-center pt-3">
                <div class="col-md-2">
                    <h6 class="text-uppercase font-weight-bold">
                        <a href="#!" class="text-white">A propos</a>
                    </h6>
                </div>

                <div class="col-md-2">
                    <h6 class="text-uppercase font-weight-bold">
                        <a href="#!" class="text-white">Jeux</a>
                    </h6>
                </div>

                <div class="col-md-2">
                    <h6 class="text-uppercase font-weight-bold">
                        <a href="#!" class="text-white">Leader board</a>
                    </h6>
                </div>

                <div class="col-md-2">
                    <h6 class="text-uppercase font-weight-bold">
                        <a href="#!" class="text-white">Contact</a>
                    </h6>
                </div>
            </div>
        </section>

        <hr class="mt-2" />
        <section>
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt
                        distinctio earum repellat quaerat voluptatibus placeat nam,
                        commodi optio pariatur est quia magnam eum harum corrupti dicta,
                        aliquam sequi voluptate quas.
                    </p>
                    <img src="/site_cassebrique/asset/logo_brickbreaker.svg" height="50px" alt="" class="pb-3" />
                </div>
            </div>
        </section>
    </div>

    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
        © 2020 Copyright:
        <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
    </div>
</footer>

</html>