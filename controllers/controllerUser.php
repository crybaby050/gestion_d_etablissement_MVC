<?php
require_once __DIR__ . '/../models/modelUser.php';
function loginPage(){
    if (isset($_SESSION["userConnect"])) {
        header("Location: index.php?page=dashboard");
        exit;
    }
    $errorLogin = "";
    $errorPwd = "";
    $errorConnect = "";
    if (isset($_POST["connect"])) {
        $login = trim($_POST["mail"]);
        $pwd = trim($_POST["mdp"]);
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
            if ($user) {
                $_SESSION["userConnect"] = $user;
                header("Location: index.php?page=dashboard");
                exit;
            } else {
                $errorConnect = "Login ou mot de passe incorrect";
            }
        }
    }
require_once __DIR__ . '/../views/user/login.php';
}