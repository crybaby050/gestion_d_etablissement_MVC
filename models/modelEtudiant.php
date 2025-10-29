<?php
//test du model etudiants
//debut recuperation des données pour filtrer les etudiants par classe
function getClasseByLibelle($classes, $libelle)
{
    foreach ($classes as $c) {
        if ($c["libelle"] == $libelle) {
            return $c;
        }
    }
}
//fonction pour trouver les etudiants par classe
function getEtudiantByClasse($etudiants, $classe)
{
    $etus = [];
    foreach ($etudiants as $e) {
        if ($e["idClasse"] == $classe["id"]) {
            $etus[] = $e;
        }
    }
    return $etus;
}
function filteredByClasse($libelle, $etudiants, $classes)
{
    $classe = getClasseByLibelle($classes, $libelle);
    $etus = getEtudiantByClasse($etudiants, $classe);
    return $etus;
}
//fonction pour chercher les details des etudiants
function detailById($id): array
{
    $tab = findAllEtudiant();
    foreach ($tab as $v) {
        if ($v['id'] == $id) {
            return $v;
        }
    }
    return [];
}
//fonction pour la suppression des etudiants
function delEtudiantById($id)
{
    $datas = jsonToArray();
    foreach ($datas['etudiant'] as $data => $k) {
        if ($k['id'] == $id) {
            unset($datas['etudiant'][$data]);
            arrayToJson($datas);
            return;
        }
    }
}

//fonction pour trouver la classe a partir de l'idClasse present dans l'etudiant
//fonction qui verifie l'unicité d'un element
function verificationUnicite(mixed $data, string $a): bool
{
    $etudes = findAllEtudiant();
    foreach ($etudes as $etude) {
        if ($etude[$a] == $data) {
            return false;
        }
    }
    return true;
}
//fonction pour modifier un etudiant
function modifierById($modif): void
{
    $datas = jsonToArray();
    foreach ($datas['etudiant'] as $index => $mod) {
        if ((int)$mod['id'] === (int)$modif['id']) {
            $datas['etudiant'][$index] = $modif;
            arrayToJson($datas);
            return; // sortie dès que modif faite
        }
    }
}
function getIdElementByClasse($elem,$id){
    foreach ($elem as $c) {
        if($c["id"] == $id){
            return $c;
        }
    }
}
//fonction qui affiche le niveau et la filiere pour la page detail etudiant de la classe eb passant par leur id
function getlibelleFilliereByClasse($elem, $id)
{
    $classes = getIdElementByClasse($elem, $id);
    $filieres = findAllFilliere();
    foreach ($filieres as $filiere) {
        if ($filiere['id'] == $classes['idFiliere']) {
            return $filiere['libelle'];
        }
    }
}
function getlibelleNiveauByClasse($elem, $id)
{
    $classes = getIdElementByClasse($elem, $id);
    $niveaux = findAllNiveau();
    foreach ($niveaux as $niveau) {
        if ($niveau['id'] == $classes['idFiliere']) {
            return $niveau['libelle'];
        }
    }
}
