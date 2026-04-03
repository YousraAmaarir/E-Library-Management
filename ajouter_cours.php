<?php
include('config.php');
session_start();

// Ila machi admin, rjj3ou l'accueil
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit();
}

if (isset($_POST['upload'])) {
    $titre = mysqli_real_escape_string($conn, $_POST['titre']);
    $cat_id = $_POST['categorie'];
    $user_id = $_SESSION['user_id'];
    
    // Khidma dyal l'fichier
    $file_name = $_FILES['pdf_file']['name'];
    $file_tmp = $_FILES['pdf_file']['tmp_name'];
    $file_dest = "uploads/" . time() . "_" . $file_name; // Zdna l'waqt bach may-tkhaltouch les noms

    if (move_uploaded_file($file_tmp, $file_dest)) {
        $sql = "INSERT INTO documents (titre, file_path, category_id, user_id) 
                VALUES ('$titre', '$file_dest', '$cat_id', '$user_id')";
        if (mysqli_query($conn, $sql)) {
            $success = "Le cours a été ajouté avec succès ! 🍓✨";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un cours | ISTA Library 🎀</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #fff5f6; display: flex; align-items: center; justify-content: center; min-height: 100vh; }
        .upload-card { background: white; padding: 40px; border-radius: 30px; border: 3px dashed #ff758f; width: 100%; max-width: 500px; }
        .btn-cherry { background-color: #d21f3c; color: white; border-radius: 15px; border: none; padding: 12px; font-weight: 600; width: 100%; }
    </style>
</head>
<body>
    <div class="upload-card shadow-sm">
        <h3 class="text-center fw-bold mb-4" style="color: #d21f3c;">Ajouter un PDF 📚</h3>
        
        <?php if(isset($success)) echo "<div class='alert alert-success'>$success</div>"; ?>

        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label fw-bold small">Titre du module</label>
                <input type="text" name="titre" class="form-control" placeholder="ex: Programmation PHP" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold small">Filière</label>
                <select name="categorie" class="form-select">
                    <option value="1">Développement Digital</option>
                    <option value="2">Infrastructure Digitale</option>
                    <option value="3">Gestion des Entreprises</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="form-label fw-bold small">Fichier PDF</label>
                <input type="file" name="pdf_file" class="form-control" accept=".pdf" required>
            </div>
            <button type="submit" name="upload" class="btn btn-cherry">Publier le cours 🍓</button>
        </form>
        <div class="text-center mt-3">
            <a href="index.php" class="text-decoration-none" style="color: #ff758f; font-weight: 600;">← Retour à l'accueil</a>
        </div>
    </div>
</body>
</html>