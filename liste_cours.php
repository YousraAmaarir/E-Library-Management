<?php
include('config.php');
session_start();

// Fach kanklikiyou 3la filière, kakhdou l'ID dyalha men l'URL (ex: ?cat=1)
$cat_id = isset($_GET['cat']) ? $_GET['cat'] : 1;

// Kanshoufou smiya d l'filière bach n-diroha f'l'titre
$res_cat = mysqli_query($conn, "SELECT nom FROM categories WHERE id = $cat_id");
$cat_data = mysqli_fetch_assoc($res_cat);
$nom_filiere = $cat_data['nom'];

// Kan-jibou ga3 les PDF li f'had l'filière
$sql = "SELECT * FROM documents WHERE category_id = $cat_id ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php echo $nom_filiere; ?> | 🍓</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #fff5f6; }
        .cours-card { background: white; border-radius: 20px; border: 2px solid #ffccd5; transition: 0.3s; padding: 20px; }
        .cours-card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(255, 117, 143, 0.2); }
        .btn-download { background-color: #d21f3c; color: white; border-radius: 15px; text-decoration: none; padding: 10px 20px; display: inline-block; font-weight: 600; }
    </style>
</head>
<body>
    <div class="container py-5">
        <h2 class="fw-bold text-center mb-5" style="color: #d21f3c;">📚 <?php echo $nom_filiere; ?></h2>
        
        <div class="row g-4">
            <?php if(mysqli_num_rows($result) > 0): ?>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <div class="col-md-6">
                        <div class="cours-card d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="fw-bold mb-1"><?php echo $row['titre']; ?></h5>
                                <small class="text-muted"><i class="far fa-file-pdf me-1"></i> Document PDF</small>
                            </div>
                            <a href="<?php echo $row['file_path']; ?>" class="btn-download" target="_blank">
                                <i class="fas fa-download me-2"></i> Télécharger
                            </a>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="text-center">
                    <p class="lead">Baqa ma-zadna hta chi cours hna... 🍓</p>
                    <img src="img/B.png" style="width: 100px; opacity: 0.5;">
                </div>
            <?php endif; ?>
        </div>

        <div class="text-center mt-5">
            <a href="index.php" class="text-decoration-none" style="color: #ff758f; font-weight: 600;">← Retour à l'accueil</a>
        </div>
    </div>
</body>
</html>