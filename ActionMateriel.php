<?php

require('FonctionMateriel.php');

$action=$_GET['action'];

if($action =='creer'){
     if(!empty($_GET['Type'])&&!empty($_GET['Etat'])&&!empty($_GET['Salle'])){
        $Type=$_GET['Type'];
        $Etat=$_GET['Etat'];
        $IdS=$_GET['Salle'];
        $InsererMateriel = CreerMateriel($Type, $Etat,$IdS);
        header('Location:'.$InsererMateriel);
     }
    
}

if($action =='modifier'){
      if(!empty($_GET['Type'])&&!empty($_GET['Etat'])&&!empty($_GET['Salle'])&&!empty($_GET['IdMat'])){
        $IdMat =$_GET['IdMat'];
        $Type=$_GET['Type'];
        $Etat=$_GET['Etat'];
        $IdS=$_GET['Salle'];
        $ModifierMateriel = ModifierMateriel($IdMat, $Type, $Etat, $IdS);
        header('Location:'.$ModifierMateriel);

        }
}

if($action =='supprimer'){
      if(!empty($_GET['IdMat'])){
        $IdMat =$_GET['IdMat'];
        $SupprimerMateriel = SupprimerMateriel($IdMat);
        header('Location:'.$SupprimerMateriel);

        }
}
?>
