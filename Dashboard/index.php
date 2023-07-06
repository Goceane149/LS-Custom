<?php
include '../asset/Component/BDD.php';

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
    <link rel="stylesheet" href="asset/css/adminstyle.css">
    <link rel="shortcut icon" type="image/png" href="assets/design/favicon.png" />
    <title>LS Custom</title>
</head>
<body>
<?php
include ('asset/Component/Header.php');

if ($fetch_profile["id_role"] <= 1) {
  // Redirigez vers la page de connexion
  header("Location: ../index.php");
  exit();
}
?>
<section class="dashboard">

<h1 class="heading">Tableau de bord</h1>

<div class="box-container">
    <div class="box">
        <h3 class="my-auto">Bienvenue ! <?= $fetch_profile['Prenom']; ?> <?= $fetch_profile['Nom']; ?></h3>
    </div>

    <!-- lien vers les utilisateurs inscrits sur le site -->
    <div class="box">
            <h3>Actualité</h3>
            <?php
            $select_actualite = $BDD->prepare("SELECT * FROM `article`");
            $select_actualite->execute();
            $number_of_actualite = $select_actualite->rowCount()
        ?>
        <p><?= $number_of_actualite; ?></p>
        
            <div class="row  bottom-0 end-50">
                <div class="col">
                    <a href="Createarticle.php" class="option-btn">Crée</a>
                </div>
                <div class="col">
                    <a href="voirarticle.php" class="option-btn">Modifier</a>
                </div>
            </div>
        </div>
        <div class="box">
            <h3>Factures</h3>
            <?php
            $select_facture = $BDD->prepare("SELECT * FROM `facture`");
            $select_facture->execute();
            $number_of_facture = $select_facture->rowCount()
        ?>
        <p><?= $number_of_facture; ?></p>
                    <a href="Createfacture.php" class="option-btn">Crée</a>

        </div>

        <div class="box">
            <h3>Ventes</h3>
            <?php
            $select_vente = $BDD->prepare("SELECT * FROM `Vente`");
            $select_vente->execute();
            $number_of_vente = $select_vente->rowCount()
        ?>
        <p><?= $number_of_vente; ?></p>
        
            <div class="row  bottom-0 end-50">
                <div class="col">
                    <a href="Createvente.php" class="option-btn">Crée</a>
                </div>
                <div class="col">
                    <a href="voirvente.php" class="option-btn">Voir</a>
                </div>
            </div>
        </div>

        <div class="box">
            <h3>Enchères</h3>
            <?php
            $select_enchere = $BDD->prepare("SELECT * FROM `enchere`");
            $select_enchere->execute();
            $number_of_enchere = $select_enchere->rowCount()
        ?>
        <p><?= $number_of_enchere; ?></p>
        
            <div class="row  bottom-0 end-50">
                <div class="col">
                    <a href="Createenchere.php" class="option-btn">Crée</a>
                </div>
                <div class="col">
                    <a href="voirenchere.php" class="option-btn">Voir</a>
                </div>
            </div>
        </div>

        <div class="box">
            <h3>Photo du Ls</h3>
            <?php
            $select_galerie = $BDD->prepare("SELECT * FROM `galerie`");
            $select_galerie->execute();
            $number_of_galerie = $select_galerie->rowCount()
        ?>
        <p><?= $number_of_galerie; ?></p>
             <a href="Createphoto.php" class="option-btn">Ajouter</a>
        </div>
        <div class="box">
            <h3>Message</h3>
            <?php
            $select_contact = $BDD->prepare("SELECT * FROM `contact`");
            $select_contact->execute();
            $number_of_contact = $select_contact->rowCount()
        ?>
        <p><?= $number_of_contact; ?></p>
                    <a href="voirmessage.php" class="option-btn">Voir</a>
        </div>
        <div class="box">
            <h3>Salaire</h3>
            <?php
            $select_salaire = $BDD->prepare("SELECT * FROM `salaire`");
            $select_salaire->execute();
            $number_of_salaire = $select_salaire->rowCount()
        ?>
        <p><?= $number_of_salaire; ?></p>
        
            <div class="row  bottom-0 end-50">
            <?php if ($fetch_profile["id_role"] == 4) { ?>
                <div class="col">
                    <a href="Createsalaire.php" class="option-btn">Crée</a>
                </div>
                <?php }?>
                <div class="col">
                    <a href="voirsalaire.php" class="option-btn">Voir</a>
                </div>
            </div>
        </div>
        <div class="box">
            <h3>Devis</h3>
            <div class="row  bottom-0 end-50">
                <div class="col">
                    <a href="Createdevis.php" class="option-btn">Crée</a>
                </div>
                <div class="col">
                    <a href="voirdevis.php" class="option-btn">Voir</a>
                </div>
            </div>
        </div>




        <?php if ($fetch_profile["id_role"] == 4) { ?>
        <div class="box">
        <?php
         $select_users = $BDD->prepare("SELECT * FROM `users`");
         $select_users->execute();
         $number_of_users = $select_users->rowCount()
        ?>
        
        <h3>Utilisateurs inscrits</h3>
        <p><?= $number_of_users; ?></p>
        <div class="row">
            <div class="col">
                <a href="users_accounts.php" class="option-btn">voir</a>
            </div>
            <div class="col">
                <a href="users_accounts.php" class="option-btn">crée</a>
            </div>
        </div>
    </div>
    <?php } ?>

</div>
</section>



<?php
include ('asset/Component/Footer.php');
?>
<script src="asset/JS/Burger.js"></script>
</body>
</html>