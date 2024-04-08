<?php
include("vue/head.php");
include("vue/header.php");
?>

<?php
// Vérifier si $_SESSION['email'] est défini
if (isset($_SESSION['email'])) {

    // Si la session est ouverte, afficher la section HTML
?>
    <section class="form-content">
        <h2>Laissez-nous votre avis :</h2>
        <article>
            <form action="./?action=blogAjout" method="post">
                <p>
                    <label for="titre">Titre</label>
                </p>
                <p>
                    <input type="text" name="titre" id="titre" placeholder="Titre" required>
                </p>
                <p>
                    <label for="message">Message</label>
                </p>
                <p>
                    <textarea name="message" id="message" placeholder="Votre message" required></textarea>
                </p>
                <?php include("vue/vueMessageErreur.php"); ?>
                <p>
                    <button type="submit" class="bouton" id="monBouton">Envoyer</button>
                </p>
            </form>
            <img src="static/img/blog.jpg" alt="inscription">
        </article>
    </section>
<?php
} else {
    // Si la session n'est pas ouverte, afficher le message pour inciter à l'inscription
?>
    <div class="form-content">
        <h2>Veuillez vous inscrire pour rédiger un avis</h2>
    </div>
<?php
}
?>

<section>
    <div class="title-banner">
        <h2>Consultez les avis des autres utilisateurs :</h2>
    </div>
    <div class="container">
        <?php
        // Récupération des commentaires
        $commentaires = recupererCommentaires();

        // Vérification s'il y a des commentaires à afficher
        if ($commentaires) {
            //Affiche chaque commentaires stocker dans la base de donnée
            foreach ($commentaires as $commentaire) {
                // Affichage du contenu du commentaire dans une div
                echo "<div class='comment'>";
                echo "<p><strong>Auteur: </strong>" . $commentaire['login_'] . "</p>";
                echo "<p><strong>Titre:</strong> " . $commentaire['title'] . "</p>";
                echo "<p><strong>Avis:</strong> " . $commentaire['content'] . "</p>";
                echo "</div>";
            }
        } else {
            // Affichage d'un message si aucun commentaire n'est trouvé
            echo "Aucun commentaire trouvé.";
        }
        ?>
    </div>
</section>
<?php
include("vue/footer.php");
?>