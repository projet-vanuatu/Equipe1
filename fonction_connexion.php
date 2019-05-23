
<?php
define("SERVEUR_HTTP","localhost");
define("ID","21100905");
define("DB","db_21100905");
define("MDP","35952H");
session_start();
 function ConnectDB()
 {
    $connexion=mysqli_connect(SERVEUR_HTTP,ID,MDP) or die("Problème de connexion".mysqli_connect_error());
    $session=mysqli_select_db($connexion,DB) or die("Problème d'ouverture de la BD".mysqli_connect_error());
    return $connexion;
 }
 
 function ConnectPDO(){
       $conn = new PDO("mysql:host=".SERVEUR_HTTP.";dbname=".DB, ID, MDP);
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       return $conn;
 }
 
  function VerifierID_et_Mdp($ID,$Mdp)
  {
            $cx=ConnectDB();

            $sql="SELECT  e.IdE , e.NomE , e.PrenomE
                   FROM ETUDIANT e , CODES c  
                   WHERE e.IdMdp = c.IdMdp 
                   AND IdE = '$ID' 
                   AND Mdp = '$Mdp'";

            $query=mysqli_query($cx,$sql);
            $tab = mysqli_fetch_array($query);
            $sql1="SELECT e.IdEns , e.NomEns , e.PrenomEns
                   FROM ENSEIGNANT e , CODES c  
                   WHERE e.IdMdp = c.IdMdp 
                   AND IdENS = '$ID' 
                   AND Mdp = '$Mdp'";
                   
           

            $query1=mysqli_query($cx,$sql1);
            $tab1 = mysqli_fetch_array($query1);
            
           $sql2="SELECT a.IdA , a.NomA , a.PrenomA  , a.StatutA
                 FROM ADMINISTRATION a , CODES c  
                 WHERE a.IdMdp = c.IdMdp 
                 AND IdA = '$ID' 
                 AND Mdp = '$Mdp'";
           
           $query2=mysqli_query($cx,$sql2);
           $tab2 = mysqli_fetch_array($query2);
	 
        if (mysqli_num_rows($query)==1)
        {
            $_SESSION['ID'] = $tab2['IdE'];
            $_SESSION['Nom'] = $tab2['NomE'];
            $_SESSION['Prenom'] = $tab2['PrenomE'];
            return $NomPage = "PageEtu.html";
        }
                    
       else
       {
            
                if (mysqli_num_rows($query1)==1)
            {
               $_SESSION['ID'] = $tab2['IdENS'];
               $_SESSION['Nom'] = $tab2['NomENS'];
               $_SESSION['Prenom'] = $tab2['PrenomENS'];
               return $NomPage = "PageEns.html";
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
 
  
 
  ?>