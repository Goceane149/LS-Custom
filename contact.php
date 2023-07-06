<?php

//connexion à la BDD
include 'asset/Component/BDD.php';

//début de la session
session_start();
setlocale(LC_TIME, 'fr_FR','French');
//si l'ulisateur est connecté on renvoie ses identifiants sinon ça reste vide
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
};


if (isset($_POST['submit'])) {

    //déclaration des variables
    $nom = $_POST['nom'];
    $nom = htmlspecialchars($nom);
    $prenom = $_POST['prenom'];
    $prenom = htmlspecialchars($prenom);
    $telephone = $_POST['telephone'];
    $telephone = htmlspecialchars($telephone);
    $object = $_POST['object'];
    $object = htmlspecialchars($object);
    $message = $_POST['message'];
    $message = htmlspecialchars($message);

    //si tout est correct on insère les données dans la BDD
    $insert_contact = $BDD->prepare("INSERT INTO `contact`(nom, prenom, telephone, object , message, id_users) VALUES(?,?,?,?,?,?)");
    $insert_contact->execute([$nom, $prenom, $telephone, $object, $message, $_SESSION['user_id']]);

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="shortcut icon" type="image/png" href="assets/design/favicon.png" />
    <title>LS Custom - Vente </title>
</head>
<body>
<?php
include ('asset/Component/Header.php');
?>
<section class="form-container">

    <form action="" method="post" id="contact">
        <h3>Contactez-nous !</h3>
        <input type="text" name="nom" required placeholder="entrer votre nom" maxlength="20" class="box">
        <input type="text" name="prenom" required placeholder="entrer votre Prenom" maxlength="20" class="box">
        <input type="int" name="telephone" required placeholder="entrer votre numéro" maxlength="20" class="box">

        <input type="text" name="object" required placeholder="entrer l'object" maxlength="20" class="box">
        <textarea name="message" required placeholder="entrer le message" maxlength="255" class="box" ></textarea>

        <input type="submit" value="contacter" class="btn" name="submit">
    </form>

</section>




<?php
include ('asset/Component/Footer.php');
?>
<script src="asset/JS/Burger.js"></script>
</body>
</html>