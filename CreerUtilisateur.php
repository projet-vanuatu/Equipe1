<?php
require('FonctionUtilisateur.php');
$resD = RecupererLesNomDeDomaines();
$resF = RecupererNomFormation();

$Nom = $_SESSION['Nom'];
$Prenom= $_SESSION['Prenom'];
if(!empty($_GET)){
       $IdEns= $_GET['IdEns'];
       $PrenomEns= $_GET['PrenomEns'];
       $NomEns= $_GET['NomEns'];
       $TypeEns= $_GET['Statut'];
       $IdDomaine= $_GET['IdDomaine'];
       $MdpEns= $_GET['MdpEns'];
       $InsererEnseignant = InsererEnseignant ($MdpEns,$IdEns,$NomEns,$PrenomEns,$TypeEns,$IdDomaine);
       header('Location:'.$InsererEnseignant);
 }
 if(!empty($_GET)){
       $IdE= $_GET['IdE'];
       $PrenomE= $_GET['PrenomE'];
       $NomE= $_GET['NomE'];
       $IdF= $_GET['IdF'];
       $MdpE= $_GET['MdpE'];
       $InsererEtudiant = InsererEtudiant ($MdpE,$IdE,$NomE,$PrenomE,$IdF);
       header('Location:'.$InsererEtudiant);
 }
  if(!empty($_GET)){
       $IdA= $_GET['IdA'];
       $PrenomA= $_GET['PrenomA'];
       $NomA= $_GET['NomA'];
       $StatutA= $_GET['StatutA'];
       $MdpA= $_GET['MdpA'];
       $InsererAdmin =InsererAdminGest ($MdpA,$IdA,$NomA,$PrenomA,$StatutA);
       header('Location:'.  $InsererAdmin);
       
 }
?>

<!--<pre>-->
    <?php
        //var_dump($res);
    ?>
<!--</pre>-->

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
        <link rel="stylesheet" href="../public/style.css">
        <script src="javascript.js"></script>
        <title>Title of the document</title>
    </head>

    <body>
        <div class="myNavbar">
            <div class="navbar-header">
                <img src="logo.JPG" alt="Logo" style="width:52px;">
            </div>
            <a href="../homeAdmin.html">Accueil</a>
            <div class="subnav">
                <button class="subnavbtn">Création &nbsp;<i class="fa fa-caret-down"></i></button>
                <div class="subnav-content">
                <a href="creationUtilisateurs.html">Utilisateurs</a>
                <a href="#company">Formations</a>
                <a href="#company">Salles</a>
                <a href="#company">Matériels</a>
                <a href="#company">Unités d'enseignements</a>
                <a href="#company">Matières</a>
                </div>
            </div> 
            <div class="subnav">
                <button class="subnavbtn">Gestion &nbsp;<i class="fa fa-caret-down"></i></button>
                <div class="subnav-content">
                    <a href="gestionUtilisateurs.html">Utilisateurs</a>
                    <a href="#company">Formations</a>
                    <a href="#company">Salles</a>
                    <a href="#company">Matériels</a>
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
                <a href = "../index.php" class="subnavbtn2">Deconnection&nbsp;<span class="glyphicon glyphicon-log-in"></span></a>
            </div>
            <div class="subnav2">
                <button class="subnavbtn3"><span class="glyphicon glyphicon-user"></span>&nbsp;<?php$Nom." "$Prenom ?></button>
            </div>
        </div>
        

        <br>
        <br>
        <div class="container">
            <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link acstive" onclick="afficherEtudiant();">Etudiants</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onclick="afficherEnseignant();">Enseignants</a>
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
            <form action="">
                <div class="form-group">
                  <label for="email">Numéro étudiant:</label>
                  <input type="text" class="form-control" id="email" placeholder="21575407..." name="IdE" required="">
                </div>
                <div class="form-group">
                  <label for="pwd">Nom:</label>
                  <input type="text" class="form-control" id="pwd" placeholder="Nom" name="NomE" required="">
                </div>
                <div class="form-group">
                  <label for="pwd">Prénom:</label>
                  <input type="text" class="form-control" id="pwd" placeholder="Prénom" name="PrenomE" required="">
                </div>
                <div class="form-group">
                  <label for="sel1">Formation:</label>
                  <select class="form-control" id="sel1" name ='IdF' required>
                    <option >Choisir une formation </option>
                    <?php             
                for($i=0;$i<=count($resF)-1;$i++){
            ?>
                          <Option value ="<?php echo $resF[$i]['IdF'] ?>"><?php echo $resF[$i]['IntituleF'] ?></option>     
            <?php
                }
            ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="pwd">Mot de passe:</label>
                  <input type="text" class="form-control" id="pwd" placeholder="Mot de passe" name="MdpE">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Créer</button>
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
                <form action="">
                  <div class="form-group">
                    <label for="email">Numéro enseignants</label>
                    <input type="text" class="form-control" id="email" placeholder="21575407..." name="IdEns" required="">
                  </div>
                  <div class="form-group">
                      <label for="email">Nom</label>
                      <input type="text" class="form-control" id="email" placeholder="Nom..." name="NomEns" required="">
                  </div>
                  <div class="form-group">
                      <label for="email">Prénom</label>
                      <input type="text" class="form-control" id="email" placeholder="Prénom..." name="PrenomEns"required="" >
                  </div>
                  <div class="form-group">
                      <label for="email">Mot de passe</label>
                      <input type="text" class="form-control" id="email" placeholder="mot de passe..." name="MdpEns" required="">
                  </div> 
                  <div class="form-group">
                      <label for="email">Statut</label>
                      <select class="form-control" id="sel1" name ="Statut" required="">
                          <option>Choisir Statut..</option>
                          <option value ="Enseignant">Enseignant</option>
                          <option value="Intervenant exterieur">Intervenant exterieur</option>
                        </select>
                  </div>
                  <div class="form-group">
                      <label for="email" >Domaine</label>
                      <select class="form-control" id="sel1" name="IdDomaine" required="">
                          <option>Choisir un domaine de compétence</option>
                         <?php             
                for($i=0;$i<=count($resD)-1;$i++){
            ?>
                          <Option value ="<?php echo $resD[$i]['IdDomaine'] ?>"><?php echo $resD[$i]['intitule_domaine'] ?></option>     
            <?php
                }
            ?>
                        </select>
                  </div>
                  <button type="submit" class="btn btn-primary btn-block">Créer</button>                  
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
              <form action="">
                <div class="form-group">
                  <label for="email">Numéro superUser</label>
                  <input type="text" class="form-control" id="email" placeholder="21575407..." name="IdA">
                </div>
                <div class="form-group">
                    <label for="email">Nom</label>
                    <input type="text" class="form-control" id="email" placeholder="Nom..." name="NomA">
                </div>
                <div class="form-group">
                    <label for="email">Prénom</label>
                    <input type="text" class="form-control" id="email" placeholder="Prénom..." name="PrenomA">
                </div>
                <div class="form-group">
                    <label for="email">Mot de passe</label>
                    <input type="text" class="form-control" id="email" placeholder="mot de passe..." name="MdpA">
                </div> 
                <div class="form-group">
                    <label for="email">Statut</label>
                    <select class="form-control" id="sel1" name ='StatutA' required >
                        <option >Choisir Statut..</option>
                        <option value ='Gestionnaire'>Gestionnaire</option>
                        <option value ='Administrateur'>Administrateur</option>
                      </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Créer</button>                  
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
