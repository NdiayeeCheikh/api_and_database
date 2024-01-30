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

$categorie = $_GET['categorie'];

$requete = $connexion->prepare("SELECT * FROM produit WHERE idcategorie = ?");
$requete->execute([$categorie]);

$rows = array();
while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)) {
    $rows[] = $ligne;
}

print json_encode($rows);
?>
