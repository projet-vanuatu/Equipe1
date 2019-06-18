<?php
define("SERVEUR_HTTP","localhost");
define("ID","21100905");
define("DB","db_21100905");
define("MDP","35952H");
session_start();


 function ConnectDB(){
    $connexion=mysqli_connect(SERVEUR_HTTP,ID,MDP) or die("Problème de connexion".mysqli_connect_error());
    $session=mysqli_select_db($connexion,DB) or die("Problème d'ouverture de la BD".mysqli_connect_error());
    return $connexion;
 }

 function dbConnect(){
    $servername = 'localhost';
    $db = 'db_21100905';
    $username = '21100905';
    $password = '35952H';
    $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;  
 }
 
  function VerifierID_et_Mdp($ID,$Mdp)
  {
            $cx=ConnectDB();

            $sql="SELECT  e.IdE , e.NomE , e.PrenomE
                   FROM ETUDIANT e , CODES c  
                   WHERE e.IdMdp = c.IdMdp 
                   AND e.IdE = '$ID' 
                   AND c.Mdp = '$Mdp'";
            $query=mysqli_query($cx,$sql);
            $tab = mysqli_fetch_array($query);
            
            
            $req="SELECT e.IdENS , e.NomENS , e.PrenomENS
                   FROM ENSEIGNANT e , CODES c  
                   WHERE e.IdMdp = c.IdMdp 
                   AND e.IdENS = '$ID' 
                   AND c.Mdp = '$Mdp'";
            $res=mysqli_query($cx,$req);
            $resultat = mysqli_fetch_array($res);
            
           $sql2="SELECT a.IdA , a.NomA , a.PrenomA  , a.StatutA
                 FROM ADMINISTRATION a , CODES c  
                 WHERE a.IdMdp = c.IdMdp 
                 AND a.IdA = '$ID' 
                 AND c.Mdp = '$Mdp'";    
           $query2=mysqli_query($cx,$sql2);
           $tab2 = mysqli_fetch_array($query2);
	 
        if (mysqli_num_rows($query)==1)
        {
            $_SESSION['ID'] = $tab['IdE'];
            $_SESSION['Nom'] = $tab['NomE'];
            $_SESSION['Prenom'] = $tab['PrenomE'];
            return $NomPage = "homeEtu.php";
        }
                    
       else
       {
            
                if (mysqli_num_rows($res)==1)
            {
               $_SESSION['ID'] = $resultat['IdENS'];
               $_SESSION['Nom'] = $resultat['NomENS'];
               $_SESSION['Prenom'] = $resultat['PrenomENS'];
               return $NomPage = "homeEns.php";
            }
                else
                {


                    if (mysqli_num_rows($query2)==1)
                    {
                           if($tab2['StatutA']== "Administrateur")
                           {
                            $_SESSION['ID'] = $tab2['IdA'];
                            $_SESSION['Nom'] = $tab2['NomA'];
                            $_SESSION['Prenom'] = $tab2['PrenomA'];
                            return $NomPage = "homeAdmin.php";
                           }
                           else
                           {
                               $_SESSION['ID'] = $tab2['IdA'];
                               $_SESSION['Nom'] = $tab2['NomA'];
                               $_SESSION['Prenom'] = $tab2['PrenomA'];
                               return $NomPage = "homeGestionnaire.php";
                           }

                    }
                    else 
                    {
                       return $NomPage="index.php";
                    }
                }
                    

       }                            
  }