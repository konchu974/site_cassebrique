<?php
session_start();
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

// Requête SQL pour sélectionner les 10 meilleurs joueurs en fonction de leur score
$sql = "SELECT * FROM utilisateur ORDER BY score DESC LIMIT 8";

// Exécution de la requête
try {
    $stmt = $pdo->query($sql);
    $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die('Erreur d\'exécution de la requête : ' . $e->getMessage());
}

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

<header class="mb-5 w-100" style="background-color: #f49f80">
    <?php include 'header.php'; ?>
</header>

<style>
     * {
    font-family: "Poppins", sans-serif;

  }
    body {
        height: 100%;
        width: 100%;
        min-height: 100vh;
        background-color: #fbfaff;
        display: flex;
        align-items: center;
        justify-content: center;
        justify-content: flex-start;
        flex-direction: column;
        /* Les éléments sont empilés verticalement */
        padding-top: 20px;
        padding-bottom: 30px;
        /* Aligner le contenu en haut de la page */

    }

    main {
        width: 40rem;
        height: 43rem;
        background-color: #ffffff;
        -webkit-box-shadow: 0px 5px 15px 8px #e4e7fb;
        box-shadow: 0px 5px 15px 8px #e4e7fb;
        display: flex;
        flex-direction: column;
        align-items: center;
        border-radius: 0.5rem;
        text-align: center;
    }





    h1 {
        font-family: "Rubik", sans-serif;
        font-size: 1.7rem;
        color: #141a39;
        text-transform: uppercase;
        cursor: default;
    }

    #leaderboard {
        width: 100%;
        position: relative;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        table-layout: fixed;
        color: #141a39;
        cursor: default;
    }

    tr {
        transition: all 0.2s ease-in-out;
        border-radius: 0.2rem;
    }

    tr:not(:first-child):hover {
        background-color: #fff;
        transform: scale(1.1);
        -webkit-box-shadow: 0px 5px 15px 8px #e4e7fb;
        box-shadow: 0px 5px 15px 8px #e4e7fb;
    }

    tr:nth-child(odd) {
        background-color: #f9f9f9;
    }

    tr:nth-child(1) {
        color: #fff;
    }

    td {
        height: 5rem;
        font-family: "Rubik", sans-serif;
        font-size: 1.4rem;
        padding: 1rem 2rem;
        position: relative;
    }

    .number {
        width: 1rem;
        font-size: 2.2rem;
        font-weight: bold;
        text-align: left;
    }

    .name {
        text-align: left;
        font-size: 1.2rem;
    }

    .points {
        font-weight: bold;
        font-size: 1.3rem;
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }

    .points:first-child {
        width: 10rem;
    }

    .gold-medal {
        height: 3rem;
        margin-left: 1.5rem;
    }

    .ribbon {
        width: 42rem;
        height: 5.5rem;
        top: -0.5rem;
        background-color: #662483;
        position: absolute;
        left: -1rem;
        -webkit-box-shadow: 0px 15px 11px -6px #7a7a7d;
        box-shadow: 0px 15px 11px -6px #7a7a7d;
    }

    .ribbon::before {
        content: "";
        height: 1.5rem;
        width: 1.5rem;
        bottom: -0.8rem;
        left: 0.35rem;
        transform: rotate(45deg);
        background-color: #5c5be5;
        position: absolute;
        z-index: -1;
    }

    .ribbon::after {
        content: "";
        height: 1.5rem;
        width: 1.5rem;
        bottom: -0.8rem;
        right: 0.35rem;
        transform: rotate(45deg);
        background-color: #5c5be5;
        position: absolute;
        z-index: -1;
    }




    @media (max-width: 740px) {
        * {
            font-size: 70%;
        }
    }

    @media (max-width: 500px) {
        * {
            font-size: 55%;
        }
    }

    @media (max-width: 390px) {
        * {
            font-size: 45%;
        }
    }
</style>


<body>
    <main>

        <div id="leaderboard">
            <div class="ribbon"></div>
            <table>
                <tr>
                    <?php foreach ($resultats as $key => $row) { ?>
                <tr>
                    <td class="number"><?php echo $key + 1; ?></td>
                    <td class="name"><?php echo $row['pseudo']; ?></td>
                    <td class="points">
                        <?php echo $row['score'];
                        if ($key == 0) {
                        ?><img class="gold-medal" src="https://github.com/malunaridev/Challenges-iCodeThis/blob/master/4-leaderboard/assets/gold-medal.png?raw=true" alt="gold medal" />
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>

            </table>
        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

<footer class="text-center text-white w-100 mt-5" style="background-color: #662483">
<?php include 'footer.php'; ?>

</footer>

</html>