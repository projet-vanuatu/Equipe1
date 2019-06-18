
    <?php
    require('connexion.php');
   



        if(!empty($_GET))
    {
        $ID= $_GET['login'];
        $Mdp= $_GET['pwd'];
        $NomPage= VerifierID_et_Mdp($ID,$Mdp);
        header('Location:'.$NomPage);
        
    }


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
        <link rel="stylesheet" href="style.css">
        <script src="javascript.js"></script>
        <title>Title of the document</title>
    </head>
    <body id="PageConnexion">
        <div class="wrapper fadeInDown">
            <div id="formContent">
                <!-- Icon -->
                <div class="fadeIn first">
                    <img src="logo.JPG" id="icon" alt="User Icon" />
                </div>
                <!-- Login Form -->
                <form method='GET' action="">
                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8" style="padding:20px;">
                            <div class="fadeIn second form-group">
                                <!--<label for="email">Email address:</label>-->
                                <input type="text" name ="login" class="form-control" id="identifiant" placeholder="Identifiant" style="text-align:center;" required="true">
                            </div>
                            <div class="fadeIn third form-group">
                                <!--<label for="pwd">Password:</label>-->
                                <input type="password" name="pwd" class="form-control" id="pwd" placeholder="Mot de passe" style="text-align:center;" required="true">
                            </div>
                            <button type="submit" class="btn btn-lg btn-block btn-sm" style="background-color: #FCA848;">Connexion</button>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                </form>    
            </div>
        </div>
     
    </body>
</html>