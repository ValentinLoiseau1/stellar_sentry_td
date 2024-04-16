<?php 
    include ("vue/head.php");
    include ("vue/header.php");
?>

<section class="form-content">
    <h2>Rejoignez-nous</h2>
    <article>
        <form action="./?action=inscription" method="post">
            <p>
                <label for="prenom">Prenom *</label>
            </p>
            <p>
                <input type="text" name="prenom" id="prenom" placeholder="Prénom" value="<?php if (isset($prenom)){ echo $prenom; } ?>" required>
                
            </p>
            <p>
                <label for="nom">Nom *</label>
            </p>
            <p>
                <input type="text" name="nom" id="nom" placeholder="Nom" value="<?php if (isset($nom)){ echo $nom; } ?>" required>
            </p>
            <p>
                <label for="pseudo">Pseudo *</label>
            </p>
            <p>
                <input type="text" name="pseudo" id="pseudo" placeholder="Pseudonyme" value="<?php if (isset($pseudo)){ echo $pseudo; } ?>" required>
            </p>
            <p>
                <label for="email">Adresse mail *</label>
            </p>
            <p>
                <input type="email" name="email" id="email" placeholder="Email" value="<?php if (isset($email)){ echo $email; } ?>" required>
            </p>
            <p>
                <label for="mot_de_passe">Mot de passe *</label>
            </p>
            <p>
                <input type="password" name="mot_de_passe" id="mot_de_passe" placeholder="Mot de passe" required>
            </p>
            <?php include ("vue/vueMessageErreur.php"); ?>
            <p>
                <input type="checkbox" id="rgpd" name="rgpd" value="rgpd" required>
                <label for="rgpd">
                    J'autorise ce site à utiliser mes données personnelles selon
                    notre <a href="./?action=politiqueDeConfidentialite">Politique de confidentialité</a> *
                </label>
            </p>
            <p>
                Les champs suivis d'un * sont obligatoires.
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