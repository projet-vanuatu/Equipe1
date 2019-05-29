<?php
require ('fonction_connexion.php');


//Fonctions pour créer les enseignants

      
       
 
function RecupererLesNomDeDomaines(){
    $conn = ConnectPDO();
    $sql = "SELECT IdDomaine , Intitule_domaine FROM DOMAINE";
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


function InsererEnseignant($MdpEns,$IdEns,$NomEns,$PrenomEns,$TypeEns,$IdDomaine) {
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
                 return "CreerUtilisateur.php?action=creer";
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

//Fonctions pour créer les étudiants



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
    require_once 'actionTest.php';
    $cx = ConnectDB();
    $InsererMdp ="INSERT INTO CODES (IdMdp, Mdp) VALUES (NULL, '$MdpE');";
    $queryInsererMdp = mysqli_query($cx,$InsererMdp);
    if($queryInsererMdp){ 
        $IdMdpE = RecupererIdMdpE($MdpE);
        $IdGCM = RecupererIdGCM($IdF);
        $InsererEtudiant = "INSERT INTO ETUDIANT (IdE ,NomE, PrenomE,IdGCM,IdF,IdMdp) values ('$IdE','$NomE','$PrenomE','$IdGCM','$IdF','$IdMdpE')";
        $queryInsererEtudiant = mysqli_query($cx,$InsererEtudiant);
        ecrire_log('lool');
        return "CreerUtilisateur.php?action=creer";
    }
}

//Fonctions créer les Administrateur/Gestionnaire

 
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
        return "CreerUtilisateur.php?action=creer";
        
          
      
       
    }
}

//Fonctions pour afficher les étudiants

function AfficherListeEtudiant(){    
 $conn = ConnectPDO();
    $sql = "SELECT e.IdE , e.PrenomE , e.NomE , f.IntituleF , e.IdMdp , g.NumGroupCM
            FROM ETUDIANT e , FORMATION f , GROUPE_CM g 
            WHERE e.IdF = f.IdF
            AND e.IdGCM = g.IdGCM";
    $stmt = $conn->prepare($sql); 
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $res;
}

//Fonctions pour afficher les enseignants

function AfficherListeEnseignant(){   
 $conn = ConnectPDO();
    $sql = "SELECT e.IdEns , e.NomEns , e.PrenomEns , e.TypeEns , e.IdMdp, d.Intitule_domaine 
            FROM ENSEIGNANT e , DOMAINE d , SPECIALISER s , CODES c
            WHERE e.IdEns = s.IdENS
            AND s.IdDomaine = d.IdDomaine";
    $stmt = $conn->prepare($sql); 
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $res;
}


//Fonctions pour afficher les administrateurs/gestionaires

function AfficherListeAdmin(){    
 $conn = ConnectPDO();
    $sql = "SELECT *
            FROM ADMINISTRATION";
    $stmt = $conn->prepare($sql); 
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $res;
}

//Fonctions pour supprimer un étudiant

  
function SupprimerEtudiant($IdESupp,$IdMdp){
    $cx = ConnectDB();
    $supprimerEtudiant = "DELETE 
                          FROM ETUDIANT
                          WHERE IdE ='$IdESupp'";
    $querysupprimerEtudiant = mysqli_query($cx,$supprimerEtudiant);
    $supprimerMdp = "DELETE 
                     FROM CODES
                     WHERE IdMdp = '$IdMdp'";
    $querysupprimerMdp = mysqli_query($cx,$supprimerMdp);
    return  "GestionUtilisateur.php" ;
    
    
    
}
//Fonctions pour supprimer un enseignant

function SupprimerEnseignant($IdESupp,$IdMdp){
    $cx = ConnectDB();  
    $supprimerDispense = "DELETE 
                          FROM DISPENSE
                          WHERE IdEns ='$IdESupp'";
    $querysupprimerDispense = mysqli_query($cx,$supprimerDispense);
    
    $supprimerReserver = "DELETE 
                          FROM RESERVER
                          WHERE IdEns ='$IdESupp'";
    $querysupprimerReserver = mysqli_query($cx,$supprimerReserver);
    $supprimerReserverHC = "DELETE 
                           FROM RESERVERHORSCOURS
                           WHERE IdEns ='$IdESupp'";
    $querysupprimerReserverHC = mysqli_query($cx,$supprimerReserverHC);
    
    $supprimerEnseigne = "DELETE 
                          FROM ENSEIGNE
                          WHERE IdEns ='$IdESupp'";
    $querysupprimerEnseigne = mysqli_query($cx,$supprimerEnseigne);
    
    $supprimerSpecialiser = "DELETE 
                            FROM SPECIALISER
                            WHERE IdEns ='$IdESupp'";
    $querysupprimerSpecialiser = mysqli_query($cx,$supprimerSpecialiser);
        if($querysupprimerSpecialiser&&$querysupprimerEnseigne&&$querysupprimerReserverHC&& $querysupprimerReserver&&$querysupprimerDispense){
            $supprimerEnseignant = "DELETE 
                                    FROM ENSEIGNANT
                                    WHERE IdEns ='$IdESupp'";
            $querysupprimerEnseignant = mysqli_query($cx,$supprimerEnseignant);
            $supprimerMdp = "DELETE 
                             FROM CODES
                             WHERE IdMdp = '$IdMdp'";
            $querysupprimerMdp = mysqli_query($cx,$supprimerMdp);
            return  "GestionUtilisateur.php" ;
        }
    
    
}

//Fonctions pour supprimer un admin/gestionnaire

function SupprimerAdmin($IdESupp,$IdMdp){
    $cx = ConnectDB();
    $supprimerReserver = "DELETE 
                        FROM RESERVER
                        WHERE IdEns ='$IdESupp'";
    $querysupprimerReserver = mysqli_query($cx,$supprimerReserver);

    $supprimerReserverHC = "DELETE 
                        FROM RESERVERHORSCOURS
                        WHERE IdEns ='$IdESupp'";
    $querysupprimerReserverHC = mysqli_query($cx,$supprimerReserverHC);
    if($querysupprimerReserverHC && $querysupprimerReserver){
        $supprimerAdmin = "DELETE 
        FROM ADMINISTRATION
        WHERE IdA ='$IdESupp'";
        $querysupprimerAdmin = mysqli_query($cx,$supprimerAdmin);
        $supprimerMdp = "DELETE 
        FROM CODES
        WHERE IdMdp = '$IdMdp'";
        $querysupprimerMdp = mysqli_query($cx,$supprimerMdp);
        return  "GestionUtilisateur.php" ;
    }

    
}

//Modifier un enseignant

function RecuperInfoEns ($IdEns){
    $conn = ConnectPDO();
    $sql = "SELECT e.NomEns , e.PrenomEns , e.TypeEns , c.Mdp , d.Intitule_domaine
            FROM ENSEIGNANT e , CODES c , DOMAINE d , SPECIALISER s
            WHERE e.IdMdp=c.IdMdp
            AND d.IdDomaine=s.IdDomaine
            AND e.IdEns=s.IdEns
            AND e.IdEns ='$IdEns'";
   $stmt = $conn->prepare($sql); 
   $stmt->execute();
   $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
   return $res;
}


function RecupererMdp($IdEns){
    $cx = ConnectDB();
    $Mdp = "SELECT IdMdp
           FROM ENSEIGNANT 
           WHERE IdENS ='$IdEns'";
    $queryMdp = mysqli_query($cx,$Mdp);
    $res= mysqli_fetch_array($queryMdp);
    return $res['IdMdp'] ;
}
function ModifierEns($MdpEns,$IdEns,$NomEns,$PrenomEns,$TypeEns,$IdDomaine){
    $cx = ConnectDB();
    $ModifierEns = "UPDATE ENSEIGNANT
                   SET NomENS ='$NomEns' , PrenomENS = '$PrenomEns' , TypeENS = '$TypeEns' 
                   WHERE IdENS ='$IdEns'";
    $queryModifierEns = mysqli_query($cx,$ModifierEns);

    $IdMdpEns =  RecupererMdp($IdEns);
    $ModifierMdp = "UPDATE CODES
                   SET Mdp ='$MdpEns' 
                   WHERE IdMdp ='$IdMdpEns'";
    $queryModifierMdp = mysqli_query($cx,$ModifierMdp);
    
    $ModifierDomaine = "UPDATE SPECIALISER
                        SET IdDomaine ='$IdDomaine'
                        WHERE IdENS ='$IdEns'";
    $queryModifierDOmaine = mysqli_query($cx,$ModifierDomaine);
    return "CreerUtilisateur.php?action=creer";

}
//Modifier un étudiant
function RecuperInfoEtu ($IdE){
     $conn = ConnectPDO();
     $sql = "SELECT e.NomE , e.PrenomE, e.IdF , c.Mdp 
            FROM ETUDIANT e , CODES c 
            WHERE e.IdMdp=c.IdMdp
            AND e.IdE ='$IdE'";
    $stmt = $conn->prepare($sql); 
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $res;
}
function RecupererMdpEtu($IdE){
    $cx = ConnectDB();
    $Mdp = "SELECT IdMdp
           FROM ETUDIANT
           WHERE IdE ='$IdE'";
    $queryMdp = mysqli_query($cx,$Mdp);
    $res= mysqli_fetch_array($queryMdp);
    return $res['IdMdp'] ;
}

function ModifierEtu($MdpE,$IdE,$NomE,$PrenomE,$IdF){
    $cx = ConnectDB();
    $ModifierE = "UPDATE ETUDIANT
                   SET NomE ='$NomE' , PrenomE= '$PrenomE' , IdF = '$IdF' 
                   WHERE IdE ='$IdE'";
    $queryModifierE= mysqli_query($cx,$ModifierE);

    $IdMdpE =  RecupererMdpEtu($IdE);
    $ModifierMdp = "UPDATE CODES
                   SET Mdp ='$MdpE' 
                   WHERE IdMdp ='$IdMdpE'";
    $queryModifierMdp = mysqli_query($cx,$ModifierMdp);
    
    return "CreerUtilisateur.php?action=creer";

}
//Modifier un AD/Gestionnaire
function RecuperInfoAd ($IdA){
     $conn = ConnectPDO();
     $sql = "SELECT a.NomA , a.PrenomA, a.StatutA , c.Mdp 
FROM ADMINISTRATION a , CODES c 
WHERE a.IdMdp=c.IdMdp
AND a.IdA ='$IdA'";
    $stmt = $conn->prepare($sql); 
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $res;
}

function RecupererMdpAd($IdA){
     $cx = ConnectDB();
     $Mdp = "SELECT IdMdp
            FROM ADMINISTRATION
            WHERE IdA ='$IdA'";
     $queryMdp = mysqli_query($cx,$Mdp);
     $res= mysqli_fetch_array($queryMdp);
     return $res['IdMdp'] ;
}

function ModifierAd($MdpA,$IdA,$NomA,$PrenomA,$StatuA){
    $cx = ConnectDB();
    $ModifierA = "UPDATE ADMINISTRATION
                   SET NomA ='$NomA' , PrenomA= '$PrenomA' , StatutA = '$StatuA' 
                   WHERE IdA ='$IdA'";
    $queryModifierA= mysqli_query($cx,$ModifierA);

    $IdMdpA = RecupererMdpAd($IdA);
    $ModifierMdp = "UPDATE CODES
                   SET Mdp ='$MdpA' 
                   WHERE IdMdp ='$IdMdpA'";
    $queryModifierMdp = mysqli_query($cx,$ModifierMdp);
    
    return "CreerUtilisateur.php?action=creer";

}
?>