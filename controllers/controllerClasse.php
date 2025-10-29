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
        header("Location:" . WEBROOT . "index.php?page=liste_classe");
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
function ajoutClasse()
{
    $niveau = findAllNiveau();
    $filiere = findAllFilliere();
    $classe = findAllClasse();
    $errors = [];
    $verif = true;
    $verifcode = true;
    if (isset($_REQUEST['ajClasses'])) {
        $lib = trim($_REQUEST['nom']);
        $verif = verificationUniciteOnClasse($lib, 'libelle');
        $code = trim($_REQUEST['cod']);
        $verifcode = verificationUniciteOnClasse($code, 'code');
        if (empty($lib)) {
            $errors['nom'] = 'Champ obligatoire';
        } elseif ($verif == false) {
            $errors['nom'] = 'Cette classe existe déjà';
        }
        if (empty($code)) {
            $errors['code'] = 'Champ obligatoire';
        } elseif ($verifcode == false) {
            $errors['code'] = 'Ce code existe déja';
        }
        if (empty($errors)) {
            $newClasse = [
                "id" => nouveauId($classe),
                "libelle" => $lib,
                "code" => $code,
                "idFiliere" => $_REQUEST['fil'],
                "idNiveau" => $_REQUEST['niv']
            ];
            ajouter($newClasse, 'classe');
            header("location:" . WEBROOT . "?page=liste_classe");
            exit;
        }
    }
    require_once __DIR__ . '/../views/classe/ajout.php';
}
function modifeClasse()
{
    $niveau = findAllNiveau();
    $filiere = findAllFilliere();
    $classe = findAllClasse();
    $id = intval($_REQUEST['id']);
    $charge = detailClasseById($id);
    $errors = [];
    $verif = true;
    $verifcode = true;
    if (isset($_REQUEST['modClasse'])) {
        $lib = trim($_REQUEST['nom']);
        $verif = verificationUniciteOnClasse($lib, 'libelle');
        $code = trim($_REQUEST['cod']);
        $verifcode = verificationUniciteOnClasse($code, 'code');
        $fili = trim($_REQUEST['fil']);
        $nive = trim($_REQUEST['niv']);
        if (empty($lib)) {
            $errors['nom'] = 'Champ obligatoire';
        }
        if (empty($code)) {
            $errors['code'] = 'Champ obligatoire';
        }
        foreach ($classe as $clas) {
            if ($verifcode == false && $clas['code'] == $code && $clas['id'] != $id) {
                $errors['code'] = 'Ce code existe déja';
                break;
            }
            if ($verif == false && $clas['libelle'] == $lib && $clas['id'] != $id) {
                $errors['nom'] = 'Cette classe existe déjà';
                break;
            }
        }
        if (empty($errors)) {
            $modifClasse = [
                "id" => $_REQUEST['id'],
                "libelle" => $lib,
                "code" => $code,
                "idFiliere" => $fili,
                "idNiveau" => $nive
            ];
            modifierClasseById($modifClasse);
            header("location:" . WEBROOT . "?page=liste_classe");
            exit;
        }
    }
    require_once __DIR__ . '/../views/classe/modif.php';
}
function detailClasse()
{
    $id = intval($_REQUEST['id']);
    $etudes = classeWithEtudiant($id);
    $classe = findAllClasse();
    $detail = detailClasseById($id);
    $filiere = findAllFilliere();
    $niveau = findAllNiveau();
    require_once __DIR__ . '/../views/classe/detail.php';
}
