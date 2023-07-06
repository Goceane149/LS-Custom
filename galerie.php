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

$Selectgalerie = $BDD->query( 'SELECT *  FROM galerie ORDER BY  Id_Galerie desc');
$galerie1 = $BDD->query('SELECT *  FROM galerie where Id_Galerie = 1');
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
    <link rel="stylesheet" href="asset/css/lightbox.min.css">
    <link rel="shortcut icon" type="image/png" href="assets/design/favicon.png" />
    <title>LS Custom - Galerie</title>
</head>
<body>
<?php
include ('asset/Component/Header.php');
?>
<section id="galerie">
    <img src="asset/img/background4.png" class="d-block w-100 " alt="equipe1">
</section>
<section id="actu">
    <div class="container-fluid mb-3">
        <div class="row">
            <div class="col">
                <section class="articles_publiéesa text-white">
                    <h1 class="titre text-center mt-4">Quelques images</h1>
                    <hr class="white mx-auto">
                    <div class="box-containera">
                    <?php
        while($galerie = $Selectgalerie->fetch()){
            ?>
                <a href="asset/img/gallery/<?= $galerie['photo']?>" data-lightbox="mygallery"><img src="asset/img/gallery/<?= $galerie['photo']?>"   class="d-block 100"  alt=""></A>
                
            <?php
           
        }
        ?>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>

<script src="asset/JS/Burger.js"></script>
<script src="asset/JS/lightbox-plus-jquery.min.js"></script>
</body>
</html>