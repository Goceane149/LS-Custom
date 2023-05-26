<?php

//connexion à la BDD
include 'asset/Component/BDD.php';

//début de la session
session_start();

//si l'ulisateur est connecté on renvoie ses identifiants sinon ça reste vide
if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

//soumission du formulaire de connexion
if(isset($_POST['submit'])){

   //déclaration des variables
   $email = $_POST['email'];
   $email = htmlspecialchars($email);
   $pass = sha1($_POST['pass']);
   $pass = htmlspecialchars($pass);

   //on va chercher la table 'users' dans la BDD
   $select_user = $BDD->prepare("SELECT * FROM `users` WHERE email = ? AND mdp = ?");
   $select_user->execute([$email, $pass]);
   //création de l'association
   $row = $select_user->fetch(PDO::FETCH_ASSOC);

   //si la connexion est réussie on renvoie vers la page d'accueil
   if($select_user->rowCount() > 0){
      $_SESSION['user_id'] = $row['id_users'];
       $_SESSION['role_id'] = $row['id_role'];
      header('location:index.php');
   }else{
      //sinon on affiche un message d'erreur
      $message[] = 'Utilisateur ou mot de passe incorrect';
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
    <title>LS Custom - Connexion</title>
</head>

<body>

<?php
include ('asset/Component/Header.php');
?>
<section class="form-container">

<!-- formulaire de connexion -->
   <form action="" method="post">
      <h3>Se connecter</h3>
      <input type="email" name="email" required placeholder="entrer votre email" maxlength="50"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="pass" required placeholder="entrer votre mot de passe" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="Se connecter" class="btn" name="submit">
      <p>Vous n'avez pas encore de compte ?</p>
      <a href="inscription.php" class="option-btn">S'inscrire</a>
   </form>

</section>

<?php
include ('asset/Component/Footer.php');
?>
<script src="asset/JS/Burger.js"></script>
</body>
</html>