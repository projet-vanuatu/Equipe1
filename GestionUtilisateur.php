<!DOCTYPE html>
<?php
    require('FonctionUtilisateur.php');
    $resListEtu = AfficherListeEtudiant();
    $resListEns = AfficherListeEnseignant();
    $resListAdmin = AfficherListeAdmin();
    $Nom = $_SESSION['Nom'];
    $Prenom= $_SESSION['Prenom'];
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
                <a href="CreerUtilisateur.php">Utilisateurs</a>
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
                    <a href="GestionUtilisateur.php">Utilisateurs</a>
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
                    <a href = "index.php" class="subnavbtn2">Deconnection&nbsp;<span class="glyphicon glyphicon-log-in"></span></a>
            </div>
            <div class="subnav2">
                <button class="subnavbtn3"><span class="glyphicon glyphicon-user"></span>&nbsp;<?php
       
        echo($Nom." ".$Prenom);
        ?></button>
            </div>
        </div>
            
        <br>
        <br>

        <!-- Page -->
        <!-- style="color: #352109; font-size: 15px;" -->
        <div class="container">
            <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link acstive" onclick="afficherEtudiant();">Etudiants</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onclick="afficherEnseignant()">Enseignants</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onclick="afficherGestionnaire();">Administrateurs/Gestionnaires</a>
                    </li>
            </ul>
        </div>

        <br>

        <!-- Sub nav -->
        <div class="container" id="etudiants" style="display:block;">
            <div class="row">
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="myInput" onkeyup="myFunction();" placeholder="Rechercher.." title="">
                </div>
                <div class="col-sm-4">
                    <a href = "CreerUtilisateur.php"><button type="button" class="btn btn-primary">Créer étudiant</button></a>
                </div>
            </div>

            <br>
            
            <div class="table-wrapper-scroll-y my-custom-scrollbar" >
                <table class="table table-hover" id="myTable">
                    <thead class="header">
                        <tr>
                            <th>Identifiant</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Formation</th>
                            <th>Groupe TD</th>
                            <th>Edition</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                                <?php             
                for($i=0;$i<=count( $resListEtu)-1;$i++){
            ?>
                        <tr>
                         <td><?php echo $resListEtu[$i]['IdE'] ?></td>
                            <td><?php echo  $resListEtu[$i]['NomE'] ?></td>
                            <td><?php echo  $resListEtu[$i]['PrenomE'] ?></td>
                            <td><?php echo  $resListEtu[$i]['IntituleF'] ?></td>
                            <td><?php echo  $resListEtu[$i]['NumGroupCM'] ?></td>
                            <td><p><a href = "CreerUtilisateur.php"> <button type="button" class="btn btn-warning">Modifier</button></a>
                                    <a href ="<?php echo "ActionUtilisateur.php?IdESupp=".$resListEtu[$i]['IdE']."&Type=SupprimerEtudiant&IdMdp=".$resListEtu[$i]['IdMdp']; ?>"> <button type="button" class="btn btn-danger">Supprimer</button></a></p></td>
                        </tr>
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
                    <a href = "CreerUtilisateur.php"><button  type="button" class="btn btn-primary">Créer enseignant</button></a>
                </div>
            </div> 

            <br>
                
            <div class="table-wrapper-scroll-y my-custom-scrollbar">
                <table class="table table-hover" id="myTable">
                    <thead class="header">
                        <tr>
                            <th>Identifiant</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Statut</th>
                            <th>Domaine</th>
                            <th>Edition</th>
                              <?php             
                for($i=0;$i<=count($resListEns)-1;$i++){
            ?>
                        <tr>
                         <td><?php echo $resListEns[$i]['IdEns'] ?></td>
                            <td><?php echo  $resListEns[$i]['NomEns'] ?></td>
                            <td><?php echo  $resListEns[$i]['PrenomEns'] ?></td>
                            <td><?php echo  $resListEns[$i]['TypeEns'] ?></td>
                            <td><?php echo  $resListEns[$i]['Intitule_domaine'] ?></td>
                            <td><p><a href = "<?php echo "CreerUtilisateur.php?IdEnsModif=".$resListEns[$i]['IdEns']; ?>"> <button type="button" class="btn btn-warning" value ='<?php echo  $resListEns[$i]['IdEns'] ?>'>Modifier</button></a>
                                    <a href ="<?php echo "ActionUtilisateur.php?IdESupp=".$resListEns[$i]['IdEns']."&Type=SupprimerEnseignant&IdMdp=".$resListEns[$i]['IdMdp']; ?>"><button type="button" class="btn btn-danger" value ='<?php echo  $resListEns[$i]['IdEns'] ?>'>Supprimer</button></a></p></td>
                        </tr>
            <?php
                }
            ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="container" id="admin" style="display:none;">
            <div class="row">
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="myInput" onkeyup="myFunction();" placeholder="Rechercher.." title="">
                </div>
                <div class="col-sm-4">
                    <a href = "CreerUtilisateur.php"><button type="button" class="btn btn-primary" >Créer super utilisateur</button></a>
                </div>
            </div>
            <br>        
            <div class="table-wrapper-scroll-y my-custom-scrollbar">
                <table class="table table-hover" id="myTable">
                    <thead class="header">
                        <tr>
                            <th>Identifiant</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Statut</th>
                            <th>Edition</th>
                        </tr>
                    </thead>
                    <tbody>
                                    <?php             
                           for($i=0;$i<=count($resListAdmin)-1;$i++){
                                    ?>
                                   <tr>
                                       <td><?php echo $resListAdmin[$i]['IdA'] ?></td>
                                       <td><?php echo  $resListAdmin[$i]['NomA'] ?></td>
                                       <td><?php echo  $resListAdmin[$i]['PrenomA'] ?></td>
                                       <td><?php echo  $resListAdmin[$i]['StatutA'] ?></td>
                                       <td><p><a href = "CreerUtilisateur.php"><button type="button" class="btn btn-warning" value ='<?php echo  $resListAdmin[$i]['IdA'] ?>'>Modifier</button></a>
                                               <a href ="<?php echo "ActionUtilisateur.php?IdESupp=".$resListAdmin[$i]['IdA']."&Type=SupprimerAdmin&IdMdp=".$resListAdmin[$i]['IdMdp']; ?>"><button type="button" class="btn btn-danger" value ='<?php echo  $resListAdmin[$i]['IdA'] ?>'>Supprimer</button></a></p></td>
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
            function afficherEtudiant(){
                document.getElementById("etudiants").style.display = "block";
                document.getElementById("enseignants").style.display = "none";
                document.getElementById("admin").style.display = "none";

            }
            function afficherEnseignant(){
                document.getElementById("etudiants").style.display = "none";
                document.getElementById("enseignants").style.display = "block";
                document.getElementById("admin").style.display = "none";
            }
            function afficherGestionnaire(){
                document.getElementById("etudiants").style.display = "none";
                document.getElementById("enseignants").style.display = "none";
                document.getElementById("admin").style.display = "block";
            }
        </script>
    </body>
</html>