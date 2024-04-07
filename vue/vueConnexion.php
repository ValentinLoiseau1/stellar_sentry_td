<?php 
    include ("vue/head.php");
    include ("vue/header.php");
?>

<section class="form-content">
    <h2>Connectez-vous</h2>
    <article>
        <form action="./?action=connexion" method="post">
            <p>
                <label for="email">Adresse mail</label>
            </p>
            <p>
                <input type="email" name="email" id="email" placeholder="Email" required>
            </p>
            <p>
                <label for="mot_de_passe">Mot de passe</label>
            </p>
            <p>
                <input type="password" name="mot_de_passe" id="mot_de_passe" placeholder="Mot de passe" required>
            </p>
            <?php include ("vue/vueMessageErreur.php"); ?>
            <p>
                <button type="submit" class="bouton" id="monBouton">connexion</button>
            </p>
            <article class="news">
                <h3>Les derniéres mises a jours :</h3>
            </article>
        </form>
        <img src="static/img/connexion.png" alt="connexion">
    </article>
</section>

<?php
    include ("vue/footer.php");
?>