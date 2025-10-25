<?php
require_once __DIR__ . '/../models/modelEtudiant.php';
function listeEtudiant(){
    $error = '';
    //partie supression de l'etudiant a partir de l'id recuperer
    $classe = findAllClasse();
    if (isset($_REQUEST['id'])) {
        $id = intval($_REQUEST['id']);
        delEtudiantById($id);
        header("Location:".WEBROOT."index.php?page=liste_etudiant");
    }
    //partie filtrage de l'etudiant
    $etude = findAllEtudiant();
    if (isset($_REQUEST['nivfil'])) {
        $val = trim($_REQUEST['niv']);
        $etude = filteredByClasse($val, $etude, $classe);
        // require_once('liste.php');
    }
require_once __DIR__ . '/../views/etudiant/liste.php';
}
