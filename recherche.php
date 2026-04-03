<?php
include('config.php');
session_start();

$query = "";
if (isset($_GET['search'])) {
    $query = mysqli_real_escape_string($conn, $_GET['search']);
    $sql = "SELECT * FROM documents WHERE titre LIKE '%$query%' ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Résultats pour: <?php echo $query; ?> | 🍓</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #fff5f6; }
        .result-card { background: white; border-radius: 20px; border: 2px solid #ffccd5; padding: 20px; margin-bottom: 15px; }
        .btn-download { background-color: #d21f3c; color: white; border-radius: 15px; text-decoration: none; padding: 8px 18px; font-weight: 600; }
    </style>
</head>
<body>
    <div class="container py-5">
        <h3 class="fw-bold mb-4" style="color: #4a0e0e;">Résultats pour : <span style="color: #d21f3c;">"<?php echo $query; ?>"</span> 🔍</h3>
        
        <div class="row">
            <?php if(isset($result) && mysqli_num_rows($result) > 0): ?>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <div class="col-md-8 mx-auto">
                        <div class="result-card d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="fw-bold mb-0"><?php echo $row['titre']; ?></h5>
                                <small class="text-muted">Document PDF trouvé ✨</small>
                            </div>
                            <a href="<?php echo $row['file_path']; ?>" class="btn-download" target="_blank">Ouvrir</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="text-center mt-5">
                    <p class="lead">Aucun cours trouvé pour cette recherche... 🍓</p>
                    <a href="index.php" class="btn btn-outline-danger rounded-pill">Retour à l'accueil</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>