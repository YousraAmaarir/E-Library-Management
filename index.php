<?php
session_start();
include('config.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ISTA Library | Digital Space 🎀</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fff5f6;
            color: #4a0e0e;
            overflow-x: hidden;
        }
        
        .navbar {
            background-color: #ffffff;
            border-bottom: 3px solid #ff758f;
            box-shadow: 0 2px 10px rgba(255, 117, 143, 0.1);
        }
        .navbar-brand { font-weight: 700; color: #d21f3c !important; display: flex; align-items: center; }
        .nav-link { color: #4a0e0e !important; font-weight: 500; transition: 0.3s; margin: 0 10px; }
        .nav-link:hover { color: #ff758f !important; }

        .hero-section {
            background: linear-gradient(135deg, #ff758f 0%, #d21f3c 100%);
            color: white;
            padding: 100px 0 140px 0;
            border-radius: 0 0 50px 50px;
            position: relative;
        }

        .sticker-img {
            filter: drop-shadow(0 0 2px white) drop-shadow(4px 4px 8px rgba(0,0,0,0.15));
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        .sticker-img:hover { transform: scale(1.1) rotate(5deg); }

        .search-box {
            background: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(210, 31, 60, 0.15);
            margin-top: -60px;
            position: relative;
            z-index: 100;
            border: 2px dashed #ffccd5;
        }

        .card {
            border: 2px solid #ffccd5;
            border-radius: 25px;
            transition: all 0.3s ease;
            background: white;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(255, 117, 143, 0.3) !important;
        }

        .btn-cherry {
            background-color: #d21f3c;
            color: white;
            border-radius: 20px;
            border: none;
            padding: 8px 25px;
            transition: 0.3s;
            text-decoration: none;
        }
        .btn-cherry:hover { background-color: #a3182e; color: white; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="img/A.png" style="width: 35px;" class="sticker-img me-2"> ISTA LIB
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="#filieres">Bibliothèque</a></li>
                    
                    <li class="nav-item ms-lg-3">
                        <?php if(isset($_SESSION['username'])): ?>
                            <span class="me-3 fw-bold" style="color: #d21f3c;">Bonjour, <?php echo $_SESSION['username']; ?> ✨</span>
                            <?php if($_SESSION['role'] == 'admin'): ?>
                                <a class="btn btn-warning btn-sm rounded-pill me-2 fw-bold" href="ajouter_cours.php">Ajouter Cours</a>
                            <?php endif; ?>
                            <a class="btn btn-outline-danger btn-sm rounded-pill" href="logout.php">Déconnexion</a>
                        <?php else: ?>
                            <a class="btn btn-cherry shadow-sm" href="login.php">Connexion 🎀</a>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="hero-section text-center">
        <div class="container position-relative">
            <img src="img/E.png" class="sticker-img d-none d-lg-block" style="position: absolute; left: 0%; top: -20px; width: 100px; transform: rotate(-15deg);">
            <h1 class="display-4 fw-bold">Bibliothèque Numérique ISTA 🍓</h1>
            <p class="lead">Votre espace d'apprentissage en ligne.</p>
            <img src="img/H.png" class="sticker-img d-none d-lg-block" style="position: absolute; right: 0%; bottom: -10px; width: 120px; transform: rotate(15deg);">
        </div>
    </header>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="search-box">
                    <form class="d-flex gap-2" action="recherche.php" method="GET">
                         <input class="form-control form-control-lg border-0 bg-light" name="search" type="search" placeholder="Tapez le nom d'un cours (ex: Laravel)..." style="border-radius: 15px;" required>
                         <button class="btn btn-cherry" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <section id="filieres" class="container mt-5 py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Nos Filières</h2>
            <p class="text-muted">Accédez aux ressources par domaine technique</p>
        </div>
        <div class="row g-4 text-center">
            <div class="col-md-4">
                <div class="card h-100 p-4 shadow-sm">
                    <div class="card-body">
                        <img src="img/B.png" class="sticker-img mb-3" style="width: 75px;">
                        <h5 class="fw-bold">Développement Digital</h5>
                        <p class="small text-muted">Cours Web, Mobile et Desktop</p>
                        <a href="liste_cours.php?cat=1" class="btn btn-outline-danger btn-sm rounded-pill mt-2">Accéder aux PDF 🍓</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 p-4 shadow-sm">
                    <div class="card-body">
                        <img src="img/C.png" class="sticker-img mb-3" style="width: 75px;">
                        <h5 class="fw-bold">Infrastructure Digitale</h5>
                        <p class="small text-muted">Systèmes, Réseaux et Cloud</p>
                        <a href="liste_cours.php?cat=2" class="btn btn-outline-danger btn-sm rounded-pill mt-2">Accéder aux PDF ✨</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 p-4 shadow-sm">
                    <div class="card-body">
                        <img src="img/D.png" class="sticker-img mb-3" style="width: 75px;">
                        <h5 class="fw-bold">Gestion des Entreprises</h5>
                        <p class="small text-muted">Comptabilité, Marketing et RH</p>
                        <a href="liste_cours.php?cat=3" class="btn btn-outline-danger btn-sm rounded-pill mt-2">Accéder aux PDF 🎀</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="text-center py-4 mt-5" style="background: #4a1111; color: white;">
        <div class="container">
            <p class="mb-0">© 2026 | ISTA Library Aesthetic Edition</p>
            <small>Par : <strong>YOUSRA AMAARIR & SOUKAINA BENALI</strong></small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>