<?php
require_once __DIR__ . '/modelData.php';
function findAllUsers():array{
    $datas=jsonToArray();
    return $datas['users'];
}
function findUserConnect(string $login, string $mdp): array{
    $users=findAllUsers();
    foreach ($users as $user) {
        if ($user["mail"] === $login && $user["mdp"] === $mdp) {
            return $user;
        }
    }
    return [];
}
