 <nav class="navbar navbar-expand-sm fixed-top navbar-dark bg-dark">
    <div class="container">
      <a class="link home" href="index.php?c=home">Accueil</a>
      <a class="link" href="index.php?c=notifications">Notifications</a>
      <a class="link mes" href="#">Messages</a>
      <a class="offset-lg-3" href="#haut"><img src="https://upload.wikimedia.org/wikipedia/fr/thumb/c/c8/Twitter_Bird.svg/1259px-Twitter_Bird.svg.png" width="20px" alt="Tweeter"></a>
      <div class="dropdown offset-lg-2">
        <button class="dropbtn" onclick="drop()">
          <img src="<?= $_SESSION['avatar'] ?>" alt="Profile"
          class="profil dropimg">
        </button>
        <div id="myDropdown" class="dropdown-content">
          <a href="index.php?c=profile">Profil</a>
          <a href="index.php?c=dec">Se déconnecter</a>
        </div>
      </div>
      <form class="form col-lg-3">
        <div class="row">
          <input class="button search" placeholder="Rechercher" id="tags" onkeyup="search()" />
          <button class="btn-primary tweet tweetwind" type="button" name="Tweet" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><strong>Tweeter</strong></button>
        </div>
      </form>
    </div>
  </nav>
