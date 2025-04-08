<?php
require_once "etud_crud.php";

$msg = "";
$id = $_GET['id'] ?? null;

if (!$id) {
    die("ID étudiant non fourni.");
}

$etud = getStudentById($id);

if (!$etud) {
    die("Étudiant introuvable.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password= password_hash($_POST['passwd'],  PASSWORD_DEFAULT) ;//cacher le mots de passe hash pour les modifications 
    $etud->setNom($_POST['nom'])
         ->setPrenom($_POST['prenom'])
         ->setTitre($_POST['titre'])
         ->setAge($_POST['age'])
         ->setPasswd($password)
         ->setEmail($_POST['email'])
         ->setStatut($_POST['statut'])
         ->setVille($_POST['ville']);

    if (updateStudent($etud)) {
        header("Location: etudiants-index.php");
        exit;
    } else {
        $msg = "Erreur lors de la mise à jour de l'étudiant.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un étudiant</title>
    <style>
        form { width: 400px; margin: 30px auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px; }
        label { display: block; margin-top: 10px; }
        input, select { width: 100%; padding: 6px; margin-top: 5px; }
        button { margin-top: 15px; padding: 10px 15px; background-color: #007bff; color: white; border: none; border-radius: 4px; }
        .msg { color: red; text-align: center; }
    </style>
</head>
<body>

<h2 style="text-align:center;">Modifier un étudiant</h2>

<?php if ($msg): ?>
    <p class="msg"><?= $msg ?></p>
<?php endif; ?>

<form method="post">
    <label>Titre</label>
    <select name="titre">
        <option value="Mr" <?= $etud->getTitre() === 'Mr' ? 'selected' : '' ?>>Mr</option>
        <option value="Mme" <?= $etud->getTitre() === 'Mme' ? 'selected' : '' ?>>Mme</option>
    </select>

    <label>Nom</label>
    <input type="text" name="nom" value="<?= htmlspecialchars($etud->getNom()) ?>" required>

    <label>Prénom</label>
    <input type="text" name="prenom" value="<?= htmlspecialchars($etud->getPrenom()) ?>" required>

    <label>Age</label>
    <input type="number" name="age" value="<?= htmlspecialchars($etud->getAge()) ?>" required>

    <label>Mot de passe</label>
    <input type="password" name="passwd" value="<?= htmlspecialchars($etud->getPasswd()) ?>" required>

    <label>Email</label>
    <input type="email" name="email" value="<?= htmlspecialchars($etud->getEmail()) ?>" required>

    <label>Statut</label>
    <select name="statut">
        <option value="1" <?= $etud->getStatut() == 1 ? 'selected' : '' ?>>Actif </option>
        <option value="0" <?= $etud->getStatut() == 0 ? 'selected' : '' ?>>Inactif</option>
    </select>

    <label>Ville</label>
    <input type="text" name="ville" value="<?= htmlspecialchars($etud->getVille()) ?>" required>

    <button type="submit">Mettre à jour</button>
</form>

</body>
</html>
