<header>
    <div class="left-section">
        <a href="./?action=accueil"><img src="static/img/logo.png" alt="Logo"></a>
    </div>
    <nav class="main-nav">
        <ul>
            <li><a href="./?action=accueil">Accueil</a></li>
            <li><a href="./?action=roadmap">Roadmap</a></li>
            <li><a href="./?action=blogAjout">Blog</a></li>
        </ul>
    </nav>
    <nav class="right-nav">
        <ul>
            <?php
                if (!isset($_SESSION)) {
                    // Démarrer la session
                    session_start();
                }
                // Vérifier si l'utilisateur est connecté
                if (isset($_SESSION['id_user'])  == true) {
                    // Si l'utilisateur est connecté, afficher le bouton de déconnexion et le bouton de profil
                    echo '<li><a href="./?action=deconnexion">Déconnexion</a></li>';
                    echo '<li><a href="./?action=profil">Mon Profil</a></li>';
                } else {
                    // Si l'utilisateur n'est pas connecté, afficher le bouton de connexion et le bouton d'inscription
                    echo '<li><a href="./?action=connexion">Se connecter</a></li>';
                    echo '<li><a href="./?action=inscription">S\'inscrire</a></li>';
                }
            ?>
        </ul>
    </nav>
    <div id="burger-menu">
        <span></span>
    </div>
    <div id="menu">
        <ul>
            <?php
                if (!isset($_SESSION)) {
                    // Démarrer la session
                    session_start();
                }
                if (isset($_SESSION['email']) == true) {
                    echo '<li><a href="./?action=deconnexion">Déconnexion</a></li>';
                    echo '<li><a href="./?action=profil">Mon Profil</a></li>';
                } else {
                    echo '<li><a href="./?action=connexion">Se connecter</a></li>';
                    echo '<li><a href="./?action=inscription">S\'inscrire</a></li>';
                }
            ?>
            <li><a href="./?action=accueil">Accueil</a></li>
            <li><a href="./?action=roadmap">Roadmap</a></li>
            <li><a href="./?action=blog">Blog</a></li>
        </ul>
    </div>
</header>