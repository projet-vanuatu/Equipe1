<?php

//delete.php

if(isset($_POST["id"]))
{
 $connect = new PDO("mysql:host=localhost;dbname=db_21100905", '21100905', '35952H');
  $query1 = "
 DELETE from DISPENSE WHERE NumS=:id
 ";
 $statement = $connect->prepare($query1);
 $statement->execute(
array(
   ':id' => $_POST['id']
  )
 );
  
          $query2 = "
 DELETE from RESERVER WHERE NumS=:id
 ";
 $statement = $connect->prepare($query2);
 $statement->execute(
  array(
   ':id' => $_POST['id']
  )
 );
  
 
 $query3 = "
 DELETE from SEANCES WHERE NumS=:id
 ";
 $statement = $connect->prepare($query3);
 $statement->execute(
  array(
   ':id' => $_POST['id']
  )
 );
}

?>