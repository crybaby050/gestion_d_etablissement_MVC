<?php
//fonction pour les details des classes
function detailClasseById($id): array {
    $tab = findAllClasse();
    foreach ($tab as $v) {
        if ($v['id'] == $id) {
            return $v;
        }
    }
    return [];
}
//fonction pour la supression des classes qui suprime aussi les etudiant rattacher a cette classe
function delClasseWithEtudiant($id){
    $datas = jsonToArray();
    $datasetude = jsonToArray();
    foreach($datas['classe'] as $data => $k){
        if($k['id'] == $id){
            $recup = $k['id'];
            foreach($datas['etudiant'] as $etude =>$e){
                if($e['idClasse']==$recup){
                    unset($datas['etudiant'][$etude]);
                }
            }
            unset($datas['classe'][$data]);
            arrayToJson($datas);
            return;
        }
    }
}
//les differentes fonction pour le filtrages des classe par filiere
//identification et recuperation du filiere correspondant
function getFiliereByLibelle($filiere,$libelle){
    foreach($filiere as $n){
        if($n["libelle"] == $libelle){
            return $n;
        }
    }
}
//recherche et stockage des classes correspondantes
function getClasseByFiliere($classe,$filiere){
    $clas=[];
    foreach($classe as $c){
        if($c['idFiliere'] == $filiere['id']){
            $clas[] = $c;
        }
    }
    return $clas;
}
//filtrage par filiere
function filterByFiliere($filieres,$libelle,$classe){
    $filiere = getFiliereByLibelle($filieres,$libelle);
    $clas = getClasseByFiliere($classe,$filiere);
    return $clas;
}
//fin du filtrage des classes par filiere
//les differentes fonction pour le filtrages des classe par niveau
//identification et recuperation du niveau correspondant
function getNiveauByLibelle($niveau,$libelle){
    foreach($niveau as $n){
        if($n["libelle"] == $libelle){
            return $n;
        }
    }
}
//recherche et stockage des classes correspondantes
function getClasseByNiveau($classe,$niveau){
    $clas=[];
    foreach($classe as $c){
        if($c['idNiveau'] == $niveau['id']){
            $clas[] = $c;
        }
    }
    return $clas;
}
//filtrage par niveau
function filterByNiveau($niveau,$libelle,$classe){
    $niveau = getNiveauByLibelle($niveau,$libelle);
    $clas = getClasseByNiveau($classe,$niveau);
    return $clas;
}
//fin du filtrage des classes par niveau
//fonction de verification d'unicité des classe
function verificationUniciteOnClasse(mixed $data,string $a):bool{
    $classes=findAllClasse();
    foreach($classes as $classe){
        if($classe[$a] == $data){
            return false;
        }
    }
    return true;
}