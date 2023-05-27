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


$id = checkInput($_GET['Id_Vente']);

$requete = $BDD->prepare('SELECT url FROM photovehicule WHERE Id_Vente = ?');
$requete->execute(array($id));
$photos = $requete->fetchAll(PDO::FETCH_ASSOC);

$statement = $BDD->prepare("SELECT * FROM vente WHERE Id_Vente = ?");
$statement->execute(array($id));
$vente = $statement->fetch();
function checkInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
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
<div class="vente2">
<section class="vente_publiéesv text-white">
<div class="box-containerv">
        <div class="boxv">
            <?php
            foreach ($photos as $photo) {
            echo '<img src="asset/img/vente/' . $photo['url'] . '" alt="Photo du véhicule">';
            }
            ?>
        </div>
</div>
</section>
</div>


<?php
include ('asset/Component/Footer.php');
?>
<script src="asset/JS/Burger.js"></script>
</body>
</html>