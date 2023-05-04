<?php
    require_once("inc/haut.php"); 
    require_once("inc/init.php"); // connexion à la bdd

$resultat = $pdo->query("SELECT * FROM advert"); // on recupere toutes les annonce pour les afficher
$annonces = $resultat->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="d-flex justify-content-center" >
    <?php foreach($annonces as $annonce): ?>
        <div class="card text-center m-1" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"> <?= mb_strtoupper($annonce['title']) ?></h5>
                <p class="card-text"><?= $annonce['city'] . " ($annonce[postal_code])" ?></p>
                <p class="card-text"><?= $annonce['type'] ?></p>
                <p class="card-text text-danger"><?= $annonce['price'] ?>€</p>
                <a href="ficheAnnonce.php?action=fiche&id=<?= $annonce['id'] ?>" class="btn btn-primary">voir l'annonce</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>



<?php require_once("inc/bas.php"); ?>