<?php 
    include ("vue/head.php");
    include ("vue/header.php");
?>
<section class="form-content">
    <h2>Rejoignez-nous</h2>
    <article>
        <form action="./?action=inscription" method="post">
            <p>
                <label for="nom">Nom</label>
            </p>
            <p>
                <input type="text" name="nom" id="nom" placeholder="Nom" required>
            </p>
            <p>
                <label for="prenom">Prenom</label>
            </p>
            <p>
                <input type="text" name="prenom" id="prenom" placeholder="Prénom" required>
            </p>
            <p>
                <label for="pseudo">Pseudo</label>
            </p>
            <p>
                <input type="text" name="pseudo" id="pseudo" placeholder="Pseudonyme" required>
            </p>
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
            <p>
                <input type="checkbox" id="rgpd" name="rgpd" value="rgpd" required>
                <label for="rgpd">
                    J'autorise ce site à utiliser mes données personnelles selon
                    notre <a href="./?action=politiqueDeConfidentialite">Politique de confidentialité</a>
                </label>
            </p>
            <p>
                <button type="submit" class="bouton" id="monBouton">Envoyer</button>
            </p>
        </form>
        <img src="static/img/inscription.png" alt="inscription">
    </article>
</section>
<?php
    include ("vue/footer.php");
?>