<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="View/style/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="View/style/main.css" />
    <link rel="icon" type="image/png" href="View/misc/icon.png">
    <script src="Model/check_form.js"></script>

  </head>

  <body>
    <div class="container">
      <div class="offset-lg-3 col-lg-6 reg-form">
        <div class="bold">
          <h1>Inscription</h1>
        </div>
        <form method="POST" onsubmit= "return valid_form(this)">
          <div class="form-group">
            <label>Surnom</label>
            <input type="text" name="username" class="form-control" onkeyup = "verif_username(this)"/>
          </div>

          <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control" onkeyup = "verif_mail(this)"/>
          </div>

          <div class="form-group">
            <label>Nom</label>
            <input type="text" name="lastname" class="form-control" onkeyup = "verif_lastname(this)"/>
          </div>

          <div class="form-group">
            <label>Prénom</label>
            <input type="text" name="firstname" class="form-control" onkeyup = "verif_firstname(this)"/>
          </div>

          <div class="form-group">
            <label>Mot de passe</label>
            <input type="password" name="password" class="form-control" onkeyup = "password_checker(this)"/>
          </div>

          <div class="form-group">
            <label>Confirmez votre mot de passe</label>
            <input type="password" name="password_confirm" class="form-control" onBlur = "verif_password(this);"/>
          </div>

          <button type="submit" class="btn btn-primary">S'inscrire</button>

        </form>
      </div>

    </div>

  </body>

</html>