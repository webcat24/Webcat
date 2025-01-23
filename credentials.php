<?php
// Paramètres de connexion
// $host = 'localhost';
// $dbname = 'WEBCATNEW';
// $login = 'postgres';
// $mdp = 'houssna';

$dsn = "pgsql:host=localhost;port=5433;dbname=saes5";
$login = "postgres";
$mdp = "02062004";
// Création du DSN pour PostgreSQL
// $dsn = "pgsql:host=$host;dbname=$dbname";

// Connexion à la base de données
try {
    $this->bd = new PDO($dsn, $login, $mdp);
    $this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $this->bd->query("SET NAMES 'utf8'");
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>