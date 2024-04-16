<footer>
    <section class="bg-footer">
        <div class="footer-logo">
            <a href="./?action=accueil"><img src="static/img/logo.png" alt="Logo"></a>
        </div>
        <div class="footer-columns">
            <div class="footer-column">
                <h3>Adresse :</h3>
                <ul>
                    <li>59 Rue la fontaine</li>
                    <li>35700 Rennes</li>
                    <li>02 43 57 29 86 1</li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Nous suivre :</h3>
                <ul>
                    <li><a href="https://discord.com/" target="_blank"><i class="fab fa-discord"></i> Discord</a></li>
                    <li><a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-square"></i> Facebook</a></li>
                    <li><a href="https://twitter.com/"target="_blank"><i class="fa-solid fa-xmark"></i> Twitter</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Liens utiles :</h3>
                <ul>
                    <li><a href="./?action=mentionsLegales">Mentions légales</a></li>
                    <li><a href="./?action=politiqueDeConfidentialite">Politique de confidentialité</a></li>
                    <?php
                    // Vérifier si $_SESSION['role'] est défini et égal à 'admin'
                    if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
                        // Afficher le lien la page administrateur
                        echo '<li><a href="./?action=administrateur">Menu administrateur</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </section>
    <section class="copyright">
        <p>Copyright © 2024 - Stellar Sentry TD</p>
    </section>
</footer>
</body>

</html>