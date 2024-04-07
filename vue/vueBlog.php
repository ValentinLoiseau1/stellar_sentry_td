<?php 
    include ("vue/head.php");
    include ("vue/header.php");
?>
<section class="form-content">
    <h2>Laissez-nous votre avis :</h2>
    <article>
        <form action="modele/modeleBlog.php" method="post">
            <p>
                <label for="pseudo">Pseudo</label>
            </p>
            <p>
                <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" required>
            </p>
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
            <p>
                <button type="submit" class="bouton" id="monBouton">Envoyer</button>
            </p>
        </form>
        <img src="static/img/blog.jpg" alt="inscription">
    </article>
</section>
<?php 
    include ("vue/footer.php");
?>