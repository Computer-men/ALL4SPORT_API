 <p>
     <?php


        echo "Reference :<br><br>" . $oneproduit['reference'] . "<br><br>";
        echo "Nom du produit :<br><br>" . $oneproduit['nom_produit'] . "<br><br>";
        echo "Prix hors Taxes :<br><br>" . $oneproduit['prixht'] . "€ <br><br>";
        echo "Description du produit :<br><br>" . $oneproduit['description'] . "<br><br>";
        echo "Categorie du produit :<br><br>" . $oneproduit['categorie'] . "<br><br>";
        echo "Marque du produit :<br><br>" . $oneproduit['marque'] . "<br><br>";
        echo "Emplacement du produit :<br><br>" . $oneproduit['fk_module']."." . $oneproduit['fk_rangee'] . "." . $oneproduit['fk_section'] . "." . $oneproduit['fk_etagere'] . ".". "<br><br>";
        ?>
 </p>