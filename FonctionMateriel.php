<?php
require('fonction_connexion.php');

//Rechercher les salles 

function RechercherSalles(){
         $conn = ConnectPDO();
     $sql = "SELECT s.NomS , s.IdS , si.NomSITE
             FROM SALLE s , SITE si
             WHERE s.IdSITE=si.IdSITE";
    $stmt = $conn->prepare($sql); 
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $res;
}




// Créer un matériel 
function CreerMateriel($Type,$Etat,$IdS){
    $cx = ConnectDB();
    $Materiel="INSERT INTO MATERIELS (IdMat,TypeMat,Etat_fonctionnement,IdS) value(NULL,'$Type','$Etat',$IdS)";
    $queryMateriel = mysqli_query($cx,$Materiel);
    echo $queryMateriel;
    return "CreerMateriel.php?action=creer";
}

// Afficher la liste des matériels équipés

function AfficherMateriel() {
     $conn = ConnectPDO();
     $sql = "SELECT s.NomS , si.NomSITE , m.TypeMat ,m.Etat_fonctionnement ,m.IdMat
             FROM SALLE s , SITE si ,MATERIELS m
             WHERE s.IdSITE=si.IdSITE
             AND m.IdS=s.IdS";
    $stmt = $conn->prepare($sql); 
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $res;
}
// Afficher la liste des matériels non équipés
function AfficherMateriel1() {
     $conn = ConnectPDO();
     $sql = "SELECT  TypeMat ,Etat_fonctionnement ,IdMat
             FROM MATERIELS
             WHERE IdMat Not In (SELECT m.IdMat
                                 FROM MATERIELS m , SALLE s , SITE si
                                 WHERE s.IdSITE=si.IdSITE
                                 AND m.IdS=s.IdS)";
    $stmt = $conn->prepare($sql); 
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $res;
}
// Récuper les infos d'un matériel

function RecupererInfosMateriel($IdMat) {
     $conn = ConnectPDO();
     $sql = "SELECT s.IdS, si.NomSITE , m.TypeMat ,m.Etat_fonctionnement 
             FROM SALLE s , SITE si ,MATERIELS m
             WHERE s.IdSITE=si.IdSITE
             AND m.IdS=s.IdS
             AND m.IdMat ='$IdMat'";
    $stmt = $conn->prepare($sql); 
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $res;
}

// Modifier un matériel
function ModifierMateriel($IdMat,$Type,$Etat,$IdS){
    $cx= ConnectDB();
    $ModifierMat ="UPDATE MATERIELS
                   SET TypeMat ='$Type' , Etat_fonctionnement='$Etat', IdS='$IdS'
                   WHERE IdMat = '$IdMat'";
    $queryModifierMat = mysqli_query($cx,$ModifierMat);
    return "GestionMateriel.php";
}

function RecupererInfosMateriel1($IdMat) {
     $conn = ConnectPDO();
     $sql = "SELECT  m.TypeMat ,m.Etat_fonctionnement 
             FROM  MATERIELS m
             WHERE m.IdMat ='$IdMat'";
    $stmt = $conn->prepare($sql); 
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $res;
}
?> 