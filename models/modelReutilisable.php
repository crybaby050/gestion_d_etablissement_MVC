<?php
//recuperation de donnée des classes
function findAllClasse():array{
    $datas=jsonToArray();
    return $datas['classe'];
}
// fonction pour determiner si le tableau est vide
function presence($tab):void{
    if(count($tab)==0){
        echo "<h3> Auncun element enregistrer</h3>";
    }
}