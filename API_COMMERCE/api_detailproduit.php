<?php
header("Access-Control-Allow-Origin: *");
$serveur = "localhost";
$utilisateur = "cheikh";
$motDePasse = "12345";
$baseDeDonnees = "boutique";

try {
    $connexion = new PDO("mysql:host=$serveur;dbname=$baseDeDonnees", $utilisateur, $motDePasse);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

$id = $_GET['id'];

$requete = $connexion->prepare("SELECT * FROM produit WHERE id = ?");
$requete->execute([$id]);

$row = $requete->fetch(PDO::FETCH_ASSOC);

print json_encode($row);
?>
