<?php
require_once "etud_crud.php";
require_once "note_crud.php";
require_once "cours_crud.php";

// // Affichage de tous les étudiants
// echo "<h3>Liste des étudiants :</h3>";
// $etuds = getAllstudents();
// echo "<pre>";
// var_dump($etuds);
// echo "</pre>";

// // Récupération d'un étudiant par ID
// echo "<h3>Étudiant avec ID 3 :</h3>";
// $etud = getStudentById(3);
// echo "<pre>";
// var_dump($etud);
// echo "</pre>";

// // Suppression d'un étudiant (ex: id=14)
// echo "<h3>Suppression étudiant ID 14 :</h3>";
// $deleteResult = delStudent(14);
// var_dump($deleteResult);

// // ======== AJOUT D'UN NOUVEL ÉTUDIANT ========
// echo "<h3>Ajout d'un étudiant :</h3>";
// $newEtud = new Etudiant();
// $newEtud->setNom("Dubois")
//         ->setPrenom("Alice")
//         ->setTitre("Mme")
//         ->setAge(24)
//         ->setPasswd("alice123")
//         ->setEmail("alice.dubois@example.com")
//         ->setStatut(1)
//         ->setVille("Marseille");
        
// print_r($newEtud);

// // ======== MISE À JOUR DE L'ÉTUDIANT ID 2 ========
// echo "<h3>Mise à jour de l'étudiant ID 2 :</h3>";

// $addSuccess = addStudent($newEtud);
// var_dump($addSuccess);

// echo "<h3>Note</h3>";
// $note =getNotes();
// var_dump($note);
echo "<h3>Note</h3>";

$getallcours=getAllCours();
var_dump($getallcours);
?>
