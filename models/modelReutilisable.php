<?php
//creation du model classe
require_once 'models/modelData.php';
//recuperation de données des etudiants
function findAllEtudiant():array{
    $datas=jsonToArray();
    return $datas['etudiant'];
}
//recuperation de donnée des classes
function findAllClasse():array{
    $datas=jsonToArray();
    return $datas['classe'];
}
//recuperation de données des filiere
function findAllFilliere():array{
    $datas=jsonToArray();
    return $datas['filiere'];
}
//recuperation de données des niveau
function findAllNiveau():array{
    $datas=jsonToArray();
    return $datas['niveau'];
}
// fonction pour determiner si le tableau est vide
function presence($tab):void{
    if(count($tab)==0){
        echo "<h3> Auncun element enregistrer</h3>";
    }
}