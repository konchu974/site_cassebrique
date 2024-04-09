<nav class="navbar navbar-expand-lg pt-2">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="../asset/3logo_brickbreaker.png" width="40" height="auto" alt="" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="<?php echo (basename($_SERVER['PHP_SELF']) == 'Homepage.php') ? 'nav-link active text-decoration-underline' : 'nav-link'; ?>" aria-current="page" href="Homepage.php">Acceuil</a>
                </li>
                <li class="nav-item">
                    <?php
                    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) {

                        echo '<a class="' . ((basename($_SERVER['PHP_SELF']) == 'gamepage.php') ? 'nav-link active text-decoration-underline' : 'nav-link') . '" href="gamepage.php">Jeux</a>';
                    } else {

                        echo '<a class="nav-link" href="#">Jeux</a>';
                    }
                    ?>

                </li>
                <li class="nav-item">
                    <a class="<?php echo (basename($_SERVER['PHP_SELF']) == 'leaderboard.php') ? 'nav-link active text-decoration-underline' : 'nav-link'; ?>" href="../front/leaderboard.php">LeaderBoard</a>
                </li>
                <li class="nav-item">
                    <a class="<?php echo (basename($_SERVER['PHP_SELF']) == 'aboutus.php') ? 'nav-link active text-decoration-underline' : 'nav-link'; ?>" href="../front/aboutus.php">A propos</a>
                </li>
            </ul>
            <span class="navbar-text">
                <ul class="navbar-nav">
        
                    <?php
                    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) {
                        $imgpro = $_SESSION['user_img'];
                        $score = $_SESSION['score'];

                        echo '<li class="nav-item">
            <a href="../back/logout.php"><button type="button" class="btn" style="color: #f49f80; background-color: #662483">
                    Deconnexion
                </button></a>
        </li>
        <li><img src="../asset/'. $imgpro .'" class="rounded-circle mx-1" style="width: 40px; height: 40px; border-style: solid;" alt="Avatar" />
        </li>';
                    } else {

                        echo ' <li class="nav-item">
              <a class="nav-link" href="connexion.php">Se connecter</a>
            </li>
            <li class="nav-item">
              <a href="register.php"><button type="button" class="btn" style="color: #f49f80; background-color: #662483">
                  Senregistrer
                </button></a>
            </li>';
                    }
                    ?>
                </ul>
            </span>
        </div>
    </div>
</nav>