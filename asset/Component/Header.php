

<header class="header">
    <section class="flex">
        <a href="index.php" class="logo">
            <img src="asset/img/logo.png" alt="">
        </a>

        <nav class="navbar">
            <a href="vente.php">VENTE</a>
            <a href="enchere.php">ENCHÈRE</a>
            <a href="galerie.php">GALERIE</a>
            <a href="apropos.php">A PROPOS</a>
            <a href="contact.php">CONTACT</a>
        </nav>

        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="user-btn" class="fas fa-user"></div>
        </div>

        <div class="profile">
            <?php
            /*paramétrage de la userbox en la connectant à la table 'users' dans la BDD
              par rapport à l'ID de l'utilisateur*/
            $select_profile = $BDD->prepare("SELECT * FROM `users` WHERE id_users = ?");
            $select_profile->execute([$user_id]);
            if ($select_profile->rowCount() > 0) {
                //on créé un tableau associatif par un fetch pour récupérer les données de la table
                $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
                ?>
                <div class="d-flex justify-content-center">
                    <img class="rounded-circle d-block w-50"  src="asset/img/utilisateur/<?=$fetch_profile['photousers']?>">
                </div>
                <!-- on affiche le pseudo de l'utilisateur connecté -->
                <p class="text-center"><span><?= $fetch_profile["Prenom"]; ?> <?= $fetch_profile["Nom"];?></span></p>
                <!-- s'affichent alors les boutons de modification et de déconnexion -->
                <a href="modifier.php" class="option-btn">Modifier</a>

                <?php

                if ($fetch_profile["id_role"] == 2) { ?>
            <a href="dashboard/" class="option-btn">Espace Employe</a>
            <?php }
                if ($fetch_profile["id_role"] == 3) { ?>
                    <a href="dashboard/" class="option-btn">Espace Employe</a>
                <?php }
                if ($fetch_profile["id_role"] == 4) { ?>
                    <a href="dashboard/" class="option-btn">Espace Patron</a>
               <?php } ?>
                <a href="deconnexion.php" class="option-btn" onclick="return confirm('Voulez-vous vous déconnecter ?');">Se déconnecter</a>
            <?php } else {
                ?>
                <!-- sinon si la personne n'est pas connectée, on affiche ce message -->
                <p>Veuiller d'abord vous connecter !</p>
                <div class="flex-btn">
                    <!-- les boutons d'inscription et de connexion s'affichent -->
                    <a href="inscription.php" class="option-btn">Inscription</a>
                    <a href="connexion.php" class="option-btn">Connexion</a>
                </div>
                <?php
            }
            ?>

        </div>

    </section>

</header>
