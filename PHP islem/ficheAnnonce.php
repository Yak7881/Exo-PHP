<?php
    require_once("inc/haut.php"); 
    require_once("inc/init.php"); // connexion à la bdd

    if(isset($_GET['action']) && $_GET['action'] == "fiche" && isset($_GET['id'])) // on verifie si dans l'url il y a une action qui correspond à "fiche" avec un id
    {
        $resultat = $pdo->query("SELECT * FROM advert WHERE id=$_GET[id]");
        $annonce = $resultat->fetch(PDO::FETCH_ASSOC);

        
        if($_POST)// on verifie si le formulaire est envoyé
        {
            $pdo->exec("UPDATE advert SET reservation_message='$_POST[message]' WHERE id=$annonce[id] ");
            // echo "<div class='text-center bg-success'><p>Vous venez de reservé l'annonce!</p></div>";

            header('location: index.php'); // renvoi vers une page (ici la page index)
        }
    }
    

?>

<div class="text-center">
    <?php if($annonce['reservation_message']): //si l'annonce contien un message de reservation en bdd ?>
        <h2 class="text-warning"> Cette annonce est resrvé</h2>
    <?php endif; ?>

    <h1> <?= $annonce['title']; ?> </h1>
    <h4>type : <?= $annonce['type']; ?> </h4>
    <h6>localisation : <span><?= $annonce['city'] . " ($annonce[postal_code])" ; ?> </span></h6>
    <p><?= $annonce['description']; ?></p>
    <h4 class="text-danger"> prix : <?= $annonce['price']; ?>€</h4>
    
</div>
<div>
    <form action="" method="post" class="form">
        <label for="message">message</label>
        <textarea name="message" class="form-control"></textarea>
        <input type="submit" value="envoyer">
    </form>
</div>


<?php require_once("inc/bas.php"); ?>