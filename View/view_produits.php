<?php
include "../View/header.php"
?>

<h1 style="text-align:center;">Produits</h1>

<table class="table table-hover">
    <thead>
        <tr>
            <th>Reference</th>
            <th>Nom</th>
            <th>emplacements</th>
            <th>Information sur le produit</th>
        </tr>
    </thead>

    <tbody>
        <?php
        foreach ($produits as $produit) {
            echo "<tr>";
            echo "<td>" . $produit["reference"] . "</td>";
            echo "<td>" . $produit['nom'] . "...</td>";
            echo "<td>" . $produit['fk_module'] . "." . $produit['fk_rangee'] . "." . $produit['fk_section'] . "." . $produit['fk_etagere'] . "</td>";
            echo '<td><button data-bs-toggle="modal" class="btn btn-primary" data-bs-target="#produit" onclick= "detail(\'' . substr($produit['id'], -11) . '\')" >Détail</button></td>';
            echo "</tr>";
        }

        ?>
    </tbody>

</table>

<script>
    function detail(element) {

        $.get("controller_produits.php", {
            id: element
        }, function(data) {
            $("#body").html(data);
        });


    }
</script>


<div class="modal fade" role="dialog" id="produit" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Caractéristiques : </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>