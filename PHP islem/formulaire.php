<?php require_once("inc/haut.php"); 
    require_once("inc/init.php");

if($_POST)
{
    // foreach($_POST as $cle => $valeur)
    // {
    //     echo "$cle : $valeur <br>";
    // }

    $pdo->exec("INSERT INTO advert (title,description,postal_code,city,type,price) VALUES ('$_POST[titre]','$_POST[description]','$_POST[cp]', '$_POST[ville]', '$_POST[type]', '$_POST[prix]') ");

    
}


?>

<div class="text-center">
    <h2>Formulaire ajout d'annonces</h2>
</div>
<form action="" method="post" class="form">
    <label for="titre">Titre</label>
    <input class="form-control" type="text" name="titre">

    <label for="cp">description</label>
    <textarea class="form-control" name="description"></textarea>
    
    <label for="cp">Code Postal</label>
    <input class="form-control" type="text" name="cp">
    
    <label for="ville">Ville</label>
    <input class="form-control" type="text" name="ville">

    <label for="ville">Type</label>
    <select class="form-control" name="type">
        <option value="location">Location</option>
        <option value="vente">Vente</option>
    </select>


    <label for="prix">Prix</label>
    <input class="form-control" type="text" name="prix">
    
    <div class="text-center m-2">
        <input type="submit" value="envoyer">
    </div>



</form>

<?php require_once("inc/bas.php"); ?>