<?php
    
 require('FonctionUtilisateur.php');
 
  
 
    $IdESupp =$_GET['IdESupp'];
    $Type = $_GET['Type'];
    $IdMdp =$_GET['IdMdp'];
    
    //Supprimer un étudiant
    if($Type =='SupprimerEtudiant'){
        $SuppEtu =SupprimerEtudiant($IdESupp ,$IdMdp);
        header("Location: GestionUtilisateur.php");
    }

//Supprimer un enseignant
    
       if($Type =='SupprimerEnseignant'){
        $SuppEns =SupprimerEnseignant($IdESupp ,$IdMdp);
        header("Location: GestionUtilisateur.php");
    }

    //Supprimer un admin/gestionnaire
    
       if($Type =='SupprimerAdmin'){
        $SuppAdmin =SupprimerAdmin($IdESupp ,$IdMdp);
        header("Location: GestionUtilisateur.php");
    }
