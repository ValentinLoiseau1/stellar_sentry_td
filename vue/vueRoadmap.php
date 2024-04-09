<?php
include("vue/head.php");
include("vue/header.php");
?>

<?php
require_once "./modele/modeleRoadmap.php";
?>
<div class="roadmap-title">
    <h2>Feuille de route :</h2>
</div>
<div class="main-content">
    <!-- Contenu principal avec les cartes -->
    <div class="roadmap">
        <?php
        // Récupération des commentaires
        $roadmapItems = recupererRoadmap();

        // Vérification s'il y a des commentaires à afficher
        if ($roadmapItems) {
            //Affiche chaque commentaires stocker dans la base de donnée
            $count = 0;
            foreach ($roadmapItems as $roadmapItem) {
                // Déterminer si c'est un élément de gauche ou de droite
                $count++;
                $class = ($count % 2 == 0) ? 'right' : 'left';

                // Affichage du contenu du commentaire dans une div
                echo "<div class='roadmap_item'>";
                echo "<div class='roadmap_content $class'>";
                echo "<p class='roadmap-version'>" . $roadmapItem['version_'] . "</p>";
                echo "<p>" . $roadmapItem['content'] . "</p>";
                echo "<p class='roadmap-date'>" . $roadmapItem['date_range'] . "</p>";
                echo "</div>";
                echo "<div class='barre-horizontale'>
                            <div class='rond'></div>
                      </div>"; // Barre horizontale avec rond au milieu
                echo "</div>";
            }
        } else {
            // Affichage d'un message si aucun commentaire n'est trouvé
            echo "Aucun commentaire trouvé.";
        }
        ?>
    </div>
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