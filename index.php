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
    <img src="asset/img/background1.png" class="d-block w-100 " alt="equipe1">
</section>

<section id="actu">
    <div class="container-fluid mb-3">
        <div class="row">
            <div class="col">
                <section class="articles_publiéesa text-white">
                    <h1 class="titre text-center mt-4">Quelques Actualité du Club</h1>
                    <hr class="white mx-auto">
                    <div class="box-containera">
                        <?php
                        while($article = $SelectArticle->fetch()){
                            ?>
                            <div class="boxa">
                                <img src="asset/img/article/<?= $article['photoa']?>" alt="">
                                <div class="date"><p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
                                            <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/>
                                            <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                        </svg> <?=$article['datea']; ?></p>
                                </div>
                                <div class="titrea mb-2"><?=$article['titre'] ?>
                                </div>
                                <div class="extrait"><?=$article['extrait']?>
                                </div>
                                <a id="articlev" href="afficher_article.php?id_article=<?=$article['id_article']?>">voir plus</a>
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

<section id="vente">
    <div class="container-fluid mb-3">
        <div class="row">
            <div class="col">
                <section class="articles_publiées">
                    <h1 class="titre text-center mt-4">Les Dernières Ventes</h1>
                    <hr class="dark mx-auto">
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
                                <a id="articlev2" href="afficher_vente.php?Id_Vente=<?=$vente['Id_Vente']?>">voir plus</a>
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