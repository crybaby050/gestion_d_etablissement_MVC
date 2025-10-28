<?php
require_once '\..\models\modelFiliere.php';
function listeFiliere(){
    $errors = [];
    $verif = true;
    if (isset($_REQUEST['id'])) {
        $id = intval($_REQUEST['id']);
        delFiliereWithClasseWithEtudiant($id);
    }
    $filiere = findAllFilliere();
    if (isset($_REQUEST['ajfil'])) {
        $lib = trim($_REQUEST['nom']);
        $verif = verificationUniciteOnFiliere($lib, 'libelle');
        if (empty($lib)) {
            $errors['lib'] = "Champ obligatoire";
        } elseif ($verif == false) {
            $errors['lib'] = 'Ce nom existe déja';
        }
        if (empty($errors)) {
            $newFiliere = [
                "id" => nouveauId($filiere),
                "libelle" => $lib,
            ];
            ajouter($newFiliere, 'filiere');
            header("location:" . WEBROOT . "?page=liste_filiere");
            exit;
        }
    }
    require_once __DIR__ . '/../views/filiere/filiere.php';
}
