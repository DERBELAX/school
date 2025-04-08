<?php
require_once "note_crud.php";

$id = $_GET['id'] ?? null;

if (!$id) {
    die("ID note non fourni.");
}

if (deletnote($id)) {
    header("Location: note-index.php");
    exit;
} else {
    echo "Erreur lors de la suppression de la note.";
}
?>