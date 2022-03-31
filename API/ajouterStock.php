<?php

$produit = $_GET['produit'];
$qte = $_GET['qte'];
$etagere = $_GET['etagere'];
$section = $_GET['section'];
$rangee = $_GET['rangee'];
$module = $_GET['module'];
$entrepot = $_GET['entrepot'];

require_once "../Model/Bdd.php";

$bdd = new Bdd();

if (isset($produit) && isset($qte) && isset($etagere) && isset($section) && isset($rangee) && isset($module) && isset($entrepot)) {

    $stockActuel = $bdd->getQuantiteStock($produit, $etagere, $section, $rangee, $module, $entrepot);
    $quantite = $stockActuel[0]['quantite'] + $qte;

    $ajoutStock = $bdd->addStock($produit, $quantite, $etagere, $section, $rangee, $module, $entrepot);

    echo "Ajouté";
} else {
    echo "Erreur";
}
