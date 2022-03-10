<?php
include "../View/header.php"

?>

<h1 style="text-align:center;">Entrepots</h1>

<div>
    <button class="btn btn-outline-secondary" data-bs-toggle="button" autocomplete="off" id="hav" onclick="afficherEntrepot('1')">Entrepôt du Havre</button>
    <button class="btn btn-outline-secondary" data-bs-toggle="button" autocomplete="off" id="mar" onclick="afficherEntrepot('2')">Entrepôt de Marseille</button>
    <button class="btn btn-outline-secondary" data-bs-toggle="button" autocomplete="off" id="lyo" onclick="afficherEntrepot('3')">Entrepôt du Lyon</button>
</div>
<br><br>

<div>
    <p id="text"></p>
</div>

<script>
    function afficherEntrepot(element) {

        $.get("controller_entrepots.php", {
            id: element
        }, function(data) {
            $("#text").html(data);
        });

    }
</script>