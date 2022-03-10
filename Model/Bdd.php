<?php

class Bdd
{

    private $bdd;

    function __construct()
    {

        $dsn = 'mysql:dbname=all4sport_mobile;host=127.0.0.1:3308';
        $dbUser = 'root';
        $dbPwd = '';

        try {
            $this->bdd = new PDO($dsn, $dbUser, $dbPwd);
        } catch (PDOException $e) {

            echo $e->getMessage();
        }
    }

    function getEntrepot($id)
    {

        $sql = "SELECT nom_entrepot, adresse_entrepot, telephone_entrepot FROM entrepots WHERE id_entrepot = :id";
        $rq =  $this->bdd->prepare($sql);
        $rq->execute([":id" => $id]);
        $res = $rq->fetch();

        return $res;
    }

    function getNomsEntrepots()
    {

        $sql = "SELECT nom_entrepot FROM entrepots;";
        $rq = $this->bdd->prepare($sql);
        $rq->execute();
        return $rq->fetchAll();
    }

    function getProduits()
    {

        $sql = "SELECT fk_produit as id,
         concat(substr(nom_fournisseur,1,3),substr(nom_categorie,1,3), fk_produit) as reference, 
         nom_produit AS nom, 
         prix_ht_produit AS prixht,
         description_produit AS description, 
         categories.nom_categorie AS categorie, 
         marques.nom_marque AS marque ,
         stocks.*
         FROM produits 
         JOIN categories ON fk_categorie_produit= id_categories 
         JOIN marques ON fk_marque_produit = id_marques
         JOIN stocks  on fk_produit = id_produit 
         JOIN fournisseurs on fk_fournisseur_produit = id_fournisseurs;";
        $rq =  $this->bdd->prepare($sql);
        $rq->execute();
        return $rq->fetchAll();
    }

    function getProduitsRef($search)
    {

        $sql = "SELECT concat(substr(nom_fournisseur,1,3),substr(nom_categorie,1,3), id_produit) as reference, 
         nom_produit AS nom
         FROM produits 
         JOIN categories ON fk_categorie_produit= id_categories 
         JOIN fournisseurs on fk_fournisseur_produit = id_fournisseurs
         WHERE concat(substr(nom_fournisseur,1,3),substr(nom_categorie,1,3), id_produit) = :ref;";
        $rq =  $this->bdd->prepare($sql);
        $rq->execute(['ref' => $search]);
        return $rq->fetchAll();
    }

    function getProduitsALLRef()
    {

        $sql = "SELECT concat(substr(nom_fournisseur,1,3),substr(nom_categorie,1,3), id_produit) as reference, 
         nom_produit AS nom
         FROM produits 
         JOIN categories ON fk_categorie_produit= id_categories 
         JOIN fournisseurs on fk_fournisseur_produit = id_fournisseurs;";
        $rq =  $this->bdd->prepare($sql);
        $rq->execute();
        return $rq->fetchAll();
    }

    function getOneProduit($id)
    {
        $sql = "SELECT concat(substr(nom_fournisseur,1,3),substr(nom_categorie,1,3), id_produit) as reference, 
         nom_produit , 
         prix_ht_produit AS prixht,
         description_produit AS description, 
         categories.nom_categorie AS categorie, 
         marques.nom_marque AS marque ,
         stocks.*
         FROM produits 
         JOIN categories ON fk_categorie_produit= id_categories 
         JOIN marques ON fk_marque_produit = id_marques
         JOIN stocks  on fk_produit = id_produit 
         JOIN fournisseurs on fk_fournisseur_produit = id_fournisseurs
         WHERE id_produit= :id;";
        $rq =  $this->bdd->prepare($sql);
        $rq->execute([':id' => $id]);
        return $rq->fetch();
    }


    function getStockUnEntrepot($nomEntrepot)
    {

        $sql = "SELECT concat(substr(nom_fournisseur,1,3),substr(nom_categorie,1,3), fk_produit) as reference1, SUM(quantite_stock) as qte_totale_du_produit 
         
                 FROM stocks s
                 left join entrepots e on e.id_entrepot = s.fk_entrepot
                  JOIN produits on fk_produit= id_produit 
                  JOIN fournisseurs on fk_fournisseur_produit = id_fournisseurs
                    JOIN categories on fk_categorie_produit = id_categories
                     WHERE  e.nom_entrepot = :nomEntrepot
                 GROUP BY fk_produit";
        $re = $this->bdd->prepare($sql);
        $re->execute([":nomEntrepot" => $nomEntrepot]);
        return $re->fetchAll(PDO::FETCH_COLUMN | PDO::FETCH_GROUP);
    }

    function verifLogin($email, $password)
    {
        $sql = "SELECT roles.libelle as role FROM `user` 
        JOIN `roles` ON roles.id = user.fk_role
        WHERE user.mail = :email AND user.password = :password";
        $re = $this->bdd->prepare($sql);
        $re->execute([":email" => $email, ":password" => $password]);
        return $re->fetch();
    }
}
