<?php
require ('fonction_connexion.php');


// Rechercher les formations 
function AfficherListFormations(){
    $conn = ConnectPDO();
     $sql = "SELECT IdF , IntituleF
                 FROM FORMATION";
    $stmt = $conn->prepare($sql); 
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $res;
}
           
// Rechercher la liste des étudiants dans cette formation
function AfficherListEtudiant($IdF){
    $conn = ConnectPDO();
     $sql ="SELECT IdE ,NomE, PrenomE
                 FROM ETUDIANT 
                 WHERE IdF ='$IdF'
                 And IdE NOT IN (SELECT IdE
                                 FROM APPARTIENT)";
    $stmt = $conn->prepare($sql); 
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $res;
}
   
//Rechercher les groupes correspondants àà la formation 
function ListGroupeTD($IdF){
     $conn = ConnectPDO();
     $sql = "SELECT NumGroupTD  , IdGTD
                 FROM GROUPE_TD
                 WHERE IdF ='$IdF'";
    $stmt = $conn->prepare($sql); 
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $res;
}

//Rechrcher les étudiants de la formation qui ne sont pas affectés à un groupe
function AfficherListEtudiantNoTD($IdF){
    $conn = ConnectPDO();
     $sql = "SELECT IdE ,NomE, PrenomE
                 FROM ETUDIANT 
                 WHERE IdF ='$IdF'
                 And IdE NOT IN (SELECT IdE
                                 FROM APPARTIENT)";
    $stmt = $conn->prepare($sql); 
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $res;
}

// Recherhcer la liste des étudiants présents dans le groupe dde TD
function ListGroupeEtu($IdGTD){
    $conn = ConnectPDO();
     $sql = "SELECT e.IdE , e.NomE, e.PrenomE
                 FROM ETUDIANT e , APPARTIENT a
                 WHERE a.IdE=e.IdE
                 And a.IdGTD ='$IdGTD'";
    $stmt = $conn->prepare($sql); 
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $res;
}

function AjouterEtudiantGroupeTD($IdE,$IdGTD,$IdF){
    $cx = ConnectDB();
    $sql = "INSERT INTO APPARTIENT (IdGTD,IdE) Value ('$IdGTD','$IdE')";
    $querysql = mysqli_query($cx,$sql);
   
    return "gestionGTD.php?IdF=$IdF&IdGTD=$IdGTD";
}

function EnleverEtudiantGroupeTD($IdE,$IdGTD,$IdF){
    $cx = ConnectDB();
    $sql = "DELETE FROM APPARTIENT WHERE IdGTD ='$IdGTD' AND IdE='$IdE'";
    $querysql = mysqli_query($cx,$sql);
   
    return "gestionGTD.php?IdF=$IdF&IdGTD=$IdGTD";
}
?>
