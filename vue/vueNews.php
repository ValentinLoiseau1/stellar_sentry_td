<?php
require_once "./modele/modeleNews.php";
?>
<div>
    <?php
    // Récupération des commentaires
    $news = recupererNews();

    // Vérification s'il y a des commentaires à afficher
    if ($news) {
        //Affiche chaque commentaires stocker dans la base de donnée
        echo "<h2 class>Les dernières mises à jour</h2>";
        foreach ($news as $new) {
            // Affichage du contenu du commentaire dans une div
            echo "<div>";
            echo "<p><strong>Date: </strong>" . $new['creation_date'] . "</p>";
            echo "<p><strong>Mise a jour : </strong> " . $new['content'] . "</p>";
            echo "<br>";
            echo "</div>";
        }
    } else {
        // Affichage d'un message si aucun commentaire n'est trouvé
        echo "Aucun commentaire trouvé.";
    }
    ?>
</div>