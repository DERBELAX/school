<?php
require_once "dbaccess.php";
require_once "etudiant.php"; // pour mapper les données sous forme d'objet

function getAllstudents() {
    $students = [];
    try {
        $ctxDb = dbConnect();
        $sqlReq = "SELECT DISTINCT * FROM etudiants";
        $req = $ctxDb->query($sqlReq);

        // Retourner les enregistrements sous forme d'objet Etudiant
        $req->setFetchMode(PDO::FETCH_CLASS, 'Etudiant');
        $students = $req->fetchAll();

    } catch (PDOException $ex) {
        var_dump($ex->getMessage());
    }

    return $students;
}

function getStudentById($id) {
    $student = null;
    try {
        $ctxDb = dbConnect();
        $sqlReq = "SELECT * FROM etudiants WHERE id = :id";
        $req = $ctxDb->prepare($sqlReq);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS, 'Etudiant');
        $student = $req->fetch();

    } catch (PDOException $ex) {
        var_dump($ex->getMessage());
    }

    return $student;
}

function delStudent(int $studId): bool {
    try {
        $ctxDb = dbConnect();
        $sqlReq = "DELETE FROM etudiants WHERE id = :id";
        $req = $ctxDb->prepare($sqlReq);
        $req->bindValue(':id', $studId, PDO::PARAM_INT);
        return $req->execute();

    } catch (PDOException $ex) {
        var_dump($ex->getMessage());
        return false;
    }
}

function addStudent(Etudiant $etud): bool {
    try {
        $ctxDb = dbConnect();
        $sqlReq = "INSERT INTO etudiants 
            (nom, prenom, titre, age, passwd, email, statut, ville) 
            VALUES 
            (:nom, :prenom, :titre, :age, :passwd, :email, :statut, :ville)";
        
        $req = $ctxDb->prepare($sqlReq);
        $req->bindValue(':nom', $etud->getNom(), PDO::PARAM_STR);
        $req->bindValue(':prenom', $etud->getPrenom(), PDO::PARAM_STR);
        $req->bindValue(':titre', $etud->getTitre(), PDO::PARAM_STR);
        $req->bindValue(':age', $etud->getAge(), PDO::PARAM_INT);
        $req->bindValue(':passwd', $etud->getPasswd(), PDO::PARAM_STR);
        $req->bindValue(':email', $etud->getEmail(), PDO::PARAM_STR);
        $req->bindValue(':statut', $etud->getStatut(), PDO::PARAM_INT);
        $req->bindValue(':ville', $etud->getVille(), PDO::PARAM_STR);

        return $req->execute();
        
    } catch (PDOException $ex) {
        var_dump($ex->getMessage());
        return false;
    }
}

function updateStudent(Etudiant $etud): bool {
    try {
        $ctxDb = dbConnect();
        $sqlReq = "UPDATE etudiants SET 
            nom = :nom, 
            prenom = :prenom, 
            titre = :titre, 
            age = :age, 
            passwd = :passwd, 
            email = :email, 
            statut = :statut, 
            ville = :ville
            WHERE id = :id";

        $req = $ctxDb->prepare($sqlReq);
        $req->bindValue(':id', $etud->getId(), PDO::PARAM_INT);
        $req->bindValue(':nom', $etud->getNom(), PDO::PARAM_STR);
        $req->bindValue(':prenom', $etud->getPrenom(), PDO::PARAM_STR);
        $req->bindValue(':titre', $etud->getTitre(), PDO::PARAM_STR);
        $req->bindValue(':age', $etud->getAge(), PDO::PARAM_INT);
        $req->bindValue(':passwd', $etud->getPasswd(), PDO::PARAM_STR);
        $req->bindValue(':email', $etud->getEmail(), PDO::PARAM_STR);
        $req->bindValue(':statut', $etud->getStatut(), PDO::PARAM_INT);
        $req->bindValue(':ville', $etud->getVille(), PDO::PARAM_STR);

        return $req->execute();

    } catch (PDOException $ex) {
        var_dump($ex->getMessage());
        return false;
    }
}

function authStudent(string $email, string $passwd ){
    $student= null;
    $ctxDb = dbConnect();
    try{
        $sqlReq = "SELECT * FROM etudiants WHERE email = :email";
        $req = $ctxDb->prepare($sqlReq);
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS, 'Etudiant');
        $student = $req->fetch();
    } catch (PDOException $ex) {
        var_dump($ex->getMessage());
    }
    if($student && password_verify($passwd, $student->getPasswd())){
        return $student;

    }else{
        return null;
    }
    

}



?>
