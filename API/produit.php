<?php

$produit = $_GET['produit'];

require_once "../Model/Bdd.php";

$bdd = new Bdd();

if (isset($produit)) {
    $verifProduit = $bdd->getProduitsRef($produit);
    // echo print_r($verifProduit, true);

    if($verifProduit!=null) {
        echo $verifProduit[0]["nom"];
    }
    else {
         echo "erreur";
    }
}
else {
    echo "il n'y a aucun produit de ce type";
}
