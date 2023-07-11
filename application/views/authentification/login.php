<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> Admin</title>
</head>

<body style="background-color:">

    <div class="auth-form-light text-left py-5 px-4 px-sm-5" style="margin-top:15%">
        <h4>Bonjour! Bienvenue</h4>
        <form class="pt-3" method="post" action="<?php echo base_url("index.php/HomeController/login")?>">
        <div class="form-group">
            <input type="email" name="mail"  class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username">
        </div>
        <div class="form-group">
            <input type="password" name="mdp"class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="mt-3">
            <input type="submit"  value="SIGN IN" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
        </div>
        </form>
    </div>
  
</body>
</style>
</html>

