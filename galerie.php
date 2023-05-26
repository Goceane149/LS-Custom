<?php
include 'asset/Component/BDD.php';

//début de la session
session_start();

//si l'ulisateur est connecté on renvoie ses identifiants sinon ça reste vide
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
};

$Selectgalerie = $BDD->query( 'SELECT *  FROM galerie where id_galerie > 1');
$galerie1 = $BDD->query('SELECT *  FROM galerie where id_galerie = 1');
$Affichergalerie= $galerie1->fetch();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="shortcut icon" type="image/png" href="assets/design/favicon.png" />
    <title>LS Custom - Galerie</title>
</head>
<body>
<?php
include ('asset/Component/Header.php');
?>

<section id="vente">
    <img src="asset/img/galerie/<?= $Affichergalerie['photo']?>"   class="d-block"  alt="">
</section>

<section class="articles_publiées text-white">
    <div class="box-container">
        <?php
        while($galerie = $Selectgalerie->fetch()){
            ?>
            <div class="boxa">
                <img src="asset/img/galerie/<?= $galerie['photo']?>"   class="d-block w-100"  alt="">
            </div>
            <?php
        }
        ?>
    </div>
</section>






<?php
include ('asset/Component/Footer.php');
?>
<script src="asset/JS/Burger.js"></script>
</body>
</html>