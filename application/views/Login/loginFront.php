<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <link href="<?php echo site_url("assets/bootstrap-5.0.2-dist/css/bootstrap.min.css") ?>" rel="stylesheet">
    <link href="<?php echo site_url("assets/Login.css") ?>" rel="stylesheet">
    <title>Login form</title>
</head>
<body>    
  <div class="form_login">
    
          <h1>Connectez-vous!</h1>
          <?php if(  isset($mailfaux) ){ ?>
              <form action="<?php echo site_url('Login/ValiderLogin')?>" method="post">
                <div class="form-group">
                  <Label>Email : </Label>
                  <input class="form-control" type="text" name="email" value="<?php echo $mailfaux ?>">
                </div>
                <div class="form-group">
                  <Label>Mot de passe :</Label> 
                  <input class="form-control" type="password" name="mdp">
                </div>
                <div class="form-group">
                  <input class="form-control btn btn-primary" type="submit" value="Se connecter">
                </div>
                <div class="erreur">mot de passe ou email incorrecte</div>
              </form>
          <?php } else{ ?>
            <form action="<?php echo site_url('Login/ValiderLogin')?>" method="post">
                <div class="form-group">
                  <Label>Email : </Label>
                  <input class="form-control" type="text" name="email">
                </div>
                <div class="form-group">
                  <Label>Mot de passe : </Label>
                  <input class="form-control" type="password" name="mdp">
                </div>
                <div class="form-group">
                  <input class="form-control btn btn-primary" type="submit" value="Se connecter">
                </div>
            </form>
        <?php  } ?>
  </div>          
</body>
</html>










