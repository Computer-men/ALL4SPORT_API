<?php

require_once "../Model/Bdd.php";

//appel au model pour recup les données
$bdd= new Bdd();

if (!empty($_GET["id"])) {

    // dans le cas de la requete ajax
    $entrepot=$bdd->getEntrepot($_GET['id']);

    echo"L'entrepôt choisi est  " . $entrepot['nom_entrepot'] . ".<br> 
        Il se trouve au  " . $entrepot['adresse_entrepot'] . ".<br>
        Vous pouvez le contacter au: " . $entrepot['telephone_entrepot'];


} else {

//appel la vue
require "../View/view_entrepots.php";
}
?>