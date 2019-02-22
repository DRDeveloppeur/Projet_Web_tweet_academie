<!DOCTYPE html>
<html lang="en">

<?php include 'View/headerView.php'?>
<title>
  <?=$_GET['p']?>
</title>
</head>

<body>
  <?php include 'View/navbarView.php'?>
  <div id="haut"></div>
  <header>

  </header>
  <div class="err"></div>
  <div class="container">
    <div class="row">
      <div class="col-sm-3 fondbodyl">
        <img src="<?=$membre['avatar']?>" alt="Profile" class="profil">
        <p style="color:white;"><strong><?=$membre['firstname']?>
      </strong><br>
      <em style="color:#8899a6">@<?=$membre['username']?></em></p>
      <div class="row">
        <p class="count">Tweets </p>
        <p class="count">Followers </p>
        <p>Following</p>
      </div>
      <div class="row">
        <p class="count-n">
          <strong style="color:#1da1f2;"><?=$cntweet?></strong>
        </p>
        <p class="count-n">
          <strong style="color:#1da1f2;"><?=$cnfollowers?></strong>
        </p>
        <p><strong style="color:#1da1f2;"><?=$cnfollowing?></strong></p>
      </div>
    </div>
    <div class="col-lg-9">
      <div class="twit fondhead form-tweet">
        <div class="center">

          <h2>Username</h2>
          <p>@
            <?=$membre['username']?>
          </p>
          <h2>Firstname</h2>
          <p>
            <?=$membre['firstname']?>
          </p>
          <h2>Lastname</h2>
          <p>
            <?=$membre['lastname']?>
          </p>
          <h2>Email</h2>
          <p>
            <?=$membre['email']?>
          </p>
        </div>
      </div>
    </div>
    <div class="twit fondhead form-tweet col-lg-6">
      <div class="center">
        <h4 class="foll">FOLLOWERS</h4>
        <?php
        while ($follower = $followers->fetch()) {
          ?>
          <a href="index.php?c=Extprofile&p=<?=$follower['username']?>">
            <p><img src="<?=$follower['avatar']?>" class="profil" alt="profil"> @
              <?=$follower['username']?>
            </p>
          </a>
          <?php
        }?>
      </div>
    </div>
    <div class="twit fondhead form-tweet col-lg-6">
      <div class="center">
        <h4 class="foll">FOLLOWING</h4>
        <?php while ($followin = $following->fetch()) { ?>
          <a href="index.php?c=Extprofile&p=<?=$followin['username']?>">
            <p><img src="<?=$followin['avatar']?>" class="profil" alt="profil"> @
              <?=$followin['username']?>
            </p>
          </a>
          <?php
        }?>
      </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content fondbody">
          <div class="modal-header fond">
            <h5 class="modal-title" id="exampleModalLabel">Nouveau Tweet</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body fondbody">
            <form action="index.php?c=tweet" method="post">
              <div class="form-group">
                <label for="message-text" class="col-form-label">Message:</label>
                <textarea class="form-control" name="tweet" id="message-text"></textarea>
              </div>
              <div class="modal-footer fondebody">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Envoyer</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<script src="Controller/header.js"></script>
</body>

</html>
