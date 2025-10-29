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
//fonction qui me permet de creer un nouveau id tout en evitant les doublons
function nouveauId(array $tableau): int {
    $id=[];
    if (empty($tableau)) {
        return 1;
    }else{
        foreach($tableau as $tab){
            $id[]=$tab['id'];
        }
    }
    return max($id) + 1;
}
//fonction pour ajouter un nouvel element dans le fichier json
function ajouter($newEtude,string $a):void{
    $datas = jsonToArray();
    array_push($datas[$a],$newEtude);
    arrayToJson($datas);
}
//fonction pour sortir le libelle de la classe par l'idclasse (on a une repetition de cette focntion au niveau de liste etudiant et de detailclasse)
function getLibelleByIdElement($classe, $id)
{
    foreach ($classe as $c) {
        if ($c["id"] == $id) {
            return $c["libelle"];
        }
    }
}
//fonction qui permet de recherhcer les etudiants affilier a une classe
function classeWithEtudiant($id){
    $etudes=findAllEtudiant();
    $tab=[];
    foreach($etudes as $etude){
        if($etude['idClasse']==$id){
            $tab[]=$etude;
        }
    }
    return $tab;
}