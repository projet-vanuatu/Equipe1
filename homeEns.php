<?php
 session_start();
  $Nom=$_SESSION['Nom'];
  $Prenom = $_SESSION['Prenom'];

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
        <link rel="stylesheet" href="style.css">
        <script src="javascript.js"></script>
        <title>Title of the document</title>
    </head>

    <body class="bg-global">
       <div class="myNavbar">
          <div  style="float:left;">
              
    <img   src="logo.JPG" alt="Logo" style="width:52px;">
  
             
          </div>
          <a href="homeEtu.php">Accueil</a>
          <a href="consulterPlanningEns.php">Planning personnel</a>
             <a href="">Mes reservations</a>
          <a href="">Liste des étudiants</a>
          <div class="subnav">
              <button class="subnavbtn">Consulter planning &nbsp;<i class="fa fa-caret-down"></i></button>
              <div class="subnav-content">
                  <a href="planningFormEns.php">Par formation</a>
                  <a href="planningSalleEns.php">Par salle</a>
                  
              </div>
            </div>
            <div class="subnav2">
                <a href = "index.php" class="subnavbtn2">Deconnection&nbsp;<span class="glyphicon glyphicon-log-in"></span></a>
            </div>
            <div class="subnav2">
                <button class="subnavbtn3"><span class="glyphicon glyphicon-user"></span>&nbsp<?php echo $Nom; ?>&nbsp<?php echo $Prenom ?> </button>
            </div>
      </div>
        <footer class="container-fluid"></footer>
    </body>
</html>

