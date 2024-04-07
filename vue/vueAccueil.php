<?php 
    include ("vue/head.php");
    include ("vue/header.php");
?>
<main>
    <section>
        <h1 class="video-title">Stellar Sentry TD</h1>
        <p class="video-content">Solo et multijoueur tower defense</p>
        <video autoplay muted loop id="background-video">
            <source src="static/video/nebula_blue.mp4" type="video/mp4">
        </video>
    </section>
    <section>
        <article class="articles-section">
            <div class="article-content">
                <img src="static/img/article1.png" alt="Stratégique" class="article-image">
                <div class="article-text">
                    <h2>Stratégique</h2>
                    <h3>Choisissez votre style de jeu</h3>
                    <p>Construisez de manière défensive afin de maintenir
                        la ligne contre des essaims d'ennemis, ou priorisez
                        l'économie pour évoluer en fin de partie et battre
                        votre record personnel ou celui de vos amis.
                    </p>
                </div>
            </div>
        </article>
        <article class="articles-section articles-section2">
            <div class="article-content article-content2">
                <img src="static/img/article2.png" alt="Rejouabilité infinie" class="article-image">
                <div class="article-text">
                    <h2>Rejouabilité infinie</h2>
                    <h3>Maitrisez les différentes combinaisons</h3>
                    <p>Avec des centaines de combinaisons de tourelles,
                        des décisions stratégiques qui ont un impact sur 
                        le cours du jeu  il n'y a pas deux jeux identiques 
                        sur Stellar Sentry TD. Chaque jeu nécessite une adaptation.
                    </p>
                </div>
            </div>
        </article>
        <article class="articles-section">
            <div class="article-content">
                <img src="static/img/article3.png" alt="Jeu casuel" class="article-image">
                <div class="article-text">
                    <h2>Jeu casuel</h2>
                    <h3>Solo et coopération</h3>
                    <p>Jouez à la campagne en solo ou en équipe de 2 à 4. 
                        Affinez vos défenses. Défiez les robots IA de tout type,  
                        afin de progresser dans le monde de Stellar Sentry TD.
                    </p>
                </div>
            </div>
        </article>
    </section>
</main>

<?php
    include ("vue/footer.php");
?>