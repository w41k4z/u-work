<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?= base_url("assets/lib/bootstrap/css/bootstrap.min.css") ?>">
    <title> Admin</title>
</head>

<body>

    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
        <h4>Bonjour! Bienvenue</h4>
        <form class="pt-3" method="post" action="<?php echo base_url("index.php/HomeController/login") ?>">
            <div class="form-group">
                <input type="email" name="mail" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username" value="alainricor@gmail.com">
            </div>
            <div class="form-group">
                <input type="password" name="mdp" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" value="1234">
            </div>
            <div class="mt-3">
                <input type="submit" value="SIGN IN" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
            </div>
        </form>
    </div>

</body>
</style>

</html>