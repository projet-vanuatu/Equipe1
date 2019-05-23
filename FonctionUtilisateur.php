<?php
require ('fonction_connexion.php');


//Fonctions pour les enseignants 
function RecupererLesNomDeDomaines(){
    
    $conn = ConnectPDO();
    $sql = "SELECT IdDomaine , intitule_domaine FROM DOMAINE";
    $stmt = $conn->prepare($sql); 
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $res;
}

function RecupererIdMdpEns ($MdpEns){
    
    $cx = ConnectDB();
     $RechercherIdMdp = "SELECT IdMdp FROM CODES Where Mdp ='$MdpEns'";
        $queryRechercherIdMdp = mysqli_query($cx,$RechercherIdMdp);
        $res = mysqli_fetch_array($queryRechercherIdMdp);
        return $res['IdMdp'];
}


function InsererEnseignant ($MdpEns,$IdEns,$NomEns,$PrenomEns,$TypeEns,$IdDomaine) {
    
    $cx = ConnectDB();
    $InsererMdp ="INSERT INTO CODES (IdMdp, Mdp) VALUES (NULL, '$MdpEns');";
    $queryInsererMdp = mysqli_query($cx,$InsererMdp);
    
    if($queryInsererMdp){
        
        $IdMdpEns = RecupererIdMdpEns ($MdpEns);
        $InsererEnseignant = "INSERT INTO ENSEIGNANT (IdENS , PrenomENS,NomENS,TypeENS,IdMdp) values ('$IdEns','$PrenomEns','$NomEns','$TypeEns','$IdMdpEns')";
        $queryInsererEnseignant = mysqli_query($cx,$InsererEnseignant);
        
            if($queryInsererEnseignant){
                
                $InsererDomaine ="INSERT INTO SPECIALISER (IdENS,IdDomaine) values ('$IdEns','$IdDomaine')";
                $queryInsererDomaine = mysqli_query($cx,$InsererDomaine);
                 return "CreerUtilisateur.php";
            }
            
      
       
    }
}

function RecupererNomFormation(){
    $conn = ConnectPDO();
    $sql = "SELECT IdF , IntituleF FROM FORMATION";
    $stmt = $conn->prepare($sql); 
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $res;
}

//Fonctions pour les étudiants

function RecupererIdMdpE ($MdpE){
    
    $cx = ConnectDB();
     $RechercherIdMdp = "SELECT IdMdp FROM CODES Where Mdp ='$MdpE'";
        $queryRechercherIdMdp = mysqli_query($cx,$RechercherIdMdp);
        $res = mysqli_fetch_array($queryRechercherIdMdp);
        return $res['IdMdp'];
}

function RecupererIdGCM($IdF){
    $cx = ConnectDB();
    $RecupIdCGM = "SELECT IdGCM FROM GROUPE_CM WHERE IdF ='$IdF'";
    $queryRecupIdGCM = mysqli_query($cx,$RecupIdCGM);
    $res = mysqli_fetch_array($queryRecupIdGCM);
    return $res['IdGCM'];
}

function InsererEtudiant ($MdpE,$IdE,$NomE,$PrenomE,$IdF) {
    
    $cx = ConnectDB();
    $InsererMdp ="INSERT INTO CODES (IdMdp, Mdp) VALUES (NULL, '$MdpE');";
    $queryInsererMdp = mysqli_query($cx,$InsererMdp);
    
      if($queryInsererMdp){
          
        $IdMdpE = RecupererIdMdpE($MdpE);
        $IdGCM = RecupererIdGCM($IdF);
        $InsererEtudiant = "INSERT INTO ETUDIANT (IdE ,NomE, PrenomE,IdGCM,IdF,IdMdp) values ('$IdE','$NomE','$PrenomE','$IdGCM','$IdF','$IdMdpE')";
        $queryInsererEtudiant = mysqli_query($cx,$InsererEtudiant);
        return "CreerUtilisateur.php";
        
          
      
       
    }
}

//Fonctions Administrateur/Gestionnaire


function RecupererIdMdpA ($MdpA){
    
    $cx = ConnectDB();
     $RechercherIdMdp = "SELECT IdMdp FROM CODES Where Mdp ='$MdpA'";
        $queryRechercherIdMdp = mysqli_query($cx,$RechercherIdMdp);
        $res = mysqli_fetch_array($queryRechercherIdMdp);
        return $res['IdMdp'];
}

function InsererAdminGest ($MdpA,$IdA,$NomA,$PrenomA,$StatutA) {
    
    $cx = ConnectDB();
    $InsererMdp ="INSERT INTO CODES (IdMdp, Mdp) VALUES (NULL, '$MdpA');";
    $queryInsererMdp = mysqli_query($cx,$InsererMdp);
    
      if($queryInsererMdp){
          
        $IdMdpA = RecupererIdMdpA($MdpA);
        $InsererAdmin = "INSERT INTO ADMINISTRATION (IdA ,NomA, PrenomA,StatutA,IdMdp) values ('$IdA','$NomA','$PrenomA','$StatutA','$IdMdpA')";
        $queryInsererAdmin = mysqli_query($cx,$InsererAdmin);
        return "CreerUtilisateur.php";
        
          
      
       
    }
}


?>