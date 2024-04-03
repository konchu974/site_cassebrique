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

    // Requête récupére les playlists avec leurs musiques
    $sql = "SELECT *
    FROM jeux_
    ";


    $stmt = $pdo_conn->query($sql);

    $current_jeux = null;
    $current_jeux_id = null;





} catch (PDOException $e) {
    echo "Erreur: " . $e->getMessage();
}
