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

$idProduit = $_POST['idproduit'];
$dateAchat = $_POST['date_achat'];

$requete = $connexion->prepare("INSERT INTO achat (idproduit, date_achat) VALUES (?, ?)");
$requete->execute([$idProduit, $dateAchat]);

echo "Achat enregistré avec succès";
?>
