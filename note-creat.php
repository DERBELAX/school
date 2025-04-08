<?php
require_once "dbaccess.php";
require_once "note_crud.php";
require_once "cours_crud.php";
require_once "etud_crud.php";

include 'navbar.php';

$msg = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $note = new Note();
    $note->setEtudiantId($_POST['etudiant_id'])
         ->setCoursId($_POST['cours_id'])
         ->setNote($_POST['note']);

    if (addNote($note)) {
        header("Location: note-index.php");
        exit;
    } else {
        $msg = "Erreur lors de l'ajout de la note.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer une note</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #f8f9fa, #e9ecef);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .note-form {
            max-width: 500px;
            margin: 40px auto;
            background-color: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-top: 30px;
            color: #343a40;
        }

        label {
            margin-top: 15px;
            font-weight: 500;
        }

        .btn-submit {
            margin-top: 25px;
            width: 100%;
        }

        .msg {
            color: red;
            text-align: center;
            margin-top: 15px;
        }
    </style>
</head>
<body>

    <h2>Créer une note</h2>

    <?php if ($msg): ?>
        <p class="msg"><?= htmlspecialchars($msg) ?></p>
    <?php endif; ?>

    <form class="note-form" action="#" method="post">
        <div class="mb-3">
            <label for="etudiant_id" class="form-label">Étudiant</label>
            <select name="etudiant_id" id="etudiant_id" class="form-select" required>
                <?php foreach (getAllstudents() as $etudiant): ?>
                    <option value="<?= $etudiant->getId() ?>">
                        <?= htmlspecialchars($etudiant->getFullName()) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="cours_id" class="form-label">Cours</label>
            <select name="cours_id" id="cours_id" class="form-select" required>
                <?php foreach (getAllCours() as $coursItem): ?>
                    <option value="<?= $coursItem->getId() ?>">
                        <?= htmlspecialchars($coursItem->getNom()) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="note" class="form-label">Note</label>
            <input type="number" name="note" id="note" class="form-control" step="0.01" required>
        </div>

        <button type="submit" class="btn btn-success btn-submit">Créer la note</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
