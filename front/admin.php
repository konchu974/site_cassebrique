<?php
session_start();

$login = $_SESSION['user'];


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
  <script src="https://kit.fontawesome.com/dc5f9d95ad.js" crossorigin="anonymous"></script>
</head>
<style>
   * {
    font-family: "Poppins", sans-serif;

  }

</style>
<header style="background-color: #f49f80">
  <?php include 'header.php'; ?>
</header>

<style>
  table td,
  table th {
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
  }

  .card {
    border-radius: .5rem;
  }

  .mask-custom {
    background: rgba(24, 24, 16, .2);
    border-radius: 2em;
    backdrop-filter: blur(25px);
    border: 2px solid rgba(255, 255, 255, 0.05);
    background-clip: padding-box;
    box-shadow: 10px 10px 10px rgba(46, 54, 68, 0.03);
  }

  /* Afficher les astérisques par défaut */
  .password::before {
    content: "*****";
  }

  /* Au survol, afficher le vrai mot de passe */
  .password:hover::before {
    content: attr(data-password);
    /* Afficher le contenu de l'attribut data-password */
  }
</style>

<body>

  <?php
  if ($login == "" || $login == "admin") {
    echo ' 
  
  <section class="py-6 p-5 m-5">
	<div class="container bg-light min-vh-50 py-6 d-flex justify-content-center align-items-center" style="max-width:1920px">
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="lc-block mb-4">
					<div editable="rich">
						<h1 class="fw-bold display-1">vous n’avez pas le droit d’etre ici</h1>
					</div>
				</div>
				<div class="lc-block">
					<div editable="rich">
						<p class="h2">désole mais l’accés à cette page vous est restreint</p>
						<p class="lead">cliquez sur le bouton pour retourner a la page d’acceuil</p>
					</div>
				</div>
				<div class="lc-block">
					<a class="btn btn-primary" href="HOMEPAGE.php" role="button">OUPS</a>
				</div><!-- /lc-block -->
			</div><!-- /col -->
		</div>
	</div>
</section>
<footer class="text-center text-white" style="background-color: #662483">
    <div class="container">
      <section>
        <div class="row text-center d-flex justify-content-center pt-3">
          <div class="col-md-2">
            <h6 class="text-uppercase font-weight-bold">
              <a href="../front/aboutus.php" class="text-white">A propos</a>
            </h6>
          </div>

          <div class="col-md-2">
            <h6 class="text-uppercase font-weight-bold">
              <a href="#!" class="text-white">Jeux</a>
            </h6>
          </div>

          <div class="col-md-2">
            <h6 class="text-uppercase font-weight-bold">
              <a href="../front/leaderboard.php" class="text-white">Leader board</a>
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
            <img src="../asset/3logo_brickbreaker.png" height="50px" alt="" class="pb-3" />
          </div>
        </div>
      </section>
    </div>

    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
      © 2020 Copyright:
      <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
    </div>
  </footer>
 
  
';
  } else { ?>
    <section class="intro">
      <div class="bg-image h-100" style="background-color: #6095F0;">
        <div class="mask d-flex align-items-center h-100">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-12">
                <div class="card shadow-2-strong" style="background-color: #f5f7fa;">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-borderless mb-0">
                        <thead>
                          <tr>

                            <th scope="col">Nom</th>
                            <th scope="col">Prénom</th>
                            <th scope="col">Pseudo</th>
                            <th scope="col">Mot de passe</th>
                            <th scope="col">Sexe</th>
                            <th scope="col">score</th>
                            <th scope="col">delete</th>

                          </tr>
                        </thead>




                        <?php
                        // Connexion à la base de données
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "casseB";

                        // Connexion à la base de données avec PDO
                        try {
                          $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                          // Configuration pour gérer les exceptions PDO
                          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                          // Vérification si un utilisateur doit être supprimé
                          if (isset($_GET['delete_id'])) {
                            $delete_id = $_GET['delete_id'];
                            // Préparation de la requête SQL pour supprimer l'utilisateur
                            $sql_delete = "DELETE FROM utilisateur WHERE Id_utilisateur = :id";
                            $stmt_delete = $pdo->prepare($sql_delete);
                            $stmt_delete->bindParam(':id', $delete_id, PDO::PARAM_INT);
                            // Exécution de la requête préparée pour supprimer l'utilisateur
                            $stmt_delete->execute();
                          }

                          // Requête SQL pour sélectionner tous les utilisateurs
                          $sql_select = "SELECT * FROM utilisateur WHERE pseudo <> 'admin';" ;
                          $stmt_select = $pdo->query($sql_select);

                          // Vérification s'il y a des résultats
                          if ($stmt_select->rowCount() > 0) {
                            // Afficher les données de chaque ligne avec un lien pour supprimer
                            while ($row = $stmt_select->fetch(PDO::FETCH_ASSOC)) {
                              echo '<tbody>
          <tr>
            
            <td>' . $row["nom"] . '</td>
            <td>' . $row["prénom"] . '</td>
            <td>' . $row["pseudo"] . '</td>
            <td>
            <span class="password" data-password="' . $row['mdp'] . '"></span>
            </td>
            <td>' . $row["sexe"] . '</td>
            <td>' . $row["score"] . '</td>
            <td>
            <a href="?delete_id=' . $row["Id_utilisateur"] . '" onclick="return confirm(\'Êtes-vous sûr de vouloir supprimer cet utilisateur ?\')"><button type="button" class="btn btn-danger btn-sm px-3">
            <i class="fa-solid fa-user-minus" style="color: white;"></i>
              </button></a>
            </td>
          </tr>';
                            }
                            echo "</tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
</section>";
                          } else {
                            echo "Aucun utilisateur trouvé.";
                          }
                        } catch (PDOException $e) {
                          echo "Erreur de connexion à la base de données : " . $e->getMessage();
                        }

                        // Fermer la connexion à la base de données (facultatif avec PDO)
                        $pdo = null;
                        ?>

                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</body>
<footer class="text-center text-white" style="background-color: #662483">
<?php include 'footer.php'; ?>

</footer>
<?php } ?>

</html>