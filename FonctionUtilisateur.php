<?php
require ('fonction_connexion.php');


//Fonctions pour créer les enseignants

      
       
       if(!empty($_GET['IdEns'])&&!empty($_GET['IdDomaine'])&&!empty($_GET['PrenomEns'])&&!empty($_GET['NomEns'])&&!empty($_GET['Statut'])&&!empty($_GET['MdpEns'])){
            $IdEns= $_GET['IdEns'];
            $PrenomEns= $_GET['PrenomEns'];
            $NomEns= $_GET['NomEns'];
            $TypeEns= $_GET['Statut'];
            $IdDomaine= $_GET['IdDomaine'];
            $MdpEns= $_GET['MdpEns'];
            $InsererEnseignant = InsererEnseignant ($MdpEns,$IdEns,$NomEns,$PrenomEns,$TypeEns,$IdDomaine);
            header('Location:'.$InsererEnseignant);
 }
 
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


function InsererEnseignant ($MdpEns,$IdEns,$NomEns,$PrenomEns,$TypeEns,$IdDomaine) {
    
    
    $VerifierExistance = EnseignantExiste ($IdEns);
            
            if($VerifierExistance = 0){
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
            }Else {
                $ModifierEns = "UPDATE ENSEIGNANT
                               SET NomENS ='$NomEns' , PrenomENS = '$PrenomEns' , TypeENS = '$TypeEns' 
                                   WHERE IdENS ='$IdEns'";
                $queryModifierEns = mysqli_query($cw,$ModifierEns);
                
                 $IdMdpEns = RecupererIdMdpEns ($MdpEns);
                $ModifierMdp = "UPDATE CODES
                               SET Mdp ='$MdpEns' 
                                   WHERE IdMdp ='$IdMdpEns'";
                $queryModifierMdp = mysqli_query($cw,$ModifierMdp);
                return "CreerUtilisateur.php";
                
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

 if(!empty($_GET['IdE'])&&!empty($_GET['PrenomE'])&&!empty($_GET['NomE'])&&!empty($_GET['IdF'])&&!empty($_GET['MdpE'])){
     
       $IdE= $_GET['IdE'];
       $PrenomE= $_GET['PrenomE'];
       $NomE= $_GET['NomE'];
       $IdF= $_GET['IdF'];
       $MdpE= $_GET['MdpE'];
       $InsererEtudiant = InsererEtudiant ($MdpE,$IdE,$NomE,$PrenomE,$IdF);
       header('Location:'.$InsererEtudiant);
 }

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

//Fonctions créer les Administrateur/Gestionnaire

 if(!empty($_GET['IdA'])&&!empty($_GET['PrenomA'])&&!empty($_GET['NomA'])&&!empty($_GET['StatutA'])&&!empty($_GET['MdpA'])){
       $IdA= $_GET['IdA'];
       $PrenomA= $_GET['PrenomA'];
       $NomA= $_GET['NomA'];
       $StatutA= $_GET['StatutA'];
       $MdpA= $_GET['MdpA'];
       $InsererAdmin =InsererAdminGest ($MdpA,$IdA,$NomA,$PrenomA,$StatutA);
       header('Location:'.  $InsererAdmin);

 }
 
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

function EnseignantExiste ($IdEns){
    $cx = ConnectDB();
    $ExiterEns = "SELECT *
                  FROM ENSEIGNANT 
                  WHERE IdENS ='$IdEns'";
    $query_ExisterEns = mysqli_query($cx,$ExiterEns);
    return mysqli_num_rows($query_ExisterEns);
    
    
}
?>