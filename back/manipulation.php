<?php

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
    // Connexion à la base de données
    $pdo_conn = new PDO($dsn, $user, $password, $options);


    $sql = "SELECT j.*, c.*
        FROM jeux_ j
        LEFT JOIN creer cr ON j.Id_Jeux_ = cr.Id_Jeux_
        LEFT JOIN createur c ON cr.Id_createur = c.Id_createur";



    $stmt = $pdo_conn->query($sql);

    $current_jeux = null;
    $current_jeux_id = null;
} catch (PDOException $e) {
    echo "Erreur: " . $e->getMessage();
}
