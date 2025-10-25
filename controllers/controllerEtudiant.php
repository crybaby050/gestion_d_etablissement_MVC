<?php
require_once 'models/modelEtudiant.php';
function liste_etudiant(){
    $classe = findAllClasse();
    $error = '';
    if (isset($_REQUEST['id'])) {
        $id = intval($_REQUEST['id']);
        delEtudiantById($id);
    }
    $etude = findAllEtudiant();
    if (isset($_REQUEST['nivfil'])) {
        $val = trim($_REQUEST['niv']);
        $etude = filteredByClasse($val, $etude, $classe);
        require_once('liste.php');
    }
}
