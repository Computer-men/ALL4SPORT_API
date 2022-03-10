<?php
include "../View/header.php"
?>

<h1 style="text-align:center;">Tableau de bord</h1>

<form method="GET">

    <input type="search" name="search" id="search" placeholder="Rechercher un produit..." />
    <input type="submit" value="Valider" style="outline: solid grey; cursor:pointer;" />

</form>

<table class="table table-hover">
    <thead>
        <tr>
            <th>Reference</th>
            <th>Nom produit</th>
            <?php
            $recup = array();
            foreach ($entrepots as $entrepot) {
                echo "<th>" . $entrepot['nom_entrepot'] . "</th>";
                $nom = $entrepot['nom_entrepot'];
                array_push($recup,$nom);
            }
            ?>
            <th>Stock total</th>
    </thead>

    <tbody>
        <?php
        foreach ($produits as $stock) {
            
            echo "<tr>";
            echo "<td>" . $stock['reference'] . "</td>";
            echo "<td>" . $stock['nom'] . "</td>";

            $total = 0;
            for ($i =0; $i < count($recup); $i++) {
               
                if (isset ($stockE[$recup[$i]][$stock['reference']][0])) {
                    echo "<td>" . $stockE[$recup[$i]][$stock['reference']][0] . "</td>";
                    $total+= $stockE[$recup[$i]][$stock['reference']][0];
                } else {
                    echo '<td>0</td>';
                }
            }
            echo "<td>" . $total . "</td>";
            echo "</tr>";
        }

        ?>
    </tbody>

</table>