<?php
include("vue/head.php");
include("vue/header.php");
?>
<section class="form-content">
    <article>
        <form action="./?action=profil" method="post">
            <h2 class="title-profil">Modifiez votre profil :</h2>
            <p>
                <label for="prenom">Nouveau prénom</label>
            </p>
            <p>
                <input type="text" name="prenom" id="prenom" placeholder="Prénom" required>
            </p>
            <p>
                <label for="nom">Nouveau nom</label>
            </p>
            <p>
                <input type="text" name="nom" id="nom" placeholder="Nom" required>
            </p>
            <p>
                <label for="pseudo">Nouveau pseudo</label>
            </p>
            <p>
                <input type="text" name="pseudo" id="pseudo" placeholder="Pseudonyme" required>
            </p>
            <p>
                <label for="email">Nouvelle adresse mail</label>
            </p>
            <p>
                <input type="email" name="email" id="email" placeholder="Email" required>
            </p>
            <p>
                <label for="mot_de_passe">Nouveau mot de passe</label>
            </p>
            <p>
                <input type="password" name="mot_de_passe" id="mot_de_passe" placeholder="Mot de passe" required>
            </p>
            <p>
                <label for="mot_de_passe_confirmation">Confirmez le nouveau mot de passe</label>
            </p>
            <p>
                <input type="password" name="mot_de_passe_confirmation" id="mot_de_passe_confirmation" placeholder="Confirmez le mot de passe" required>
            </p>
            <?php include ("vue/vueMessageErreur.php"); ?>
            <p>
                <button type="submit" class="bouton" id="monBouton">Envoyer</button>
            </p>
        </form>
        <div class="profil-container">
            <h2>Votre profil :</h2>
            <?php
            // Récupération des commentaires
            $profils = recupererProfil();

            // Vérification s'il y a des commentaires à afficher
            if ($profils) {
                //Affiche chaque commentaires stocker dans la base de donnée
                foreach ($profils as $profil) {
                    // Affichage du contenu du commentaire dans une div
                    echo "<div class='profil-info'>";
                    echo "<p><strong>Nom:</strong> " . $profil['name'] . "</p>";
                    echo "<p><strong>Prénom:</strong> " . $profil['surname'] . "</p>";
                    echo "<p><strong>Pseudos: </strong>" . $profil['login_'] . "</p>";
                    echo "<p><strong>Email:</strong> " . $profil['email'] . "</p>";
                    echo "</div>";
                }
            } else {
                // Affichage d'un message si aucun commentaire n'est trouvé
                echo "Aucun profil trouvé.";
            }
            ?>
        </div>
    </article>
</section>

<?php
include("vue/footer.php");
?>