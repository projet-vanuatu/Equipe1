<?php

//load.php

$connect = new PDO("mysql:host=localhost;dbname=db_21100905", '21100905', '35952H');
Require 'fonctionsUtiles.php';
$idens = $_SESSION['idens'];
$idf=$_SESSION['idf'];
$NumS = RecupNumS($idens,$idf);
$res1 = Recupinfo($NumS);

$data = array();



$result = $res1;


if(!empty($result)){
foreach($result as $row)
{
 $data[] = array(
    'id'   => $row[0]["NumS"],
    'start'   => $row[0]["DateDebutSeance"],
    'groupe'  => $row[0]["groupe"],
    'title'   => utf8_encode($row[0]["title"]),
    'nomS'   => utf8_encode($row[0]["NomS"]),
    'end'   => $row[0]["DateFinSeance"],
    'nomens'=> utf8_encode($row[0]['NomENS']),
    'prenomens'=> utf8_encode($row[0]['PrenomENS']),
    'site'=> utf8_encode($row[0]['NomSITE']),
    'NomF'=> utf8_encode($row[0]['IntituleF']),
     'color'=> $row[0]['couleur'],

     
         


 );
}
}else{$data = array();
        
}

echo utf8_encode (json_encode($data));

?>
