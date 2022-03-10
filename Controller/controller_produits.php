<?php

require_once "../Model/Bdd.php";

$bdd= new Bdd();

if(isset($_GET['id'])){

    $oneproduit = $bdd->getOneProduit($_GET['id']);
    require "../View/view_modal_produit_detail.php";

}else{

    $produits = $bdd->getProduits();
    require "../View/view_produits.php";

}







   
?>