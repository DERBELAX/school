<?php
function dbConnect(){
//connexion à la bd
$connectString="mysql:host=localhost;dbname=universite;charset=utf8";
try{
    $dbb=new PDO(
        $connectString,
        "root", "",
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    );
    return $dbb;
}catch(PDOException $ex){
    var_dump($ex->getMessage());
}
}
?>