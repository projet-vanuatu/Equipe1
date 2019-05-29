<?php
require('FonctionUtilisateur.php');
$resD = RecupererLesNomDeDomaines();
$resF = RecupererNomFormation();
 require('actionTest.php');
 $errtxt = "Tstettd";

// Récupération du nom de la personne connectée
$Nom = $_SESSION['Nom'];
$Prenom= $_SESSION['Prenom'];

$action =$_GET['action'];

 if(isset($_GET['IdEnsModif'])){
     $IdEns= $_GET['IdEnsModif'];
     $resinfo=RecuperInfoEns ($IdEns);
     
     for($i=0;$i<=count($resinfo)-1;$i++){

        $PrenomEns= $resinfo[$i]['PrenomEns'];
        $NomEns= $resinfo[$i]['NomEns'];
        $TypeEns=$resinfo[$i]['TypeEns'];
        $NomDomaine=$resinfo[$i]['Intitule_domaine'];
        $MdpEns= $resinfo[$i]['Mdp'];   
        
      

    }  
 }else {
        $PrenomEns= "";
        $NomEns= "";
        $TypeEns="";
        $NomDomaine="";
        $MdpEns=  "";
        $IdEns= "";
    } 
if(isset($_GET['IdEtuModif'])){
 $IdE= $_GET['IdEtuModif'];
 $resinfoEtu= RecuperInfoEtu ($IdE);

 for($i=0;$i<=count($resinfoEtu)-1;$i++){

    $PrenomE= $resinfoEtu[$i]['PrenomE'];
    $NomE=$resinfoEtu[$i]['NomE'];
    $IdF=$resinfoEtu[$i]['IdF'];
    $MdpE=$resinfoEtu[$i]['Mdp'];



}  
 }else {
        $PrenomE ="";
        $NomE= "";
        $IdF="";
        $MdpE=  "";
        $IdE= "";
    }  
if(isset($_GET['IdAdModif'])){
 $IdA= $_GET['IdAdModif'];
 $resinfoAd= RecuperInfoAd($IdA);

 for($i=0;$i<=count($resinfoAd)-1;$i++){

    $PrenomA= $resinfoAd[$i]['PrenomA'];
    $NomA=$resinfoAd[$i]['NomA'];
    $StatutA=$resinfoAd[$i]['StatutA'];
    $MdpA=$resinfoAd[$i]['Mdp'];



}  
 }else {
        $PrenomA ="";
        $NomA= "";
        $IdA="";
        $MdpA=  "";
        $StatutA= "";
       
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
        

        <br>
        <br>
        <div class="container">
            <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link acstive " onclick="afficherEtudiant();">Etudiants</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  " onclick="afficherEnseignant();">Enseignants</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onclick="afficherGestionnaire();">Administrateurs/Gestionnaires</a>
                    </li>
            </ul>
        </div>

      <div class="container" id="Etudiants" style="display:block;">
        <div class="row content">
          <div class="col-sm-1"></div>
          <div class="col-sm-5">
            <br>
            <h4>Insertion simple</h4>
            <br>
            <form action="ActionUtilisateur.php">
                <div class="form-group">
                  <label for="email">Numéro étudiant:</label>
                  <input type="text" class="form-control" id="email" placeholder="21575407..." name="IdE" required="" value ='<?php echo $IdE ?>' >
                </div>
                <div class="form-group">
                  <label for="pwd">Nom:</label>
                  <input type="text" class="form-control" id="pwd" placeholder="Nom" name="NomE" required="" value ='<?php echo $NomE ?>'>
                </div>
                <div class="form-group">
                  <label for="pwd">Prénom:</label>
                  <input type="text" class="form-control" id="pwd" placeholder="Prénom" name="PrenomE" required="" value ='<?php echo $PrenomE ?>'>
                </div>
                <div class="form-group">
                  <label for="sel1">Formation:</label>
                  <select class="form-control" id="sel1" name ='IdF' required>
                    <option >Choisir une formation </option>
                    <?php             
                for($i=0;$i<=count($resF)-1;$i++){
                    ?>
                          <Option <?php  if($resF[$i]['IdF'] == $IdF){ echo "Selected"; } ?> value ="<?php echo $resF[$i]['IdF'] ?>"><?php echo $resF[$i]['IntituleF'] ?></option>     
                    <?php
                        }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="pwd">Mot de passe:</label>
                  <input type="text" class="form-control" id="pwd" placeholder="Mot de passe" name="MdpE" value ='<?php echo $MdpE ?>'>
                </div>
                <button type="submit" class="btn btn-primary btn-block" value="<?php echo $action?>" name="action">Créer</button>
            </form>
          </div>
          <div class="col-sm-1"></div>
          <div class="col-sm-4">
            <br>
              <h4>Insertion CSV</h4>
              <br>
              <form>
                <div class="custom-file">
                  <input type="file" class="custom-file-input custom-control-label" id="customFile">
                  <label class="custom-file-label" for="customFile">Choisir un fichier</label>
                </div>
              </form>
          </div>
        </div>
        <div class="col-sm-1"></div>
      </div>

      <div class="container" id="Enseignants" style="display:none;">
        <br>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <br>
                <form action="ActionUtilisateur.php">
                  <div class="form-group">
                    <label for="email">Numéro enseignants</label>
                    <input type="text" class="form-control" id="email" placeholder="21575407..." name="IdEns" required="" value ='<?php echo $IdEns ?>'>
                  </div>
                  <div class="form-group">
                      <label for="email">Nom</label>
                      <input type="text" class="form-control" id="email" placeholder="Nom..." name="NomEns" required="" value ='<?php echo $NomEns?>' >
                  </div>
                  <div class="form-group">
                      <label for="email">Prénom</label>
                      <input type="text" class="form-control" id="email" placeholder="Prénom..." name="PrenomEns" required="" value ='<?php echo $PrenomEns ?>' >
                  </div>
                  <div class="form-group">
                      <label for="email">Mot de passe</label>
                      <input type="text" class="form-control" id="email" placeholder="mot de passe..." name="MdpEns" required="" value ='<?php echo $MdpEns ?>'>
                  </div> 
                  <div class="form-group">
                      <label for="email">Statut</label>
                      <select class="form-control" id="sel1" name ="Statut" required="">
                          <?php 
                          if($TypeEns == "Enseignant"){ $selectEns= "Selected"; $selectInt ="";$Noselect =""; }else {   if($TypeEns == "Intervenant exterieur"){ $selectInt= "Selected"; $selectEns ="";$Noselect =""; }else { $selectEns="" ;$selectInt=""; $Noselect ="Selected"; }}
                          ?> 
                          <option <?php echo $Noselect ?>>Choisir Statut..</option>
                          
                          
                          <option value ="Enseignant" <?php echo $selectEns?>> Enseignant</option>
                          <option value ="Intervenant exterieur" <?php echo $selectInt?>>Intervenant exterieur</option>
                        </select>
                  </div>
                  <div class="form-group">
                      <label for="email" >Domaine</label>
                      <select class="form-control" id="sel1" name="IdDomaine" required="">
                          <option>Choisir un domaine de compétence</option>
                         <?php 
                          
                for($i=0;$i<=count($resD)-1;$i++){
                        ?>
                          
                          <Option <?php  if($resD[$i]['Intitule_domaine'] == $NomDomaine){ echo "Selected"; } ?> value ="<?php echo $resD[$i]['IdDomaine'] ?>"><?php echo $resD[$i]['Intitule_domaine'] ?></option>     
                        <?php
                            }
                        ?>
                        </select>
                  </div>
                  <button type="submit" class="btn btn-primary btn-block" value="<?php echo $action?>" name="action">Créer</button>                  
                </form>
            </div>
            <div class="col-sm-4"></div>
        </div>
      </div>

      <div class="container" id="Gestionnaires" style="display:none;">
        <br>
          <div class="col-sm-4"></div>
          <div class="col-sm-4">
              <br>
              <form action="ActionUtilisateur.php">
                <div class="form-group">
                  <label for="email">Numéro superUser</label>
                  <input type="text" class="form-control" id="email" placeholder="21575407..." name="IdA" value ='<?php echo $IdA ?>'>
                </div>
                <div class="form-group">
                    <label for="email">Nom</label>
                    <input type="text" class="form-control" id="email" placeholder="Nom..." name="NomA" value ='<?php echo $NomA ?>'>
                </div>
                <div class="form-group">
                    <label for="email">Prénom</label>
                    <input type="text" class="form-control" id="email" placeholder="Prénom..." name="PrenomA" value ='<?php echo $PrenomA ?>'>
                </div>
                <div class="form-group">
                    <label for="email">Mot de passe</label>
                    <input type="text" class="form-control" id="email" placeholder="mot de passe..." name="MdpA" value ='<?php echo $MdpA ?>'>
                </div> 
                <div class="form-group">
                    <label for="email">Statut</label>
                    <select class="form-control" id="sel1" name ='StatutA' required >
                       <?php if($StatutA == "Administrateur"){ $selectAd= "Selected"; $selectGe ="";$Noselect =""; }else {   if($StatutA == "Gestionnaire"){ $selectGe= "Selected"; $selectAd ="";$Noselect =""; }else { $selectAd="" ;$selectGe=""; $Noselect ="Selected"; }}?> 
                        <option<?php echo $Noselect ?> >Choisir Statut..</option>
                        <option <?php echo $selectGe ?> value ='Gestionnaire'>Gestionnaire</option>
                        <option <?php echo $selectAd ?> value ='Administrateur'>Administrateur</option>
                      </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block" value="<?php echo $action?>" name="action">Créer</button>          
                
              </form>
          </div>
          <div class="col-sm-4"></div>
      </div>

    <footer class="container-fluid"></footer>

    <script>
        function afficherEtudiant(){
            document.getElementById("Etudiants").style.display = "block";
            document.getElementById("Enseignants").style.display = "none";
            document.getElementById("Gestionnaires").style.display = "none";
        }
        function afficherEnseignant(){
            document.getElementById("Etudiants").style.display = "none";
            document.getElementById("Enseignants").style.display = "block";
            document.getElementById("Gestionnaires").style.display = "none";
        }
        function afficherGestionnaire(){
            document.getElementById("Etudiants").style.display = "none";
            document.getElementById("Enseignants").style.display = "none";
            document.getElementById("Gestionnaires").style.display = "block";
        }
    </script>
  </body>
</html>
