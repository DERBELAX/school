<?php
require_once "dbaccess.php";
require_once "note.php";

function getNotes() {
    $notes=[];
    $sqlReq = "SELECT notes.id, notes.note,
    etudiants.nom as etudiant_nom, 
    cours.nom as cours_nom FROM notes";

    $sqlReq.= " INNER JOIN etudiants ON notes.etudiant_id = etudiants.id";
    $sqlReq.= " INNER JOIN cours ON notes.cours_id = cours.id";
    $sqlReq.= " ORDER BY etudiant_nom";
    
    
    try {
        $ctxDb = dbConnect(); 
        $req = $ctxDb->query($sqlReq);
        // Retourner les enregistrements sous forme d'objet Etudiant
        $req->setFetchMode(PDO::FETCH_CLASS, 'Note');
        $notes = $req->fetchAll();
     
    } catch (PDOException $ex) {
        echo "Erreur PDO : " . $ex->getMessage();
    }
    
    return $notes;
}


function deletnote(int $noteId) : bool{
    try {
        $ctxDb = dbConnect();
        $sqlReq = "DELETE FROM notes WHERE id = :id";
        $req = $ctxDb->prepare($sqlReq);
        $req->bindValue(':id', $noteId, PDO::PARAM_INT);
        return $req->execute();

    } catch (PDOException $ex) {
        var_dump($ex->getMessage());
        return false;
    }

}

function addNote(Note $note): bool {
    try {
        $ctxDb = dbConnect(); 
        $req = $ctxDb->prepare("
        INSERT INTO notes (etudiant_id, cours_id, note)
        VALUES (:etudiant_id, :cours_id, :note)
    ");
    
    $req->bindValue(':etudiant_id', $note->getEtudiantId(), PDO::PARAM_INT);
    $req->bindValue(':cours_id', $note->getCoursId(), PDO::PARAM_INT);
    $req->bindValue(':note', $note->getNote(), PDO::PARAM_STR);
    
        
        return $req->execute();
        
    } catch (PDOException $ex) {
        var_dump($ex->getMessage());
        return false;
    }
}

?>
