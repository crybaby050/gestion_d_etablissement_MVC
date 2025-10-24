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