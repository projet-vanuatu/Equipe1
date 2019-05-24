<?php
session_start();
$Nom = $_SESSION['Nom'];
$Prenom = $_SESSION['Prenom'] ;
$ID = $_SESSION['ID'] ;
?>
<html lang="en">
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
        <link rel="stylesheet" href="style.css">
        <script src="javascript.js"></script>
        <title>Title of the document</title>
    </head>

    <body class="bg-global">
        <div class="myNavbar">
            <div class="navbar-header">
                <img src="logo.JPG" alt="Logo" style="width:52px;">
            </div>
            <a href="#">Accueil</a>
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
      
    <footer class="container-fluid">
             <?php $nompage =  $_SERVER['HTTP_REFERER'];
             echo $nompage;?>
    </footer>


    </body>
</html>
