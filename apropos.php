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

$SelectArticle = $BDD->query( 'SELECT *  FROM article ORDER BY id_article DESC Limit 4');
$Selectvente = $BDD->query( 'SELECT *  FROM vente ORDER BY Id_Vente DESC Limit 8');

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
    <title>LS Custom</title>
</head>
<body>
<?php
include ('asset/Component/Header.php');
?>
<section id="cousolre">
    <img src="asset/img/background4.png" class="d-block w-100 " alt="equipe1">
</section>
<section id="actu" class="text-white">
    <h1 class="titre text-center mt-4">A propos</h1>
    <hr class="white mx-auto">
    <p class="text-center">Le LS Custom est un garage qui propose différent service tels que réparation , customisation cosmétique et performance  , la vente de véhicule  ainsi que des ventes aux enchères
    </p>
</section>


<section id="vente">
    <div class="container-fluid mb-3">
        <div class="row">
            <div class="col">
                <section class="articles_publiéesa ">
                    <h1 class="titre text-center mt-4">Prix Réparation</h1>
                    <hr class="dark mx-auto">
                    <div class="box-containera">
                        <div class="boxa">
                            <img src="asset/img/fidelite.png" alt="">
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>


<section id="actu">
    <div class="container-fluid mb-3">
        <div class="row">
            <div class="col">
                <section class="articles_publiéesa text-white">
                    <h1 class="titre text-center mt-4">Prix Réparation</h1>
                    <hr class="white mx-auto">
                    <div class="box-containera">
                            <div class="boxa">
                                <img src="asset/img/reparation.png" alt="">
                            </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>

<section id="actu">
    <div class="container-fluid mb-3 ">
        <div class="row">
            <div class="col">
                <section class="articles_publiées text-white">
                    <h1 class="titre text-center mt-4">Les Dernières Ventes</h1>
                    <hr class="white mx-auto">
                    <div class="box-container">
                        <?php
                        while($vente = $Selectvente->fetch()){
                            ?>
                            <div class="box">
                                <img src="asset/img/vente/<?= $vente['photo']?>" alt="">
                                <div class="row">
                                    <div class="col">
                                <div class="titrea mb-2"><?=$vente['modele'] ?></div>
                                    </div>
                                    <div class="col text-end">
                                        <div class="titrea mb-2"><?=$vente['prix_vente']?>$</div>
                                    </div>
                                </div>
                                <a id="articlev2" href="afficher_article.php?id_article=<?=$vente['Id_Vente']?>">voir plus</a>
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