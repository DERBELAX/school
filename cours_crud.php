<?php

require_once "dbaccess.php";
require_once "cours.php";

function getAllCours() {
   
    $cours = [];
    try {
        $ctxDb = dbConnect();
        $sqlReq = "SELECT * FROM cours";
        $req = $ctxDb->query($sqlReq);
        $req->setFetchMode(PDO::FETCH_CLASS, 'Cours');
        $cours = $req->fetchAll();
    } catch (PDOException $ex) {
        var_dump($ex->getMessage());
    }
    return $cours;
}

function getCoursById($id) {
    $cours = null;
    try {
        $ctxDb = dbConnect();
        $sqlReq = "SELECT * FROM cours WHERE id = :id"; 
        $req = $ctxDb->prepare($sqlReq);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS, 'Cours');
        $cours = $req->fetch();
    } catch (PDOException $ex) {
        var_dump($ex->getMessage());
    }
    return $cours;
}
?>
