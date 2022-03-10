<?php

require_once "../Model/Bdd.php";

$bdd= new Bdd();

$entrepots=$bdd->getNomsEntrepots();

if(isset($_GET['search'])){
    $produits = $bdd->getProduitsRef($_GET['search']);
} else{
    $produits = $bdd->getProduitsALLRef();
}


$stockE = array();
foreach ($entrepots as $e) {

    $stockE[$e['nom_entrepot']] = $bdd->getStockUnEntrepot($e['nom_entrepot']);
   
}

require "../View/view_tableauDeBord.php";
