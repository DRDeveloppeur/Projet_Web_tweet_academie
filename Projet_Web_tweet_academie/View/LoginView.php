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
    <script src="main.js"></script>

  </head>

  <body>
    <header>

    </header>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6 left">
          <div class="offset-lg-4 col-lg-6 middle">

            <h5 class="bold">Suivez vos passions.</h5>
            <h5 class="bold">Découvrez ce dont les gens parlent.</h5>
            <h5 class="bold">Rejoignez la conversation.</h5>

          </div>
        </div>
        <div class="col-lg-6 right">


          <div class="offset-lg-2 col-lg-8 login-form">

            <form method="POST">
              <div class="row">
                <div class="form-group col-lg-4">
                  <input type="text" name="email" class="form-control" placeholder="Email ou nom d'utilisateur" />
                </div>
                <div class="form-group col-lg-4">
                  <input type="password" name="password" class="form-control" placeholder="Mot de passe" />
                  <small id="passForgot" class="form-text text-muted">
									<a class="grey" href="">J'ai oublié mon mot de passe?</a></small>
                </div>
                <button type="submit" class="btn btn-outline-dark btn-38 col-lg-3">Connexion</button>
              </div>
            </form>

            <div class="offset-lg-2 col-lg-9 login-form under-log">
              <img src="View/misc/icon.png" width="60px" alt="logo site">
              <h3 class="bold">
                Découvrez ce qui se passe dans le monde en temps réel
              </h3>
              <div class="jump">
                <h6 class="bold homep">Rejoignez Twitter aujourd'hui.</h6>
              </div>
              <div class="jump">
                <a href="index.php?c=register">
                  <button class="btn btn-primary btn-38 col-lg-10">S'inscrire</button>
                </a>
              </div>
              <div class="jump-btn">
                <button class="btn btn-outline-dark btn-38 col-lg-10">Se connecter</button>
              </div>

            </div>


          </div>
        </div>
      </div>
    </div>
    <footer class="footer">
      <div class="foot">
        <small>
          <a class="grey" href="#">À propos</a>
          <a class="grey" href="#">Centre d'assistance</a>
          <a class="grey" href="#">Blog </a>
          <a class="grey" href="#">État du service</a>
          <a class="grey" href="#">Offres d'emploi</a>
          <a class="grey" href="#">Conditions</a>
          <a class="grey" href="#">Politique de confidentialité</a>
          <a class="grey" href="#">Cookies</a>
          <a class="grey" href="#">Informations sur la publicité</a>
          <a class="grey" href="#">Marque</a>
          <a class="grey" href="#">Applications</a>
          <a class="grey" href="#">Publicité</a>
          <a class="grey" href="#">Marketing</a>
          <a class="grey" href="#">Professionnels</a>
          <a class="grey" href="#">Développeurs</a>
          <a class="grey" href="#">Annuaire</a>
          <a class="grey" href="#">Paramètres</a>
          © 2018 Twitter</small>
      </div>
    </footer>
  </body>

</html>
