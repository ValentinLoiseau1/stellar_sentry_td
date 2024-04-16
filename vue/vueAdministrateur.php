<?php
include("vue/head.php");
include("vue/header.php");
?>
<?php if ($_SESSION['role'] == 'admin') {
    ?>
<div class="profil-container">

    <?php
    // Récupération des roadmap_item
    $affichageRoadmapItems = afficherLesRoadpmapItem();

    echo "<h2 class='roadmap-title'>Étapes de la roadmap actuelle :</h2>";
    echo "<section class='form-admin-container'>";

    // Vérification s'il y a des étape de la roadmap à afficher
    if ($affichageRoadmapItems) {
        //Affiche chaque étape de la roadmap a stocker dans la base de donnée
        foreach ($affichageRoadmapItems as $affichageRoadmapItem) {
            // Affichage du contenu des étapes dans une div
            echo "<div class='form-admin'>";
            echo "<form action='./?action=administrateur' method='post'>";
            echo "<p><strong>ID de l'étape :</strong> " . $affichageRoadmapItem['id_roadmap_item'] . "</p>";
            echo "<p><strong>Version :</strong> " . $affichageRoadmapItem['version_'] . "</p>";
            echo "<p><strong>Contenu : </strong>" . $affichageRoadmapItem['content'] . "</p>";
            echo "<p><strong>Date range :</strong> " . $affichageRoadmapItem['date_range'] . "</p>";
            echo "<p><input type='hidden' name='idRoadmap' id='idRoadmap' value=" . $affichageRoadmapItem['id_roadmap_item'] ."></p>";
            echo "<p><input type='hidden' name='idAction' id='idAction' value='delete'></p>";
            echo "<p><button type='submit' class='bouton' id='monBouton'>Supprimer</button></p>";
            echo "</form>";
            echo "</div>";
        }
    } else {
        // Affichage d'un message si aucune étape n'est trouvé
        echo "Aucune etape de la roadmap trouver.";
    }
    ?>
    </section>
</div>
<section class="form-admin-container">
    <div class="form-admin">
        <h2>Ajouter une étape a la roadmap</h2>
        <form action="./?action=administrateur" method="post">
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
                <input type='hidden' name='idAction' id='idAction' value='ajout'>
        </form>
    </div>
</section>
<?php
} else {
    // Si l'utilisateur n'est pas administrateur, inclure la page 404
    include("vue404.php");
}
?>
<?php
include("vue/footer.php");
?>