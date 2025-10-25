<?php
//test du model etudiants
require_once 'models/modelData.php';
function findAllEtudiant():array{
    $datas=jsonToArray();
    return $datas['etudiant'];
}
function detailById($id): array {
    $tab = findAllEtudiant();
    foreach ($tab as $v) {
        if ($v['id'] == $id) {
            return $v;
        }
    }
    return [];
}
function modifierById($modif): void {
    $datas = jsonToArray();
    foreach ($datas['etudiant'] as $index => $mod) {
        if ((int)$mod['id'] === (int)$modif['id']) {
            $datas['etudiant'][$index] = $modif;
            arrayToJson($datas);
            return; // sortie dès que modif faite
        }
    }
}