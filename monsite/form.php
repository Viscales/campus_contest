<?php

$bdd = new PDO('mysql:host=localhost;dbname=espace_membre', 'phpmyadmin', 'viscales');

if(isset($_POST['forminscription']))
{
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mail = htmlspecialchars($_POST['mail']);
    $mail2 = htmlspecialchars($_POST['mail2']);
    $phone = htmlspecialchars($_POST['phone']);
    $text = htmlspecialchars($_POST['text']);
    if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['phone']) AND !empty($_POST['text']))
    {

        $pseudolength = strlen(($pseudo));
        if($pseudolength <= 255)
        {
          if ($mail == $mail2)
          {

              if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                  $reqmail = $bdd->prepare("SELECT * FROM membre WHERE mail = ?");
                  $reqmail->execute(array($mail));
                  $mailexist = $reqmail->rowCount();
                  if ($mailexist == 0) {

                      $insertmbr = $bdd->prepare("INSERT INTO membre(pseudo, mail, phone, text) VALUES (?, ?, ?, ?)");
                      $insertmbr->execute(array($pseudo, $mail, $phone, $text));
                      $erreur = "Votre compte a bien été creer!";
                  }
                  else
                   {
                      $erreur = "Votre adresse mail n'est pas valide ou est deja utilisée!";
                  }
              }
              else
              {
                  $erreur = "Adresse mail deja utilisé ";
              }
          }
          else
          {
              $erreur = "Vos adresses mail ne correspondent pas";
          }
        }
        else
        {
         $erreur = "Votre pseudo ne doit pas depasser les 255 caractères";
        }
    }
    else
    {
        $erreur = "Tous les champs doivent etre complétés !";
    }
}

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
                <label for="text">Message :</label>
                <textarea type="text" id="text" name="text" placeholder="Ecrivez votre message ici" value ="<?php if (isset($text)) {echo $text;} ?>"></textarea>
            </div>
            <input type="submit" name="forminscription" value="Envoyer">
        </div>
        <div class="retour">
            <a href="index.html" target="_blank"><input type="button" value="Page d'acceuil"></a>
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
