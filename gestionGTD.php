<?php

require('FonctionGestionGTD.php');
$AfficherList= AfficherListFormations();

if(!empty($IdF)){
$IdFs = $_SESSION['IdF'];
   }else{
       $IdFs ="";
   } 
   if(!empty($IdGDT)){
$IdGTDs = $_SESSION['IdGTD'];
   }else{
       $IdGTDs ="";
   } 
   
if(!empty($_GET['IdF'])){
    $IdF = $_GET['IdF'];
   $resListEtu = AfficherListEtudiant($IdF);
   $resListGroupeTD = ListGroupeTD($IdF);
   $_SESSION['IdF']=$IdF;
   $IdF= $_SESSION['IdF'];
   $Selected = "Selected";
   if(!empty($IdF)){
    $IdFs = $_SESSION['IdF'];
   }else{
       $IdFs ="";
   } 
   
}else {
    $IdF="";
    
    
}
if(!empty($_GET['IdGTD'])){
    $IdFs = $_SESSION['IdF'];
    $IdGTD = $_GET['IdGTD'];
    $LisGroupeEtu = ListGroupeEtu($IdGTD);
    $_SESSION['IdGTD']=$IdGTD;
    $IdGTDs =  $_SESSION['IdGTD'];
    $resListEtu = AfficherListEtudiant($IdFs);
    $resListGroupeTD = ListGroupeTD($IdFs);
    $Selected = "Selected";
     if(!empty($IdGDT)){
$IdGTDs = $_SESSION['IdGTD'];
   }else{
       $IdFGTDs ="";
   } 
}

if(!empty($_GET['IdE'])){
    
     $IdFs = $_SESSION['IdF'];
    $IdGTDs =  $_SESSION['IdGTD'];
     $LisGroupeEtu = ListGroupeEtu($IdGTDs);
    $resListEtu = AfficherListEtudiant($IdFs);
    $resListGroupeTD = ListGroupeTD($IdFs);
    $Selected = "Selected";
     if(!empty($IdGDT)){
$IdGTDs = $_SESSION['IdGTD'];
   }else{
       $IdFGTDs ="";
   } 
   $IdE = $_GET['IdE'];
}else {
     $IdFGTDs ="";
     $IdE = "" ;
}

if(!empty($_GET['IdEsupp'])){
    
     $IdFs = $_SESSION['IdF'];
    $IdGTDs =  $_SESSION['IdGTD'];
     $LisGroupeEtu = ListGroupeEtu($IdGTDs);
    $resListEtu = AfficherListEtudiant($IdFs);
    $resListGroupeTD = ListGroupeTD($IdFs);
    $Selected = "Selected";
     if(!empty($IdGDT)){
$IdGTDs = $_SESSION['IdGTD'];
   }else{
       $IdFGTDs ="";
   } 
   $IdESupp = $_GET['IdEsupp'];
}else {
     $IdFGTDs ="";
     $IdESupp = "" ;
}
?>

<html lang="fr">
    <head>
        <meta charset="UTF-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../public/style.css">
        <script src="javascript.js"></script>
        <title>Title of the document</title>
    </head>
    <body>
      <div class="myNavbar">
          <div class="navbar-header">
              <img src="../public/logo.jpg" alt="Logo" style="width:52px;">
          </div>
          <a href="../homeGestionnaire.html">Accueil</a>
          <a href="#">Gestion du planning</a>
          <a href="gestionGTD.php">Gestion groupes TD</a>
          <a href="#">Réservations matériels</a>
          <div class="subnav">
              <button class="subnavbtn">Consulter planning &nbsp;<i class="fa fa-caret-down"></i></button>
              <div class="subnav-content">
                  <a href="#company">Par formation</a>
                  <a href="#company">Par salle</a>
                  <a href="#company">Par enseignant</a>
              </div>
            </div>
            <div class="subnav2">
                <a href = "index.html" class="subnavbtn2">Deconnection&nbsp;<span class="glyphicon glyphicon-log-in"></span></a>
            </div>
            <div class="subnav2">
                <button class="subnavbtn3"><span class="glyphicon glyphicon-user"></span>&nbsp;Nom Prénom</button>
            </div>
      </div>

      <div class="container">
        <h3><center>Affectation des étudiants aux groupes de TD</center></h3>
        <div class="row content">
          <div class="col-sm-4"></div>
          <form action ='gestionGTD.php'>
              
            
          <div class="col-sm-4">    
            <label for="sel1">Formation :</label>
            
            <select class="form-control" id="sel1" name ='IdF' onchange="this.form.submit()" >
              <option  >Choisir une formation </option>
              <?php
               for($i=0;$i<=count($AfficherList)-1;$i++){
                ?>
                          <Option <?php if($IdFs == $AfficherList[$i]['IdF']){echo "selected";}else{echo "";}?> value ="<?php echo $AfficherList[$i]['IdF'] ?>"><?php echo $AfficherList[$i]['IntituleF']?></option>     
                <?php
                    }
                ?> 
            </select>
            <br>
          </div>
             
          </form>
    </div>
          
        
         
        <div class="row content">

          <div class="col-sm-5 sidenav"> 
              <form action ="gestionGTD.php">
               <label for="sel1">Liste des étudiants non affecctés à un groupe de TD :</label>
              
              <select multiple class="form-control" id="sel1" style="height:450px;" name ="IdE" onchange="this.form.submit()">
                 <?php
               for($i=0;$i<=count($resListEtu)-1;$i++){
                ?>
                          <Option <?php if($IdE == $resListEtu[$i]['IdE']){echo "Selected";} ?> value ="<?php echo $resListEtu[$i]['IdE']?>">
                              <?php echo $resListEtu[$i]['IdE']." ".$resListEtu[$i]['NomE']." ".$resListEtu[$i]['PrenomE']?>
                          </option>     
                <?php
                    }
                ?> 
              </select>
              </form>
          </div>
        
          <div class="col-sm-2 sidenav">
            <div style="margin-top:80%; margin-left:30%; padding:10px;">
                <p><a href ='actionGestionGTD.php?IdFs=<?php echo $IdFs?>&IdGTD=<?php echo $IdGTDs?>&NumEtuSupp=<?php echo $IdESupp ?>' ><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left" ></span></button></a></p>
              <p><a href ='actionGestionGTD.php?IdFs=<?php echo $IdFs?>&IdGTD=<?php echo $IdGTDs?>&NumEtu=<?php echo $IdE ?>'><button type="button" class="btn btn-primary" ><span class="glyphicon glyphicon-arrow-right"></span></button></a></p>
            </div>
          </div>
        
          <div class="col-sm-5 sidenav">
            <label for="sel1">Groupe de TD:</label>
            <form action="gestionGTD.php">
            <select class="form-control" id="sel1" name ='IdGTD' onchange="this.form.submit()">
              <option  >Choisir un groupe de TD </option>
               <?php
               for($i=0;$i<=count($resListGroupeTD)-1;$i++){
                ?>
                          <Option <?php if($IdGTDs == $resListGroupeTD[$i]['IdGTD']){ echo "Selected ";} ?> 
                              value ="<?php echo $resListGroupeTD[$i]['IdGTD'] ?>">
                                  <?php echo $resListGroupeTD[$i]['NumGroupTD']?>
                          </option>     
                <?php
                    }
                ?> 
            </select>
            
          </form>
            <form action ="gestionGTD.php">
            <select multiple class="form-control" id="sel1" style="height:400px;" name='IdEsupp' onchange="this.form.submit()">
              <?php
               for($i=0;$i<=count($LisGroupeEtu)-1;$i++){
                ?>
                          <Option <?php if($IdESupp == $LisGroupeEtu[$i]['IdE']){echo "Selected";}?> value ="<?php echo $LisGroupeEtu[$i]['IdE']?>"><?php echo $LisGroupeEtu[$i]['IdE']." ".$LisGroupeEtu[$i]['NomE']." ".$LisGroupeEtu[$i]['PrenomE']?></option>     
                <?php
                    }
                ?> 
            </select>
            </form>
          </div>
        </div>

        <div class="col-sm-9"></div>
      </div>

    <footer class="container-fluid"></footer>
    </body>
</html>
