<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VinciLab - Test CI/CD</title>
    <meta name="description" content="VinciLab - Publiez vos applications open source, partagez votre code et gagnez en visibilité.">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <a href="">
                    <img src="../images/logo/logo-vinci.png" alt="VinciLab Logo" height="32">
                    <span class="logo-text">VinciLab</span>
                </a>
            </div>
            <nav>
                <a href="#mission">Mission</a>
                <a href="#fonctionnement">Fonctionnement</a>
                <a href="#project">Projet</a>
                <a href="#newsletter">Contact</a>
            </nav>

            <?php if (isset($_SESSION['user_id'])) { ?>
                <div class="d-flex gap-2 align-items-center">
                    <a href="/vincilab/public/mes-projets" class="btn-outline btn-publier">Mes projets</a>
                    <button class="btn-primary btn-publier" onclick="window.location.href='/vincilab/public/logout'">Déconnexion</button>
                </div>
            <?php } else { ?>
                <button class="btn-primary btn-publier" onclick="window.location.href='/vincilab/public/login'">Connexion</button>
            <?php } ?>

            <!--Burger menu mobile-->
            <button class="burger" id="burger" aria-label="Menu" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </header>

    <main>

        <!--Hero-->
        <section id="hero" class="hero">
            <div class="container">
                <h1>Vos apps open <br> source, prêtes à être<br>montrées</h1>
                <p>Publiez votre projet, développez votre preuve de concept et gagnez en visibilité</p>

                <div class="btn-hero">
                    <button class="btn-primary" onclick="window.location.href='/vincilab/public/projet/soumettre'">Publier</button>
                    <button class="btn-outline" onclick="window.location.href='#project'">Explorer</button>
                </div>
                <div class="hero-banner">
                    <img src="../images/banners/hero_banner.png" alt="Bannière Hero">
                </div>
            </div>
        </section>

        <!--Mission-->
        <section id="mission" class="mission">
            <div class="container">
                <h2>Ce qu'est VinciLab</h2>
                <p>VinciLab est une plateforme dédiée à la publication <br> d'applications et au partage de code open source</p>

                <div class="cards-mission">

                    <div class="card-mission">
                        <div class="first-mission-card">
                            <div class="card-mission-header">
                                <div class="card-mission-img"><img src="../images/card_mission/card_mission_img_1.png" alt=""></div>

                                <h3>Code open source</h3>
                            </div>
                            <p>Centralisez vos dépôts et rendez votre travail accessible. </p>
                        </div>
                    </div>

                    <div class="card-mission">
                        <div class="card-mission-header">
                            <div class="card-mission-img"><img src="../images/card_mission/card_mission_img_2.png" alt=""></div>
                            <h3>Démo en ligne</h3>
                        </div>
                        <p>Montrez votre projet en ligne en un clic.</p>

                    </div >

                    <div class="card-mission">
                        <div class="card-mission-header">
                            <div class="card-mission-img"><img src="../images/card_mission/card_mission_img_3.png" alt=""></div>
                            <h3>Validation de preuve de concept</h3>
                        </div>
                        <p>Présentez vos POC fonctionnels pour obtenir des retours rapides</p>
                    </div>
                </div>
                <div class="mission-banner">
                    <img src="../images/banners/mission_banner.png" alt="Bannière Mission">
                </div>
            </div>
        </section>


        <!--Fonctionnement-->
        <section id="fonctionnement" class="fonctionnement">
            <div class="container">
                <div class="fonc-title">
                    <h2>Comment ça marche?</h2>
                </div>

                <div class="cards-fonc">

                    <div class="card-fonc left-card">
                        <div class="card-fonc-img">
                            <img src="../images/card-fonctionnement-imgs/card-fonctionnement-img-1.png" alt="">
                        </div>

                        <div class="card-fonc-content">
                            <h3>Publiez votre code sur GitHub</h3>
                        </div>
                    </div>

                    <div class="card-fonc center-card">
                        <div class="card-fonc-img">
                            <img src="../images/card-fonctionnement-imgs/card-fonctionnement-img-2.png" alt="">
                        </div>

                        <div class="card-fonc-content">
                            <h3>Ajoutez les métadonnées</h3>
                        </div>
                    </div>

                    <div class="card-fonc center-card">
                        <div class="card-fonc-img">
                            <img src="../images/card-fonctionnement-imgs/card-fonctionnement-img-3.png" alt="">
                        </div>

                        <div class="card-fonc-content">
                            <h3>Validation technique</h3>
                        </div>
                    </div>

                    <div class="card-fonc right-card">
                        <div class="card-fonc-img">
                            <img src="../images/card-fonctionnement-imgs/card-fonctionnement-img-4.png" alt="">
                        </div>

                        <div class="card-fonc-content">
                            <h3>Publication sur VinciLab</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--Projects-->
        <section id="project" class="project">
            <div class="container">
                <div class="project-title">
                    <h2>Projets à la une</h2>
                    <p>Découvrez les projets du moment</p>
                </div>

                <div class="cards-project">
                    <?php if (empty($featuredProjects)) { ?>
                        <p>Aucun projet à la une pour l'instant.</p>
                    <?php } else { ?>
                        <?php foreach ($featuredProjects as $projet) { ?>
                            <div class="card-project">
                                <div class="card-project-img">
                                    <img src="" alt="">
                                </div>
                                <div class="card-project-content">
                                    <h3><?php echo htmlspecialchars($projet['title']); ?></h3>
                                    <p><?php echo htmlspecialchars($projet['description'] ?? 'Projet hébergé sur VinciLab'); ?></p>
                                </div>
                                <div class="card-project-button">
                                    <?php if (!empty($projet['demo_link'])) { ?>
                                        <button class="btn-primary" onclick="window.location.href='<?php echo htmlspecialchars($projet['demo_link']); ?>'">Démo</button>
                                    <?php } ?>
                                    <button class="btn-outline" onclick="window.location.href='<?php echo htmlspecialchars($projet['github_link']); ?>'">Code</button>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>

            </div>
        </section>

        <!--Publier un projet-->
        <section id="publication" class="publication">
                <div class="container">

                    <div class="cards-pub">

                        <div class="card-pub-title">
                            <h2>Soumettre votre application</h2>
                            <button class="btn-outline" onclick="window.location.href='/vincilab/public/projet/soumettre'">Publier</button>
                        </div>

                    <div class="right-pub-cards">
                            <div class="card-pub-item">
                                    <div class="card-pub-img">
                                        <img src="../images/pub-images/card-pub-img-1.png" alt="">
                                    </div>

                                    <div class="card-pub-content">
                                        <h3>Repo public</h3>
                                        <p>Hébergez votre code dans un repo public.</p>
                                    </div>
                            </div>

                            <div class="card-pub-item">
                                <div class="card-pub-img">
                                    <img src="../images/pub-images/card-pub-img-2.png" alt="">
                                </div>

                                <div class="card-pub-content">
                                    <h3>Licence open source </h3>
                                    <p>Assurez vous d'inclure une licence.</p>
                                </div>
                            </div>


                            <div class="card-pub-item">
                                <div class="card-pub-img">
                                    <img src="../images/pub-images/card-pub-img-3.png" alt="">
                                </div>

                                <div class="card-pub-content">
                                    <h3>Démo fonctionnelle </h3>
                                    <p>Montrez une application prête à l'emploi</p>
                                </div>
                            </div>

                            <div class="card-pub-item">
                                <div class="card-pub-img">
                                    <img src="../images/pub-images/card-pub-img-4.png" alt="">
                                </div>

                                <div class="card-pub-content">
                                    <h3>Documentation</h3>
                                    <p>UN fichier readme est indispensable pour expliquer votre projet.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>

        <!--Newsletter-->
        <aside id="newsletter" class="newsletter">
            <div class="container">
                <div class="newsletter-global">
                    <div class="newsletter-left">
                        <h2>Ne manquez <br>aucune tendance</h2>
                    </div>

                    <div class="newsletter-right">
                        <p> Abonnez-vous à notre newsletter </p>
                        <form action="/vincilab/public/newsletter" method="POST" class="newsletter-form">
                            <input type="email" name="email" placeholder="Votre adresse e-mail...">
                            <button class="btn-primary">S'abonner</button>
                        </form>
                    </div>
                </div>
            </div>
        </aside>

</main>


        <footer>
            <div class="container">
                <div class="footer-global">
                    <div class="logo">
                        <a href="">
                            <img src="../images/logo/logo-vinci.png" alt="VinciLab Logo" height="32">
                            <span class="logo-text">VinciLab</span>
                        </a>
                    </div>

                    <div class="footer-ressources">
                        <h3>Ressources</h3>
                        <ul>
                            <li><a href="">GitHub</a></li>
                            <li><a href="">Contact</a></li>
                            <li><a href="">Copyright</a></li>
                        </ul>
                    </div>

                    <div class="footer-legal">
                        <h3>Légal</h3>
                        <ul>
                            <li><a href="">Mentions légales</a></li>
                            <li><a href="">CGU</a></li>
                            <li><a href="">Politique de confidentialité</a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </footer>

    <script src="script.js"></script>
</body>
</html>
