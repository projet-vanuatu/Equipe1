<?php
    
 require('FonctionUtilisateur.php');
 
$action=$_GET['action'];
 
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

    //Creer/Modifier un enseignant 
    if($action=='creer'){
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
    }
    if($action=='modifier'){
        $IdEns= $_GET['IdEns'];
        $PrenomEns= $_GET['PrenomEns'];
        $NomEns= $_GET['NomEns'];
        $TypeEns= $_GET['Statut'];
        $IdDomaine= $_GET['IdDomaine'];
        $MdpEns= $_GET['MdpEns'];
        $ModifierEnseignant = ModifierEns ($MdpEns,$IdEns,$NomEns,$PrenomEns,$TypeEns,$IdDomaine);
        header('Location:'.$ModifierEnseignant);
    }
     
    //Creer/Modifier un étudiant
    if($action=='creer'){
        if(!empty($_GET['IdE'])&&!empty($_GET['PrenomE'])&&!empty($_GET['NomE'])&&!empty($_GET['IdF'])&&!empty($_GET['MdpE'])){

         $IdE= $_GET['IdE'];
         $PrenomE= $_GET['PrenomE'];
         $NomE= $_GET['NomE'];
         $IdF= $_GET['IdF'];
         $MdpE= $_GET['MdpE'];
         $InsererEtudiant = InsererEtudiant ($MdpE,$IdE,$NomE,$PrenomE,$IdF);
         header('Location:'.$InsererEtudiant);
        }
     }
     if($action=='modifier'){
         if(!empty($_GET['IdE'])&&!empty($_GET['PrenomE'])&&!empty($_GET['NomE'])&&!empty($_GET['IdF'])&&!empty($_GET['MdpE'])){
            $IdE= $_GET['IdE'];
            $PrenomE= $_GET['PrenomE'];
            $NomE= $_GET['NomE'];
            $IdF= $_GET['IdF'];
            $MdpE= $_GET['MdpE'];
            $ModifierEtudiant = ModifierEtu($MdpE,$IdE,$NomE,$PrenomE,$IdF);
            header('Location:'.$ModifierEtudiant);
        }
    }
 
          //Creer/Modifier un admin/ge
    if($action=='creer'){
        if(!empty($_GET['IdA'])&&!empty($_GET['PrenomA'])&&!empty($_GET['NomA'])&&!empty($_GET['StatutA'])&&!empty($_GET['MdpA'])){
              $IdA= $_GET['IdA'];
              $PrenomA= $_GET['PrenomA'];
              $NomA= $_GET['NomA'];
              $StatutA= $_GET['StatutA'];
              $MdpA= $_GET['MdpA'];
              $InsererAdmin =InsererAdminGest ($MdpA,$IdA,$NomA,$PrenomA,$StatutA);
              header('Location:'.  $InsererAdmin);
        }

 }
   if($action=='modifier'){
        if(!empty($_GET['IdA'])&&!empty($_GET['PrenomA'])&&!empty($_GET['NomA'])&&!empty($_GET['StatutA'])&&!empty($_GET['MdpA'])){
              $IdA= $_GET['IdA'];
              $PrenomA= $_GET['PrenomA'];
              $NomA= $_GET['NomA'];
              $StatutA= $_GET['StatutA'];
              $MdpA= $_GET['MdpA'];
              $ModifierAdmin = ModifierAd ($MdpA,$IdA,$NomA,$PrenomA,$StatutA);
              header('Location:'.  $ModifierAdmin);
        }
   }