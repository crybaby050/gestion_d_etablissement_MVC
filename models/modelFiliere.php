<?php
//fonction qui me permet de supprimer une filiere ainsi que l'étudiant affilier a la classe qui est affilier a cette filiere
function delFiliereWithClasseWithEtudiant($id){
    $datas = jsonToArray();
    $datasetude = jsonToArray();
    $datasclasse =jsonToArray();
    foreach($datasclasse['filiere'] as $fili => $c){
        if($c['id'] == $id){
            $moi = $c['id'];
            foreach($datas['classe'] as $data => $k){
                if($k['idFiliere'] == $moi){
                    $recup = $k['id'];
                    foreach($datas['etudiant'] as $etude =>$e){
                        if($e['idClasse']==$recup){
                            unset($datas['etudiant'][$etude]);
                        }
                    }
                    unset($datas['classe'][$data]);
                }
            }
            unset($datas['filiere'][$fili]);
            arrayToJson($datas);
            return;
        }
    }
}
//verification d'unicité sur le libelle du filiere
function verificationUniciteOnFiliere(mixed $data,string $a):bool{
    $filieres=findAllFilliere();
    foreach($filieres as $filiere){
        if($filiere[$a] == $data){
            return false;
        }
    }
    return true;
}