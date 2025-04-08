<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$etudiant = $_SESSION['etudiant_connecte'] ?? null;
$fullName = $etudiant ? htmlspecialchars($etudiant->getFullName()) : "Invité";
$role = ($etudiant && $etudiant->getStatut() == 0) ? "Professeur" : "Étudiant";
?>

<!-- Barre de navigation commune -->
<div class="navbar-custom d-flex align-items-center justify-content-between">
    <div>
        <a href="<?= ($role === 'Professeur') ? 'prof-dashboard.php' : 'etudiants-index.php' ?>">🏠 Accueil</a>
    </div>
    <div class="title text-center">Bienvenue, <?= $fullName ?></div>
    <div class="text-end">
        <span class="badge <?= ($role === 'Professeur') ? 'bg-success' : 'bg-primary' ?>"><?= $role ?></span>
    </div>
</div>

<style>
    .navbar-custom {
        background-color:rgb(73, 97, 134);
        padding: 1rem;
        color: white;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .navbar-custom a {
        color: white;
        text-decoration: none;
        font-weight: 500;
        margin-left: 10px;
    }

    .navbar-custom .title {
        flex: 1;
        font-size: 1.3rem;
        font-weight: bold;
    }
</style>
