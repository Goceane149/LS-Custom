<?php

//connexion à la BDD
include 'asset/Component/BDD.php';

//début de la session
session_start();

//si l'ulisateur est connecté on renvoie ses identifiants sinon ça reste vide
if (isset($_SESSION['user_id'])) {
   $user_id = $_SESSION['user_id'];
} else {
   $user_id = '';
};

//fonction pour soumettre le formulaire d'inscription
if (isset($_POST['submit'])) {

   //déclaration des variables
   $nom = $_POST['nom'];
   $nom = htmlspecialchars($nom);
    $prenom = $_POST['prenom'];
    $prenom = htmlspecialchars($prenom);
   $email = $_POST['email'];
   $email = htmlspecialchars($email);
   //'sha1' : calcul du hachage du mot de passe
   $password = sha1($_POST['password']);
   $password = htmlspecialchars($password);
   $cpassword = sha1($_POST['cpassword']);
   $cpassword = htmlspecialchars($cpassword);
   $photo = "photodebase.png";
   $role = 1;

   //connexion à la table 'users' dans la BDD
   $select_user = $BDD->prepare("SELECT * FROM `users` WHERE Email = ?");
   $select_user->execute([$email]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);

   if ($select_user->rowCount() > 0) {
      //si un mail identique est présent dans la BDD ce message d'erreur s'affiche
      $message[] = 'Cet email existe déjà';
   } else {
      //si les mots de passe ne correspondent pas on renvoie une erreur
      if ($password != $cpassword) {
         $message[] = 'Les mots de passe ne correspondent pas !';
      } else {
         //si tout est correct on insère les données dans la BDD
         $insert_user = $BDD->prepare("INSERT INTO `users`( photousers, Nom, Prenom, Email, mdp , id_role) VALUES(?,?,?,?,?,?)");
         $insert_user->execute([ $photo, $nom, $prenom, $email, $cpassword, $role]);
         $message[] = 'Inscription réussie, veuillez vous connecter !';
      }
   }
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
    <title>LS Custom - Inscription</title>
</head>

<body>

<?php
include ('asset/Component/Header.php');
?>
   <!-- formulaire d'inscription -->
   <section class="form-container">

      <form action="" method="post" id="register">
         <h3>Inscrivez-vous !</h3>
         <input type="text" name="nom" required placeholder="entrer votre nom" maxlength="20" class="box">
          <input type="text" name="prenom" required placeholder="entrer votre Prenom" maxlength="20" class="box">
         <input type="email" name="email" required placeholder="entrer votre email" maxlength="50" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
         <small></small>
         <input type="password" name="password" required placeholder="entre votre mot de passe" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
         <small></small>
         <input type="password" name="cpassword" required placeholder="confirmer le mot de passe" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
         <input type="submit" value="S'inscrire" class="btn" name="submit">
         <p>Vous êtes déjà inscrit ?</p>
         <a href="connexion.php" class="option-btn">Se connecter</a>
      </form>

   </section>
<?php
include ('asset/Component/Footer.php');
?>
<script src="asset/JS/Burger.js"></script>
</body>
</html>