<?php

require_once "../Model/Bdd.php";

$bdd = new Bdd();

$villeActuelle = $_GET['villeActuelle'];
$villeActuelleAEntrepot = true;
$entrepots = $bdd->getNomsEntrepots();

if (isset($villeActuelle)) {
    foreach ($entrepots as $entrepot) {
        if ($entrepot['nom_entrepot'] == $villeActuelle) {
            $villeActuelleAEntrepot = "true";
            break;
        } else {
            $villeActuelleAEntrepot = "false";
        }
    }
    echo $villeActuelleAEntrepot;
}
