<?php
    include("vue/head.php");
    include("vue/header.php");
?>
<section>
    <div class="profil">
        <h2>Mon profil :</h2>
    </div>
    <div class="container">
        <?php
        // Récupération des commentaires
        $profils = recupererProfil();

        // Vérification s'il y a des commentaires à afficher
        if ($profils) {
            //Affiche chaque commentaires stocker dans la base de donnée
            foreach ($profils as $profil) {
                // Affichage du contenu du commentaire dans une div
                echo "<div class='comment'>";
                echo "<p><strong>Nom:</strong> " . $profil['name'] . "</p>";
                echo "<p><strong>Prénom:</strong> " . $profil['surname'] . "</p>";
                echo "<p><strong>Pseudos: </strong>" . $profil['login_'] . "</p>";
                echo "<p><strong>Email:</strong> " . $profil['email'] . "</p>";
                echo "<p><strong>Mot de passe:</strong> " . $profil['password_'] . "</p>";
                echo "</div>";
            }
        } else {
            // Affichage d'un message si aucun commentaire n'est trouvé
            echo "Aucun profil trouvé.";
        }
        ?>
    </div>
</section>
<?php
    include("vue/footer.php");
?>