<?php
session_start();
// session_unset();
ob_start();
require_once 'controllers/controllerUser.php';
require_once 'controllers/controllerEtudiant.php';
define("WEBROOT", "http://localhost:8000/");
$page = $_REQUEST['page'] ?? 'login';
if (!isset($_SESSION["userConnect"]) && $page !== 'login') {
    header("Location: " . WEBROOT);
    exit;
}
switch ($page) {
    case 'login':
        loginPage();
        break;
        // require_once 'partials/tete.php';
        // require_once 'partials/sidebar.php';
    case 'liste_etudiant':
        listeEtudiant();
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
