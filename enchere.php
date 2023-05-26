<?php
include 'asset/Component/BDD.php';

//début de la session
session_start();

//si l'ulisateur est connecté on renvoie ses identifiants sinon ça reste vide
//si l'ulisateur est connecté on renvoie ses identifiants sinon ça reste vide
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
};


$Selectenchere = $BDD->query( 'select * from enchere ORDER BY Id_enchere DESC');

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
    <title>LS Custom - Enchère </title>
</head>
<body>
<?php
include ('asset/Component/Header.php');
?>
<section id="enchere">
    <img src="asset/img/background3.png" class="d-block w-100 " alt="equipe1">
</section>

<section id="vente2">
    <div class="container-fluid mb-3">
        <div class="row">
            <div class="col">
                <section class="articles_publiées text-white">
                    <h1 class="titre text-center mt-4">Les Dernières Enchères</h1>
                    <hr class="white mx-auto">
                    <div class="box-container">
                        <?php
                        while($enchere = $Selectenchere->fetch()){
                            ?>
                            <div class="boxa">
                                <img src="asset/img/vente/<?= $enchere['photo']?>" alt="">
                                <div class="row">
                                    <div class="col">
                                        <div class="titrea mb-2"><?=$enchere['modele'] ?></div>
                                    </div>
                                    <div class="col text-end">
                                        <div class="titrea mb-2"><?=$enchere['prix_vente'] ?>$</div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>



<?php
include ('asset/Component/Footer.php');
?>
<script src="asset/JS/Burger.js"></script>
</body>
</html>