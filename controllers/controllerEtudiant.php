<?php
require_once __DIR__ . '/../models/modelEtudiant.php';
function listeEtudiant()
{
    $error = '';
    //partie supression de l'etudiant a partir de l'id recuperer
    $classe = findAllClasse();
    if (isset($_REQUEST['id'])) {
        $id = intval($_REQUEST['id']);
        delEtudiantById($id);
        header("Location:" . WEBROOT . "index.php?page=liste_etudiant");
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
//fonction pour l'ajout d'etudiant
function ajoutEtudiant()
{
    $classe = findAllClasse();
    $etude = findAllEtudiant();
    $errors = [];
    $verif = true;
    $veriftel = true;
    if (isset($_REQUEST['ajouter'])) {
        $lib = trim($_REQUEST['nom']);
        $pre = trim($_REQUEST['pre']);
        $clas = trim($_REQUEST['cla']);
        $mail = trim($_REQUEST['mai']);
        $tel = trim($_REQUEST['tel']);
        $ad = trim($_REQUEST['adr']);
        $verif = verificationUnicite($mail, "email");
        $veriftel = verificationUnicite($tel, "telephone");
        if (empty($lib)) {
            $errors['nom'] = "Champ obligatoire";
        }
        if (empty($pre)) {
            $errors['pre'] = "Champ obligatoire";
        }
        if (empty($mail)) {
            $errors['mai'] = "Champ obligatoire";
        } elseif ($verif == false) {
            $errors['mai'] = "mail déja utiliser";
        }
        if (empty($tel)) {
            $errors['tel'] = "Champ obligatoire";
        } elseif ($veriftel == false) {
            $errors['tel'] = "Numéro de telephone déja attribuer";
        }
        if (empty($ad)) {
            $errors['adr'] = "Champ obligatoire";
        }
        if (empty($errors)) {
            $id = nouveauId($etude);
            $newEtude = [
                'id' => $id,
                'matricule' => 'ETU00' . $id,
                'nom' => $lib,
                'prenom' => $pre,
                'idClasse' => (int)$clas,
                'email' => $mail,
                'telephone' => $tel,
                'adresse' => $ad
            ];
            ajouter($newEtude, 'etudiant');
            header("location:" . WEBROOT . "?page=liste_etudiant");
            exit;
        }
    }
    require_once __DIR__ . '/../views/etudiant/ajout.php';
}
function modifEtudiant()
{
    $classe = findAllClasse();
    $etude = findAllEtudiant();
    $error1 = "";
    $error2 = "";
    $error3 = "";
    $error4 = "";
    $error5 = "";
    $error6 = "";
    $id = intval($_REQUEST['id']);
    $charge = detailById($id);
    $mailverif = true;
    $telverif = true;
    if (isset($_REQUEST['modSave'])) {
        $lib = trim($_REQUEST['nom']);
        $pre = trim($_REQUEST['pre']);
        $clas = trim($_REQUEST['class']);
        $mail = trim($_REQUEST['mail']);
        $mailverif = verificationUnicite($mail, 'email');
        $tel = trim($_REQUEST['tel']);
        $telverif = verificationUnicite($tel, 'telephone');
        $ad = trim($_REQUEST['ad']);
        $verif = true;
        $etude = findAllEtudiant();
        if (empty($lib)) {
            $error1 = "champ obligatoire";
            $verif = false;
        }
        if (empty($pre)) {
            $error2 = "champ obligatoire";
            $verif = false;
        }
        if (empty($mail)) {
            $error5 = "champ obligatoire";
            $verif = false;
        }
        if (empty($tel)) {
            $error6 = "champ obligatoire";
            $verif = false;
        }
        foreach ($etude as $e) {
            if ($mailverif == false && $e['email'] == $mail && $e['id'] != $id) {
                $error5 = "Mail déjà utilisé";
                $verif = false;
                break;
            }
            if ($telverif == false && $e['telephone'] == $tel && $e['id'] != $id) {
                $error6 = "Téléphone déjà utilisé";
                $verif = false;
                break;
            }
        }
        if (empty($ad)) {
            $error4 = "champ obligatoire";
            $verif = false;
        }
        if ($verif === true) {
            $modif = [
                'id' => $_REQUEST['id'],
                'matricule' => 'ETU00' . $_REQUEST['id'],
                'nom' => $_REQUEST['nom'],
                'prenom' => $_REQUEST['pre'],
                'idClasse' => (int)$_REQUEST['class'],
                'email' => $_REQUEST['mail'],
                'telephone' => $_REQUEST['tel'],
                'adresse' => $_REQUEST['ad']
            ];
            modifierById($modif);
            header("Location:" . WEBROOT . "?page=liste_etudiant");
            exit;
        }
    }
    require_once __DIR__ . '/../views/etudiant/modife.php';
}
