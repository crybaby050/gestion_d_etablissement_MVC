<?php
//Créer dans le but de pouvoir reutiliser certaine fonction quand on le souhaite
function jsonToArray():array{
    $json = file_get_contents(__DIR__ . '/../data/data.json');
    $datas = json_decode($json,true);
    if(empty($datas)){
        return [];
    }else{
        return $datas;
    }
}
function arrayToJson($data):void{
    $json = json_encode($data,JSON_PRETTY_PRINT);
    file_put_contents(__DIR__ . '/../data/data.json',$json);
}