<?php
require('FonctionMateriel.php');
$resMateriel = RechercherSalles();


// Récupération du nom de la personne connectée
$Nom = $_SESSION['Nom'];
$Prenom= $_SESSION['Prenom'];

$action =$_GET['action'];
$equipe=['equipe'];
 if(isset($_GET['IdMat'])&&$_GET['equipe']=='Oui'){
     $IdMat= $_GET['IdMat'];
     $resinfo= RecupererInfosMateriel($IdMat);
     
     for($i=0;$i<=count($resinfo)-1;$i++){

        $TypeMat= $resinfo[$i]['TypeMat'];
        $Etat_fonctionnement= $resinfo[$i]['Etat_fonctionnement'];
        $IdS=$resinfo[$i]['IdS'];
       
     }
      

    } elseif (isset($_GET['IdMat'])&&$_GET['equipe']=='Non') {
         $IdMat= $_GET['IdMat'];
     $resinfo1= RecupererInfosMateriel1($IdMat);
     
     for($i=0;$i<=count($resinfo1)-1;$i++){

        $TypeMat= $resinfo1[$i]['TypeMat'];
        $Etat_fonctionnement= $resinfo1[$i]['Etat_fonctionnement'];
        $IdS="NULL";
      
       
     }
        
    }else {
        
        $TypeMat= "";
        $Etat_fonctionnement= "";
        $IdS="";
    } 
?>

<html lang="en">
    <head>
        <meta charset="UTF-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="style.css">
        <script src="javascript.js"></script>
        <title>Title of the document</title>
    </head>

    <body>
        <div class="myNavbar">
            <div class="navbar-header">
                <img src="logo.JPG" alt="Logo" style="width:52px;">
            </div>
            <a href="homeAdmin.php">Accueil</a>
            <div class="subnav">
                <button class="subnavbtn">Création &nbsp;<i class="fa fa-caret-down"></i></button>
                <div class="subnav-content">
                <a href="CreerUtilisateur.php?action=creer">Utilisateurs</a>
                <a href="#company">Formations</a>
                <a href="#company">Salles</a>
                <a href="CreerMateriel.php?action=creer">Matériels</a>
                <a href="#company">Unités d'enseignements</a>
                <a href="#company">Matières</a>
                </div>
            </div> 
            <div class="subnav">
                <button class="subnavbtn">Gestion &nbsp;<i class="fa fa-caret-down"></i></button>
                <div class="subnav-content">
                    <a href="GestionUtilisateur.php">Utilisateurs</a>
                    <a href="#company">Formations</a>
                    <a href="">Salles</a>
                    <a href="GestionMateriel.php">Matériels</a>
                    <a href="#company">Unités d'enseignements</a>
                    <a href="#company">Matières</a>
                </div>
            </div>
            <div class="subnav">
                <button class="subnavbtn">Consulter planning &nbsp;<i class="fa fa-caret-down"></i></button>
                <div class="subnav-content">
                    <a href="#company">Par formation</a>
                    <a href="#company">Par salle</a>
                    <a href="#company">Par enseignant</a>
                </div>
            </div>
            <div class="subnav2">
                <a href = "index.php" class="subnavbtn2">Deconnection&nbsp;<span class="glyphicon glyphicon-log-in"></span></a>
            </div>
            <div class="subnav2">
                <button class="subnavbtn3"><span class="glyphicon glyphicon-user"></span>&nbsp;<?php echo($Nom." ".$Prenom);?></button>
            </div>
        </div>
        <div class="container">
              <br>
              <center><h4>Ajouter un matériel:</h4></center>
            <br>
        </div>
        <div class="row content">
            
          <div class="col-sm-4"></div>
          <div class="col-sm-4">
         <form  action="ActionMateriel.php">
              <div class="form-group" display>
                  <label for="email">Numéro du matériel:</label>
                  <input  type="text" class="form-control" id="email" placeholder="21575407..." name="IdMat" <?php if(empty($IdMat)){echo "Disabled";} ?> value ='<?php if(empty($IdMat)){echo " ";} else {echo $IdMat; }?>' >
                </div>
                <div class="form-group">
                  <label for="sel1">Type de matériel:</label>
                  <select class="form-control" id="sel1" name ='Type' required>
                       <?php 
                          if($TypeMat == "Micro"){ $selectMicro= "Selected"; $selectVP ="";$selectNo =""; $selectOrdi ="";}
                          else {
                              if($TypeMat == "Video-projecteur"){ $selectMicro= ""; $selectVP ="Selected";$selectNo =""; $selectOrdi =""; }
                              else { 
                                  if($TypeMat == "Ordinateur"){ $selectMicro= ""; $selectVP ="";$selectNo =""; $selectOrdi ="Selected";}
                          else {$selectMicro= ""; $selectVP ="";$selectNo ="Selected"; $selectOrdi =""; }}}
                          ?> 
                    <option  <?php echo $selectNo ?>  >Choisir une catégorie </option>
                    <option <?php echo $selectMicro ?> value ='Micro'>Micro </option>
                    <option <?php echo $selectVP ?>  value ='Video-projecteur'>Video-projecteur </option>
                    <option <?php echo $selectOrdi ?> value ='Ordinateur'>Ordinateur </option>
                  
                  </select>
                </div>
                   <div class="form-group">
                  <label for="sel1">Etat de fonctionnement:</label>
                  <select class="form-control" id="sel1" name ='Etat' required>
                       <?php 
                          if($Etat_fonctionnement == "En marche"){ $selectM= "Selected"; $selectP ="";$Noselect =""; }
                          else {if($Etat_fonctionnement == "En panne"){ $selectP= "Selected"; $selectM ="";$Noselect =""; }else { $selectM="" ;$selectP=""; $Noselect ="Selected"; }}
                          ?> 
                    <option <?php echo $Noselect ?> >Choisir l'état de fonctionnement </option>
                      <option <?php echo $selectM ?> value ='En marche'>En marche </option>
                    <option <?php echo $selectP ?> value ='En panne'>En panne </option>
                  </select>
                </div>
                   
                
                <div class="form-group">
               <label for="sel1"> Equipé dans la salle (optionnel):</label>
               <select class="form-control" id="sel1" name ='Salle' required>
                 <option value ='NULL'>Choisir la salle </option>
                 <?php             
                for($i=0;$i<=count($resMateriel)-1;$i++){
                ?>
                          <Option  <?php  if($resMateriel[$i]['IdS'] == $IdS){ echo "Selected"; } ?> value ="<?php echo $resMateriel[$i]['IdS'] ?>"><?php echo "Salle : ".$resMateriel[$i]['NomS']." Site : ".$resMateriel[$i]['NomSITE']?></option>     
                <?php
                    }
                ?> 
                          
                           <option  <?php  if($IdS =="NULL"){ echo "Selected "; } ?>value='NULL'>Aucune Salle </option>
               </select>
             </div>
          
                <button type="submit" class="btn btn-primary btn-block" value="<?php echo $action?>" name="action">Créer</button>
          
          </form>
         </div>
          </div>
     
         </body>
</html>