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

$requete = $connexion->query("SELECT * FROM produit");      
$rows = array();
while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)) {
    $rows[] = $ligne;
}

print json_encode($rows);
?>
