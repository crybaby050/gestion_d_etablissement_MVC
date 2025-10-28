<?php
//fonction qui me permet de supprimer un niveau ainsi que l'étudiant affilier a la classe qui est affilier a ce niveau
function delNiveauWithClasseWithEtudiant($id){
    $datas = jsonToArray();
    $datasetude = jsonToArray();
    $datasclasse =jsonToArray();
    foreach($datasclasse['niveau'] as $fili => $c){
        if($c['id'] == $id){
            $moi = $c['id'];
            foreach($datas['classe'] as $data => $k){
                if($k['idNiveau'] == $moi){
                    $recup = $k['id'];
                    foreach($datas['etudiant'] as $etude =>$e){
                        if($e['idClasse']==$recup){
                            unset($datas['etudiant'][$etude]);
                        }
                    }
                    unset($datas['classe'][$data]);
                }
            }
            unset($datas['niveau'][$fili]);
            arrayToJson($datas);
            return;
        }
    }
}
//verification d'unicité sur le libelle du filiere
function verificationUniciteOnNiveau(mixed $data,string $a):bool{
    $niveaux=findAllNiveau();
    foreach($niveaux as $niveau){
        if($niveau[$a] == $data){
            return false;
        }
    }
    return true;
}