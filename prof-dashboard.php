<?php
require_once 'etudiant.php';

session_start();
include 'navbar.php';

$etudiant = $_SESSION['etudiant_connecte'] ?? null;

if (!$etudiant || $etudiant->getStatut() != 0) {
    header("Location: not-allowed.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Professeur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #f8f9fa, #e9ecef);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .dashboard-card {
            border: none;
            border-radius: 15px;
            background-color: white;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .list-group-item {
            border: none;
            padding: 15px 20px;
            font-size: 1.1rem;
            transition: background-color 0.2s ease;
        }

        .list-group-item a {
            text-decoration: none;
            color: #212529;
            display: block;
        }

        .list-group-item:hover {
            background-color: #f1f1f1;
        }

        .emoji {
            font-size: 1.4rem;
        }
    </style>
</head>
<body>

<!-- Contenu principal -->
<div class="container mt-5">
    <div class="text-center mb-4">
        <h1>Bienvenue, Prof. <span class="text-primary"><?= htmlspecialchars($etudiant->getFullName()) ?></span> 👨‍🏫</h1>
    </div>

    <div class="card dashboard-card p-4 mx-auto" style="max-width: 500px;">
        <h3 class="mb-3">📋 Menu</h3>
        <ul class="list-group">
            <li class="list-group-item"><a href="note-creat.php">📚 Gérer les notes</a></li>
            <li class="list-group-item"><a href="etudiants-index.php">👥 Liste des étudiants</a></li>
            <li class="list-group-item"><a href="note-index.php">📚 Liste des notes</a></li>
            <li class="list-group-item"><a href="logout.php">🚪 Déconnexion</a></li>
        </ul>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
