<?php
require('FonctionMateriel.php');
// Récupération du nom de la personne connectée

$Nom = $_SESSION['Nom'];
$Prenom= $_SESSION['Prenom'];
$resListMat = AfficherMateriel(); 
$resListMat2 =  AfficherMateriel1();

?>
<html>
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
        <link rel="stylesheet" href="style.css" type ='text/css'>
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
                <button class="subnavbtn3"><span class="glyphicon glyphicon-user"></span>&nbsp;<?php
       
        echo($Nom." ".$Prenom);
        ?></button>
            </div>
        </div>

       
            <div class="container" >
            <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link acstive " onclick="afficherMaterielEquipe();">Matériel équipé dans une salle</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  " onclick="afficherMateriel();">Matériel non équipé dans une salle </a>
                    </li>
                  
            </ul>
        </div>
            <div class="container">
              <br>
              <center><h4>Gestion du matériel :</h4><center>
            <br>
        </div>
        <div class="container" id="etudiants" style="display:block;">
            <div class="row">
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="myInput" onkeyup="myFunction();" placeholder="Rechercher.." title="">
                </div>
                <div class="col-sm-4">
                    <a href = "CreerMateriel.php?action=creer"><button type="button" class="btn btn-primary">Créer matériel</button></a>
                </div>
            </div>

            <br>
             
            <div class="table-wrapper-scroll-y my-custom-scrollbar" >
                <table class="table table-hover" id="myTable">
                    <thead class="header">
                        <tr>
                            <th>Identifiant</th>
                            <th>Type</th>
                            <th>Etat de fonctionnement</th>
                            <th>Salle</th>
                              <th>Site</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        
                                <?php             
                for($i=0;$i<=count( $resListMat)-1;$i++){
            ?>
                        <tr>
                            <td><?php echo $resListMat[$i]['IdMat'] ?></td>
                            <td><?php echo  $resListMat[$i]['TypeMat'] ?></td>
                            <td><?php echo  $resListMat[$i]['Etat_fonctionnement'] ?></td>
                            <td><?php echo  $resListMat[$i]['NomS'] ?></td>
                            <td><?php echo  $resListMat[$i]['NomSITE'] ?></td>
                            <td><p><a href =  "<?php echo "CreerMateriel.php?equipe=Oui&action=modifier&IdMat=".$resListMat[$i]['IdMat']; ?>"> <button type="button" class="btn btn-warning">Modifier</button></a>
                                    <a href ="<?php echo "ActionMateriel.php?IdMatSupp=".$resListMat[$i]['IdMat']?>"> <button type="button" class="btn btn-danger">Supprimer</button></a></p></td>
                        </tr
            <?php
                }
            ?>
                           
                       
                        
                    </tbody>
                </table>
            </div>
        </div>
            <div class="container" id="enseignants" style="display:none;">
            <div class="row">
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="myInput" onkeyup="myFunction();" placeholder="Rechercher.." title="">
                </div>
                <div class="col-sm-4">
                    <a href = "CreerMateriel.php?action=creer"><button type="button" class="btn btn-primary">Créer matériel</button></a>
                </div>
            </div>

            <br>
             
            <div class="table-wrapper-scroll-y my-custom-scrollbar" >
                <table class="table table-hover" id="myTable">
                    <thead class="header">
                        <tr>
                            <th>Identifiant</th>
                            <th>Type</th>
                            <th>Etat de fonctionnement</th>
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                        
                                <?php             
                for($i=0;$i<=count( $resListMat2)-1;$i++){
            ?>
                        <tr>
                            <td><?php echo $resListMat2[$i]['IdMat'] ?></td>
                            <td><?php echo  $resListMat2[$i]['TypeMat'] ?></td>
                            <td><?php echo  $resListMat2[$i]['Etat_fonctionnement'] ?></td>
                           
                            <td><p><a href =  "<?php echo "CreerMateriel.php?equipe=Non&action=modifier&IdMat=".$resListMat2[$i]['IdMat']; ?>"> <button type="button" class="btn btn-warning">Modifier</button></a>
                                    <a href ="<?php echo "ActionMateriel.php?IdMatSupp=".$resListMat2[$i]['IdMat']?>"> <button type="button" class="btn btn-danger">Supprimer</button></a></p></td>
                        </tr>
            <?php
                }
            ?>
                           
                       
                        
                    </tbody>
                </table>
            </div>
        </div>
 <script>
            $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
            });
            function afficherMaterielEquipe(){
                document.getElementById("etudiants").style.display = "block";
                document.getElementById("enseignants").style.display = "none";
                

            }
            function afficherMateriel(){
                document.getElementById("etudiants").style.display = "none";
                document.getElementById("enseignants").style.display = "block";
                
            }
        
        </script>
    </body>
</html>