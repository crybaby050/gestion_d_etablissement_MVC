<?php
ob_start();
require_once('fonction.php');
define("WEBROOT", "http://localhost:8000/");
if (isset($_REQUEST['page'])) {
    if (!isset($_SESSION["userConnect"])) {
        header("location:" . WEBROOT);
        exit;
    }
    $nameUser = $_SESSION['userConnect'];
    $page = $_REQUEST['page'];
    require_once('tete.php');
    require_once('slidebarre.php');
    switch ($page) {
        case 'dashboard':
            $etude = findAllEtudiant();
            $classe = findAllClasse();
            $filiere = findAllFilliere();
            $niveau = findAllNiveau();
            $nbEtudiants = compteur($etude);
            $nbClasse = compteur($classe);
            $nbFilliere = compteur($filiere);
            $nbNiveau = compteur($niveau);
            require_once('dashboard.php');
        break;
        case 'liste':
            // $test = findAllEtudiant();
            $niveau = findAllNiveau();
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
            // $classe=findAllClasse();
            require_once('liste.php');
        break;
        case 'logout':
            session_unset();
            session_destroy();
            header("location:" . WEBROOT);
            exit;
        break;
        case 'detail':
            $classe = findAllClasse();
            $detail = [];
            if (isset($_REQUEST['id'])) {
                $id = intval($_REQUEST['id']);
                $detail = detailById($id);
                // if ($page == 'del') {
                    // if (isset($_REQUEST['id'])) {
                    //     $id = intval($_REQUEST['id']);
                    //     delEtudiantById($id);
                    //     // require_once('liste.php');
                    // }
                // }
            }
            require_once('detail.php');
        break;
        case 'ajout':
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
                    header("location:" . WEBROOT . "?page=liste");
                    exit;
                }
            }
            require_once('ajoutEtudiant.php');
        break;
        case 'modif':
            $classe = findAllClasse();
            $etude = findAllEtudiant();
            // var_dump($etude);
            // die;
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
                    // dd($modif);
                    modifierById($modif);
                    header("Location:" . WEBROOT . "?page=liste");
                    exit;
                }
            }
            // if(isset($_REQUEST['id'])){
            //     $id = intval($_REQUEST['id']);
            //     $detail=detailById($id);
            // }
            require_once('modif.php');
        break;
        case 'classe':
            $niveau = findAllNiveau();
            $filiere = findAllFilliere();
            $classes = findAllClasse();
            if(isset($_REQUEST['id'])){
                $id=intval($_REQUEST['id']);
                delClasseWithEtudiant($id);
            }
            $classes = findAllClasse();
            if (isset($_REQUEST['fil'])) {
                $lib = trim($_REQUEST['fili']);
                $classes = filterByFiliere($filiere, $lib, $classes);
            } elseif (isset($_REQUEST['niv'])) {
                $libe = trim($_REQUEST['nive']);
                $classes = filterByNiveau($niveau, $libe, $classes);
            }
            require_once('classe.php');
        break;
        case 'ajClasse':
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
                    header("location:" . WEBROOT . "?page=classe");
                    exit;
                }
            }
            require_once('ajoutClasse.php');
        break;
        case 'filiere':
            $errors = [];
            $verif = true;
            if(isset($_REQUEST['id'])){
                $id=intval($_REQUEST['id']);
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
                        // "description" => $desc
                    ];
                    ajouter($newFiliere, 'filiere');
                    header("location:" . WEBROOT . "?page=filiere");
                    exit;
                }
            }
            require_once('filiere.php');
        break;
        case 'niveau':
            $errors = [];
            $verif = true;
            if(isset($_REQUEST['id'])){
                $id=intval($_REQUEST['id']);
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
                    header("location:" . WEBROOT . "?page=niveau");
                    exit;
                }
            }
            require_once('niveau.php');
        break;
        case 'modifClasse':
            $niveau = findAllNiveau();
            $filiere = findAllFilliere();
            $classe = findAllClasse();
            $id=intval($_REQUEST['id']);
            $charge = detailClasseById($id);
            $errors = [];
            $verif = true;
            $verifcode = true;
            if (isset($_REQUEST['modClasse'])) {
                $lib = trim($_REQUEST['nom']);
                $verif = verificationUniciteOnClasse($lib,'libelle');
                $code = trim($_REQUEST['cod']);
                $verifcode = verificationUniciteOnClasse($code,'code');
                $fili=trim($_REQUEST['fil']);
                $nive=trim($_REQUEST['niv']);
                if (empty($lib)) {
                    $errors['nom'] = 'Champ obligatoire';
                }
                if (empty($code)) {
                    $errors['code'] = 'Champ obligatoire';
                }
                foreach($classe as $clas){
                    if ($verifcode == false && $clas['code']==$code && $clas['id']!= $id) {
                    $errors['code'] = 'Ce code existe déja';
                    break;
                    }
                    if ($verif == false && $clas['libelle']==$lib && $clas['id']!=$id) {
                    $errors['nom'] = 'Cette classe existe déjà';
                    break;
                }
                }
                if (empty($errors)) {
                    $modifClasse = [
                        "id"=> $_REQUEST['id'],
                        "libelle" => $lib,
                        "code" => $code,
                        "idFiliere" => $fili,
                        "idNiveau" => $nive
                    ];
                    modifierClasseById($modifClasse);
                    header("location:" . WEBROOT . "?page=classe");
                    exit;
                }
            }
            require_once('modifClasse.php');
        break;
        case 'classefiliere':
            $id=intval($_REQUEST['id']);
            $filiere=findAllFilliere();
            $niveau=findAllNiveau();
            $classes=classeAndFiliere($id);
            require_once('classefiliere.php');
        break;
        case 'classeniveau':
            $id=intval($_REQUEST['id']);
            $filiere=findAllFilliere();
            $niveau=findAllNiveau();
            $classes=classeAndNiveau($id);
            require_once('classeniveau.php');
        break;
        case 'infoClasse':
            $id=intval($_REQUEST['id']);
            $etudes=classeWithEtudiant($id);
            $classe=findAllClasse();
            $detail=detailClasseById($id);
            $filiere=findAllFilliere();
            $niveau=findAllNiveau();
            require_once('infoClasse.php');
        break;
        default:
        break;
    }
} else {
    if (isset($_SESSION["userConnect"])) {
        header("location:" . WEBROOT . "?page=dashboard");
        exit;
    }
    $errorLogin = "";
    $errorPwd = "";
    $errorConnect = "";
    if (isset($_REQUEST["connect"])) {
        $login = trim($_REQUEST["mail"]);
        $pwd = trim($_REQUEST["mdp"]);
        $verification = true;
        if (empty($login)) {
            $errorLogin = "Login obligatoire";
            $verification = false;
        }
        if (empty($pwd)) {
            $errorPwd = "Mot de passe obligatoire";
            $verification = false;
        }
        if ($verification) {
            $user = findUserConnect($login, $pwd);
            if (!empty($user)) {
                $_SESSION["userConnect"] = $user;
                header('location:' . WEBROOT . '?page=dashboard');
            } else {
                $errorConnect = "Login ou mot de passe incorrect";
            }
        }
    }
    require_once("login.php");
}
ob_end_flush();
