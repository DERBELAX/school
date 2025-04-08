<?php
require_once "etud_crud.php";

$id = $_GET['id'] ?? null;

if (!$id) {
    die("ID étudiant non fourni.");
}

if (delStudent($id)) {
    header("Location: etudiants-index.php");
    exit;
} else {
    echo "Erreur lors de la suppression de l'étudiant.";
}
?>
