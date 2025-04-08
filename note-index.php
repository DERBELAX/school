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

<?php
require_once "note_crud.php";
$notes = getNotes();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Notes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #f8f9fa, #e9ecef);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .table-container {
            max-width: 95%;
            margin: 40px auto;
            background-color: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #343a40;
        }

        .btn-action {
            margin: 0 4px;
        }

        .top-buttons {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 20px auto 0;
            max-width: 95%;
        }

        .top-buttons .btn {
            min-width: 150px;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }
    </style>
</head>

<body>


    <div class="top-buttons">
        <a href="note-creat.php" class="btn btn-success">➕ Ajouter une note</a>
    </div>

    <div class="table-container">
        <h2>📄 Liste des Notes</h2>

        <table class="table table-hover text-center align-middle">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Étudiant</th>
                    <th>Cours</th>
                    <th>Note</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($notes)): ?>
                    <?php foreach ($notes as $note): ?>
                        <tr>
                            <td><?= htmlspecialchars($note->getId()) ?></td>
                            <td><?= htmlspecialchars($note->getEtudiantNom()) ?></td>
                            <td><?= htmlspecialchars($note->getCoursNom()) ?></td>
                            <td><?= htmlspecialchars($note->getNote()) ?></td>
                            <td>
                                <a class="btn btn-sm btn-danger btn-action"
                                   href="note-delete.php?id=<?= $note->getId() ?>"
                                   onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette note ?');">
                                   🗑️ Supprimer
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-muted">Aucune note trouvée.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
