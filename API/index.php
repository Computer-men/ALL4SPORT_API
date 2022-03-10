<?php

$email = $_GET['email'];
str_replace("%40", "@", $email);
$password = $_GET['password'];

require_once "../Model/Bdd.php";

$bdd = new Bdd();

if (isset($email) && isset($password)) {

    $verificationLogin = $bdd->VerifLogin($email, $password);

    if (isset($verificationLogin["role"]) && $verificationLogin["role"] == "Cariste") {

        echo "reussite";
    } else {

        echo "echec";
    }
}
