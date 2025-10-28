<?php
//test du model etudiants
//debut recuperation des données pour filtrer les etudiants par classe
function getClasseByLibelle($classes,$libelle){
    foreach ($classes as $c) {
        if($c["libelle"] == $libelle){
            return $c;
        }
    }
}
function getEtudiantByClasse($etudiants, $classe){
    $etus = [];
    foreach ($etudiants as $e) {
        if($e["idClasse"] == $classe["id"]){
            $etus[] = $e;
        }
    }
    return $etus;
}
function filteredByClasse($libelle, $etudiants,$classes){
    $classe = getClasseByLibelle($classes,$libelle);
    $etus = getEtudiantByClasse($etudiants,$classe);
    return $etus;
}
//fonction pour chercher les details des etudiants
function detailById($id): array {
    $tab = findAllEtudiant();
    foreach ($tab as $v) {
        if ($v['id'] == $id) {
            return $v;
        }
    }
    return [];
}
//fonction pour la suppression des etudiants
function delEtudiantById($id){
    $datas = jsonToArray();
    foreach($datas['etudiant'] as $data => $k){
        if($k['id'] == $id){
            unset($datas['etudiant'][$data]);
            arrayToJson($datas);
            return;
        }
    }
}

//fonction pour trouver la classe a partir de l'idClasse present dans l'etudiant
function getLibelleByIdElement($classe,$id){
    foreach ($classe as $c) {
        if($c["id"] == $id){
            return $c["libelle"];
        }
    }
}
//fonction qui verifie l'unicité d'un element
function verificationUnicite(mixed $data,string $a):bool{
    $etudes=findAllEtudiant();
    foreach($etudes as $etude){
        if($etude[$a]==$data){
            return false;
        }
    }
    return true;
}