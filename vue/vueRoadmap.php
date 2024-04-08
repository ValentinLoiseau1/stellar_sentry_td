<?php
include("vue/head.php");
include("vue/header.php");
?>

<?php
require_once "./modele/modeleRoadmap.php";
?>
<div class="roadmap">
    <h2>Feuille de route :</h2>;
    <article class="roadmap_item">

        <?php
        // Récupération des commentaires
        $roadmapItems = recupererRoadmap();

        // Vérification s'il y a des commentaires à afficher
        if ($roadmapItems) {
            //Affiche chaque commentaires stocker dans la base de donnée

            foreach ($roadmapItems as $roadmapItem) {
                // Affichage du contenu du commentaire dans une div
                echo "<div>";
                echo "<p>" . $roadmapItem['version_'] . "</p>";
                echo "<p>" . $roadmapItem['content'] . "</p>";
                echo "<p>" . $roadmapItem['date_range'] . "</p>";
                echo "<br>";
                echo "</div>";
            }
        } else {
            // Affichage d'un message si aucun commentaire n'est trouvé
            echo "Aucun commentaire trouvé.";
        }
        ?>
    </article>
</div>
<section class="team">
    <div class="title-banner">
        <h2>Notre équipe :</h2>
    </div>
    <div class="image-container">
        <div class="image-item">
            <img src="./static/img/avatarHugo.png" alt="Hugo Buffet">
            <p>Hugo buffet</p>
            <p>co-fondateur</p>
            <li><a href="https://www.linkedin.com/"><i class="fa-brands fa-linkedin"></i></i></a></li>
        </div>
        <div class="image-item">
            <img src="./static/img/avatarKevin.png" alt="kevin Crouillére">
            <p>Kevin Crouillére</p>
            <p>co-fondateur</p>
            <li><a href="https://www.linkedin.com/"><i class="fa-brands fa-linkedin"></i></i></a></li>
        </div>
        <div class="image-item">
            <img src="./static/img/avatarValentin.png" alt="Valentin Loiseau">
            <p>Valentin Loiseau</p>
            <p>Developpeur-web</p>
            <li><a href="https://www.linkedin.com/"><i class="fa-brands fa-linkedin"></i></i></a></li>
        </div>
    </div>
</section>

<?php
include("vue/footer.php");
?>