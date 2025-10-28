<?php
require_once __DIR__ . '/../models/modelNiveau.php';
function listeNiveau(){
    $errors = [];
    $verif = true;
    if (isset($_REQUEST['id'])) {
        $id = intval($_REQUEST['id']);
        delNiveauWithClasseWithEtudiant($id);
    }
    $niveau = findAllNiveau();
    if (isset($_REQUEST['ajniv'])) {
        $lib = trim($_REQUEST['nom']);
        // $lib=lcfirst($lib);
        $verif = verificationUniciteOnNiveau($lib, 'libelle');
        // $desc = trim($_REQUEST['desc']);
        if (empty($lib)) {
            $errors['lib'] = "Champ obligatoire";
        } elseif ($verif == false) {
            $errors['lib'] = 'Ce nom existe déja';
        }
        // if (empty($desc)) {
        //     $desc = 'Aucun description pour ce filiere';
        // }
        if (empty($errors)) {
            $newNiveau = [
                "id" => nouveauId($niveau),
                "libelle" => $lib,
                // "description" => $desc
            ];
            ajouter($newNiveau, 'niveau');
            header("location:" . WEBROOT . "?page=liste_niveau");
            exit;
        }
    }
    require_once __DIR__ . '/../views/niveau/niveau.php';
}
