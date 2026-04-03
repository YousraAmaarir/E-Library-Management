<?php
include('config.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        header("Location: index.php");
        exit();
    } else {
        $error = "Email awla mot de passe m-ghalet! 🍓";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion | ISTA Library 🎀</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Poppins', sans-serif; background: linear-gradient(135deg, #ff758f 0%, #ffccd5 100%); height: 100vh; display: flex; align-items: center; justify-content: center; }
        .login-card { 
            background: white; 
            padding: 50px; 
            border-radius: 40px; 
            box-shadow: 0 20px 50px rgba(210, 31, 60, 0.25); 
            width: 100%; 
            max-width: 550px; /* Hna fin ghadi i-welli kbir */
            border: 4px dashed #ff758f; 
        }
        .btn-cherry { background-color: #d21f3c; color: white; border-radius: 20px; width: 100%; border: none; padding: 15px; font-weight: 600; font-size: 1.1rem; transition: 0.3s; }
        .btn-cherry:hover { background-color: #a3182e; transform: scale(1.02); }
        .form-control { border-radius: 15px; padding: 15px; border: 2px solid #f8f9fa; background: #f8f9fa; }
        .back-home { display: block; text-align: center; margin-top: 25px; color: #d21f3c; text-decoration: none; font-weight: 600; }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="text-center mb-5">
            <h2 class="fw-bold" style="color: #d21f3c;">Se Connecter 🍓</h2>
            <p class="text-muted">Heureux de vous revoir !</p>
            <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
        </div>
        <form method="POST">
            <div class="mb-4">
                <label class="form-label fw-bold">Email</label>
                <input type="text" name="email" class="form-control" placeholder="yousra@" required>
            </div>
            <div class="mb-5">
                <label class="form-label fw-bold">Mot de passe</label>
                <input type="password" name="password" class="form-control" placeholder="••••••••" required>
            </div>
            <button type="submit" class="btn btn-cherry shadow">Connexion ✨</button>
        </form>
        <a href="index.php" class="back-home"><i class="fas fa-arrow-left me-2"></i> Retourner à l'accueil</a>
    </div>
</body>
</html>