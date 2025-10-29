<?php
require_once __DIR__ . '/../models/modelDashboard.php';
function afficherDashboard()
{
    $etude = findAllEtudiant();
    $classe = findAllClasse();
    $filiere = findAllFilliere();
    $niveau = findAllNiveau();
    $nbEtudiants = compteur($etude);
    $nbClasse = compteur($classe);
    $nbFilliere = compteur($filiere);
    $nbNiveau = compteur($niveau);
    require_once __DIR__ . '/../views/dashboard/dashboard.php';
}
