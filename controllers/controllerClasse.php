<?php
require_once __DIR__ . '/../models/modelClasse.php';
function listeClasse()
{
    $niveau = findAllNiveau();
    $filiere = findAllFilliere();
    // $classes = findAllClasse();
    if (isset($_REQUEST['id'])) {
        $id = intval($_REQUEST['id']);
        delClasseWithEtudiant($id);
        header("Location:".WEBROOT."index.php?page=liste_classe");
    }
    $classes = findAllClasse();
    if (isset($_REQUEST['fil'])) {
        $lib = trim($_REQUEST['fili']);
        $classes = filterByFiliere($filiere, $lib, $classes);
    } elseif (isset($_REQUEST['niv'])) {
        $libe = trim($_REQUEST['nive']);
        $classes = filterByNiveau($niveau, $libe, $classes);
    }
    require_once __DIR__ . '/../views/classe/classe.php';
}
