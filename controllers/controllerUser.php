<?php
require_once __DIR__ . '/modelData.php';
function getUser(){
    if (isset($_SESSION["userConnect"])) {
        header("location:" . WEBROOT . "?page=dashboard");
        exit;
    }
    $errorLogin = "";
    $errorPwd = "";
    $errorConnect = "";
    if (isset($_POST["connect"])) {
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