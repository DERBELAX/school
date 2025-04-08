<?php
require_once 'etudiant.php';
require_once 'etud_crud.php';

session_start();

$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $passwd = $_POST['passwd'];
    $etudiant = authStudent($email, $passwd);

    if ($etudiant != null) {
        $_SESSION['etudiant_connecte'] = $etudiant;

        // Rediriger selon le statut
        if ($etudiant->getStatut() == 0) {  
            header("Location: prof-dashboard.php");
        } else {  
            header("Location: etudiants-index.php");
        }
        exit(); 
    } else {
        $msg = "Identifiants incorrects.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
        }
        .login-container {
            max-width: 400px;
            margin: 80px auto;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .login-title {
            text-align: center;
            margin-bottom: 25px;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h3 class="login-title">Se connecter</h3>

    <?php if ($msg): ?>
        <div class="alert alert-danger text-center"><?= $msg ?></div>
    <?php endif; ?>

    <form action="connect.php" method="post">
        <div class="mb-3">
            <label for="email" class="form-label">Adresse Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        
        <div class="mb-3">
            <label for="passwd" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="passwd" name="passwd" required>
        </div>
        
        <button type="submit" class="btn btn-primary w-100">Se connecter</button>
    </form>
</div>

</body>
</html>
