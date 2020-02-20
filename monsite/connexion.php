<?php

$bdd = new PDO('mysql:host=localhost;dbname=espace_membre', 'phpmyadmin', 'viscales');

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Me contacter</title>
    <meta charset="utf-8">


    <link rel="stylesheet" type="text/css" href="contacter.css">
</head>

<body>
<div align="center">
    <form method="POST" action="">

        <div class="contact-form">

            <h1>Me Contacter</h1>
            <div class="txtb">
                <label for="pseudo">Pseudo :</label>
                <input type="text" id="pseudo" name="pseudo" value="" placeholder="Entrer votre Pseudo" value="<?php if(isset($pseudo)) {echo $pseudo;} ?>">
            </div>

            <div class="txtb">
                <label for="mail">Email :</label>
                <input type="email" id="mail" name="mail" value="" placeholder="Entrer votre Email" value="<?php if(isset($mail)) {echo $mail;} ?>">
            </div>

            <div class="txtb">
                <label for="mail2">Confirmation du mail :</label>
                <input type="email" id="mail2" name="mail2" value="" placeholder="Confirmer votre mail" value="<?php if(isset($mail2)) {echo $mail2;} ?>">
            </div>

            <div class="txtb">
                <label for="phone">Telephone :</label>
                <input type="tel" id="phone" name="phone" value="" placeholder="Entrer votre numero" value="<?php if(isset($phone)) {echo $phone;} ?>">
            </div>

            <div class="txtb">
                <label>Message :</label>
                <textarea placeholder="Ecrivez votre message ici"></textarea>
            </div>
            <input type="submit" name="forminscription" value="Envoyer">
        </div>
    </form>
    <?php
    if(isset($erreur)){
        echo $erreur;
    }
    ?>
</div>

</body>

</html>
