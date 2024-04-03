<?php
if(isset($_FILES['picture'])){
    $tmpName = $_FILES['picture']['tmp_name'];
    $name = $_FILES['picture']['name'];
    $size = $_FILES['picture']['size'];
    $error = $_FILES['picture']['error'];
  
    $tabExtension = explode('.', $name);
  $extension = strtolower(end($tabExtension));
  
  $extensions = ['jpg', 'png', 'jpeg', 'gif'];
  $maxSize = 400000;
}
  if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){
    $uniqueName = uniqid('', true);
      //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
      $file = $uniqueName.".".$extension;
      //$file = 5f586bf96dcd38.73540086.jpg
    
    move_uploaded_file($tmpName, '../asset/'.$name);
  }
  else{
    echo "Une erreur est survenue";
  }
//check si bon requete recu 
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    $msg = "Méthode POSt attendue. Reçu :" . $_SERVER["REQUEST_METHOD"];
    header("Location: error.php?msg=" . $msg);
    exit();
}


$login = (isset($_POST['pseudo'])) ? $_POST['pseudo'] : "";

$pwd_unhashed = (isset($_POST['password'])) ? $_POST['password'] : "";
$pwd_unhashed_check = (isset($_POST['password_check'])) ? $_POST['password_check'] : "";
$nom = (isset($_POST['nom'])) ? $_POST['nom'] : "";
$prenom = (isset($_POST['prenom'])) ? $_POST['prenom'] : "";
$sexe = (isset($_POST['inlineRadioOptions'])) ? $_POST['inlineRadioOptions'] : "";
$picture = $uniqueName.".".$extension;
//$file = 5f586bf96dcd38.73540086.jpg
move_uploaded_file($tmpName, './upload/'.$file);





if ($pwd_unhashed != $pwd_unhashed_check) {
    $msg = "Les deux mots de passes ne correspondent pas.";
    header("Location: error.php?msg=" . $msg);
    exit();
}



// verifie erreur
                                                
if (
    $login == "" || $pwd_unhashed == "" || $nom == "" || $prenom == ""
) {
    $msg = "Une des valeurs est vide :" . "<br>";
    $msg = $msg . " - Pseudo -> " . $login . "<br>";
    $msg = $msg . " - Password -> " . $pwd_unhashed . "<br>";
    $msg = $msg . " - prenom -> " . $prenom . "<br>";
    $msg = $msg . " - prenom -> " . $nom . "<br>";

    header("Location: error.php?msg=" . $msg);
    exit();
}




//connexion BDD
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'casseB';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo_conn = new PDO($dsn, $user, $password, $options);
} catch (PDOException $e) {
    $msg = $e->getMessage();
    header("Location: error.php?msg=" . $msg);
    die("Connection failed: " . $e->getMessage() . ' <br> Wtih error n° ' . (int)$e->getCode());
}







//requete sql
$msg = "";

$sql = "SELECT COUNT(*) AS cnt
        FROM utilisateur
        WHERE pseudo = :login";
$stmt = $pdo_conn->prepare($sql);
$stmt->bindParam(':login', $login);
$stmt->execute();

if ($row = $stmt->fetch()) {
    if ((int)$row["cnt"] != 0) {
        $msg = "Login already exists in DB.";
    }
} else {
    $msg = "Erreur SQL ?";
}
if ($msg != "") {
    header("Location: error.php?msg=" . $msg);
    exit();
}



//ajout a la BDD        
                 
$sql = "INSERT INTO utilisateur (nom, prénom, pseudo, mdp, sexe, photo_pro) 
        VALUES (:nom, :prenom, :login, :password, :sexe, :picture)";
$stmt = $pdo_conn->prepare($sql);
$stmt->bindParam(':nom', $nom); 
$stmt->bindParam(':prenom', $prenom);
$stmt->bindParam(':login', $login);
$stmt->bindParam(':password', $pwd_unhashed);
$stmt->bindParam(':sexe', $sexe);
$stmt->bindParam(':picture', $picture); 
$stmt->execute();






//renvoie a la page
$msg = $login;

header("Location: ../front/Homepage.html");
exit();

