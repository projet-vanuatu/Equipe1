<?php

function BarreRecherche($Name){
    

        $fonction =" $(document).ready(function(){
                $('#$Name').on('keyup', function() {
                    var value = $(this).val().toLowerCase();
                    $('#myTable tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
                });";
        return $fonction;
    }

           
    
function ecrire_log($errtxt){
         $fp = fopen('k:\Fichier.txt','a+'); // ouvrir le fichier ou le créer
         var_dump($fp);
         die();
         fseek($fp,SEEK_END); // poser le point de lecture à la fin du fichier
         $nouverr=$errtxt."\r\n"; // ajouter un retour à la ligne au fichier
         fputs($fp,$nouverr); // ecrire ce texte
         fclose($fp); //fermer le fichier
 }
?>

<select multiple class="form-control" id="sel2" style="height:400px;">
              <?php
               for($i=0;$i<=count($LisGroupeEtu)-1;$i++){
                ?>
                          <Option value ="<?php echo $LisGroupeEtu[$i]['IdE']?>"><?php echo $LisGroupeEtu[$i]['IdE']." ".$LisGroupeEtu[$i]['NomE']." ".$LisGroupeEtu[$i]['PrenomE']?></option>     
                <?php
                    }
                ?> 
            </select>