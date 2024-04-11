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
<?php
// Vérifier si $_SESSION['rike'] est défini
if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {

    // Si la session est ouverte, afficher la section HTML
?>
    <section class="form-admin-container">
        <div class="form-admin">
            <h2>Ajouter une étape a la roadmap</h2>
            <form action="#" method="post">
                <p>
                    <label for="version">Version</label>
                </p>
                <p>
                    <input type="text" name="version" id="version" placeholder="Version" required>
                </p>
                <p>
                    <label for="contenu">Contenu</label>
                </p>
                <p>
                    <textarea name="contenu" id="contenu" placeholder="Contenu" required></textarea>
                </p>
                <p>
                    <label for="date">Plage de dates</label>
                </p>
                <p>
                    <textarea name="date" id="date" placeholder="Date" required></textarea>
                </p>
                <?php include("vue/vueMessageErreur.php"); ?>
                <p>
                    <button type="submit" class="bouton" id="monBouton">Envoyer</button>
                </p>
            </form>
        </div>
        <div class="form-admin">
            <h2>Supprimer une étape de la roadmap</h2>
            <form action="#" method="post">
                <p>
                    <label for="version">Version</label>
                </p>
                <p>
                    <input type="text" name="version" id="version" placeholder="Version" required>
                </p>
                <p>
                    <label for="contenu">Contenu</label>
                </p>
                <p>
                    <textarea name="contenu" id="contenu" placeholder="Contenu" required></textarea>
                </p>
                <p>
                    <label for="date">Plage de dates</label>
                </p>
                <p>
                    <textarea name="date" id="date" placeholder="Date" required></textarea>
                </p>
                <?php include("vue/vueMessageErreur.php"); ?>
                <p>
                    <button type="submit" class="bouton" id="monBouton">Envoyer</button>
                </p>
            </form>
        </div>
    </section>
<?php
}
?>
<section class="team">
    <div class="title-banner">
        <h2>Notre équipe :</h2>
    </div>
    <div class="image-container">
        <div id="block-1f853e60-13fd-4edf-b1fe-dac728f081c6" class="image-item">
            <img src="./static/img/avatarHugo.png" onclick='toggleData("1f853e60-13fd-4edf-b1fe-dac728f081c6")' alt="Hugo Buffet">
            <p>Hugo buffet</p>
            <p>Co-fondateur</p>
        </div>
        <div id="block-ee198a4e-482a-4e25-bf81-91b58c97dd5d" class="image-item">
            <img src="./static/img/avatarKevin.png" onclick='toggleData("ee198a4e-482a-4e25-bf81-91b58c97dd5d")' alt="kevin Crouillére">
            <p>Kévin Crouillére</p>
            <p>Co-fondateur</p>
        </div>
        <div id="block-292b9436-5462-4e2d-87eb-bc355ceab56f" class="image-item">
            <img src="./static/img/avatarValentin.png" onclick='toggleData("292b9436-5462-4e2d-87eb-bc355ceab56f")' alt="Valentin Loiseau">
            <p>Valentin Loiseau</p>
            <p>Developpeur-web</p>
        </div>
    </div>
</section>
<?php
include("vue/footer.php");
?>