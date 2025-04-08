<?php
require_once "etud_crud.php";

$msg = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $email = $_POST['email'];
    $existingStudent = getStudentByEmail($email); 

    if ($existingStudent) {
        $msg = "L'email est déjà utilisé. Veuillez en choisir un autre.";
    } else {
        $etud = new Etudiant();
        $password = password_hash($_POST['passwd'], PASSWORD_DEFAULT);
        $etud->setNom($_POST['nom'])
             ->setPrenom($_POST['prenom'])
             ->setTitre($_POST['titre'])
             ->setAge($_POST['age'])
             ->setPasswd($password)
             ->setEmail($_POST['email'])
             ->setStatut($_POST['statut'])
             ->setVille($_POST['ville']);
             if (addStudent($etud)) {
                // Redirection après ajout réussi
                header("Location: etudiants-index.php");
                exit;
            } else {
                $msg = "Erreur lors de l'ajout de l'étudiant.";
            }
    }
}

// Fonction pour vérifier si l'email existe déjà
function getStudentByEmail($email) {
    $ctxDb = dbConnect();
    $sqlReq = "SELECT * FROM etudiants WHERE email = :email";
    $req = $ctxDb->prepare($sqlReq);
    $req->bindValue(':email', $email, PDO::PARAM_STR);
    $req->execute();
    return $req->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer un étudiant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        .msg { color: red; text-align: center; }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center my-4">Créer un étudiant</h2>

    <?php if ($msg): ?>
        <div class="alert alert-danger"><?= $msg ?></div>
    <?php endif; ?>

    <div class="form-container">
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Titre</label>
                <select name="titre" class="form-select" required>
                    <option value="Mr">Mr</option>
                    <option value="Mme">Mme</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Nom</label>
                <input type="text" name="nom" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Prénom</label>
                <input type="text" name="prenom" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Âge</label>
                <input type="number" name="age" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Mot de passe</label>
                <input type="password" name="passwd" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Statut</label>
                <select name="statut" class="form-select" required>
                    <option value="0">Professeur</option>
                    <option value="1">Étudiant</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Ville</label>
                <input type="text" name="ville" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success w-100">Créer</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
