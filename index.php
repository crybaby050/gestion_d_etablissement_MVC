<?php
session_start();
// session_unset();
ob_start();
require_once 'models/modelReutilisable.php';
require_once 'controllers/controllerUser.php';
require_once 'controllers/controllerEtudiant.php';
require_once 'controllers/controllerClasse.php';
require_once 'controllers/controllerFiliere.php';
define("WEBROOT", "http://localhost:8000/");
$page = $_REQUEST['page'] ?? 'login';
if (!isset($_SESSION["userConnect"]) && $page !== 'login') {
    header("Location: " . WEBROOT);
    exit;
}
if ($page !== 'login') {
    require_once __DIR__ . '/partials/tete.php';
    $nameUser = $_SESSION['userConnect'];
    require_once __DIR__ . '/partials/sidebar.php';
}
switch ($page) {
    case 'login':
        loginPage();
    break;
    case 'liste_etudiant':
        listeEtudiant();
    break;
    case 'liste_classe':
        listeClasse();
    break;
    case 'liste_filiere':
        listeFiliere();
    break;
    case 'logout':
        session_destroy();
        header("Location: " . WEBROOT);
        exit;
        break;
    default:
        echo "Page introuvable.";
        break;
}
ob_end_flush();
