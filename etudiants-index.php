<?php
require_once "etud_crud.php";
session_start();
include 'navbar.php';

if (!isset($_SESSION['etudiant_connecte'])) {
    header("Location: connect.php");
    exit();
}

$etuds = getAllstudents();
$etudiant = $_SESSION['etudiant_connecte'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des étudiants</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .badge-role {
            font-size: 0.9rem;
        }
        .btn-update {
            background-color: #0d6efd;
            color: white;
        }
        .btn-delete {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>
<body>



<div class="container mt-4">
    <div class="d-flex justify-content-between mb-3">
        <h4 class="mb-0">👋 Bienvenue <?= htmlspecialchars($etudiant->getFullName()) ?></h4>
        <div>
            <?php if ($etudiant->getStatut() == 0): ?>
                <a href="etudiant-creat.php" class="btn btn-success me-2">➕ Créer un étudiant</a>
            <?php endif; ?>
            <a href="logout.php" class="btn btn-outline-danger">🚪 Déconnexion</a>
        </div>
    </div>

    <div class="table-responsive shadow-sm p-3 bg-white rounded">
        <table class="table table-bordered text-center align-middle">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Âge</th>
                    <th>Email</th>
                    <th>Ville</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php if (count($etuds) > 0): ?>
                <?php foreach ($etuds as $etud): ?>
                    <tr>
                        <td><?= htmlspecialchars($etud->getId()) ?></td>
                        <td><?= htmlspecialchars($etud->getNom()) ?></td>
                        <td><?= htmlspecialchars($etud->getPrenom()) ?></td>
                        <td><?= htmlspecialchars($etud->getAge()) ?></td>
                        <td><?= htmlspecialchars($etud->getEmail()) ?></td>
                        <td><?= htmlspecialchars($etud->getVille()) ?></td>
                        <td>
                            <span class="badge bg-<?= $etud->getStatut() ? 'primary' : 'success' ?>">
                                <?= $etud->getStatut() ? 'Étudiant' : 'Professeur' ?>
                            </span>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-update" href="etudiant-edit.php?id=<?= $etud->getId() ?>">✏️</a>
                            <a class="btn btn-sm btn-delete" href="etudiant-delete.php?id=<?= $etud->getId() ?>" onclick="return confirm('Supprimer cet étudiant ?');">🗑</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="8">Aucun étudiant trouvé.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
