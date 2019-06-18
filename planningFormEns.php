<?php
//index.php

require ('fonctionsUtiles.php');
$formation= RecupFormation();

$Nom = $_SESSION['Nom'];
$Prenom = $_SESSION['Prenom'];


if(!empty($_GET['idf'])){
$idf=$_GET['idf'];
$_SESSION['idf']=$idf;



}else{
    $idf="";
   

}

if(!empty($_SESSION['idf'])){
$idfs = $_SESSION['idf'] ; 
}else {
     $idfs="";
}

$cspe=RecupCSPE();
?>
<!DOCTYPE html>
<html> 
    <head>
        <meta charset="UTF-8"> 
        <title>Jquery Fullcalandar Integration with PHP and Mysql</title>

          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="fullCalendar.js"></script>
  <link rel="stylesheet" href="style.css">

  
  <script>
       
  $(document).ready(function() {
 
   var calendar = $('#calendar').fullCalendar({
     
       height:735,
       titleFormat:'DD MMMM YYYY',
       columnFormat:'dddd DD/MM',
         monthNamesShort:['Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Juin', 'Jui', 'Aout', 'Sep', 'Oct', 'Nov', 'Dec'],
       monthNames:['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet','Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre'],
       dayNames:['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
       dayNamesShort:['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'],
    buttonText: {
        prev: "Précédent",
        next: "Suivant",
        today: "Aujourd'hui",
        year: "Année",
        month: "Mois",
        day: "Jour",
        list: "Mon planning"
        },
    firstDay:1,
    hiddenDays:[0],
    minTime:"07:00:00",
    maxTime:"20:00:00",
    allDaySlot:false,
    defaultView:'agendaWeek', 

    slotLabelFormat:"HH:mm",
    header:{
        left:'prev,next today',
        center:'title',
        right:" ",
    },
    
    events: 'load_form.php',
    editable:false,
    

   });
  });
    
  </script>
</head>
 <body>
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
  
     <div class="row" style="height:5%;width:100%;"></div>
 
        
  
  <div class="row" style="width:100%;">
      <div class="col-sm-1">
      </div>
       <div class="col-sm-2">
          
           <div class=" well" style="height:28%;"></div>
           <div   class="jumbotron"class="well">

           <center><label  for="sel1">Paramètres d'affichage :</label></center>
             
               <form  action ='planningForm.php'>
               <label   for="sel1">Formation :</label>
                <select size="10" class="form-control"  name="idf" >
              <option value ='' >Selectionnez une formation</option>
               <?php             
                  for($i=0;$i<=count($formation)-1;$i++){
              ?>
                  <Option <?php if($idfs == $formation[$i]['IdF'] ){echo "selected";}  ?>  value ="<?php echo $formation[$i]['IdF'] ?>"><?php echo $formation[$i]['IntituleF'] ?></option>     
              <?php
                  }
              ?>
                </select>        
        <br>
        <center><input class="btn btn-primary" type ='submit'  value ='Valider'></center>
                  </form>
           
           </div>
        
       </div>
      <div class="col-sm-8">  
  <div class="container">
       
      <center><h2 style='font-weight:bold' >Gestion planning</h2></center>
      <br>
     
   <div id="calendar"><script></script></div>
     </div>
      <div class="col-sm-1"></div>
  </div>
  </div>
 </body>
</html>

