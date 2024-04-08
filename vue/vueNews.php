<article class="news">
    <div class="container">
        <?php
        // Récupération des commentaires
        $news = recupererNews();

        // Vérification s'il y a des commentaires à afficher
        if ($news) {
            //Affiche chaque commentaires stocker dans la base de donnée
            foreach ($news as $new) {
                // Affichage du contenu du commentaire dans une div
                echo "<div>";
                echo "<p><strong>Date: </strong>" . $news['creation_date'] . "</p>";
                echo "<p><strong>Mise a jour : </strong> " . $news['content'] . "</p>";
                echo "</div>";
            }
        } else {
            // Affichage d'un message si aucun commentaire n'est trouvé
            echo "Aucun commentaire trouvé.";
        }
        ?>
    </div>
</article>