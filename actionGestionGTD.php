<?php
require('FonctionGestionGTD.php');

if(!empty($_GET['NumEtu'])){
    $IdE = $_GET['NumEtu'];
    $IdGTD = $_GET['IdGTD'];
    $IdF =  $_GET['IdFs'];
    $AjoutEtu = AjouterEtudiantGroupeTD($IdE,$IdGTD,$IdF);

    header("Location:".$AjoutEtu);
}

if(!empty($_GET['NumEtuSupp'])){
    $IdE = $_GET['NumEtuSupp'];
    $IdGTD = $_GET['IdGTD'];
    $IdF =  $_GET['IdFs'];
    $EnleveEtu = EnleverEtudiantGroupeTD($IdE,$IdGTD,$IdF);

    header("Location:".$EnleveEtu);
}