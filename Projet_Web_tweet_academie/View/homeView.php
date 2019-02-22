<!DOCTYPE html>
<html lang="en">

<?php include 'View/headerView.php'?>
<title>
  Accueil
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
        <img src="<?=$_SESSION['avatar']?>" alt="Profile" class="profil">
        <p class="white"><strong><?=$_SESSION['firstname']?>
      </strong><br>
      <em class="grey">@<?=$_SESSION['username']?></em></p>
      <div class="row">
        <p class="count">Tweets </p>
        <p class="count">Followers </p>
        <p>Following</p>
      </div>
      <div class="row">
        <p class="count-n blue"><strong>
          &emsp;<?=$cntweet;?></strong>
        </p>
        <p class="count-n blue"><strong>
          <?=$cnfollowers;?></strong>
        </p>
        <p><strong class="blue"><?=$cnfollowing;?></strong></p>

      </div>
    </div>
    <div class="col-lg-6">
      <div class="twit fondhead form-tweet">
        <img src="<?=$_SESSION['avatar']?>" alt="Profile"
        class="profil float tweetimg">
        <form action="index.php?c=tweet" method="post" class="col-lg-12">
          <div class="row">

            <div class="row col-lg-10">
              <textarea name="tweet" rows="1"
              class="form-control bg-dark"
              placeholder="Quoi de neuf ?"></textarea>

            </div>
            <div class="col-lg-2">
              <button class="btn-primary tweet" type="submit" name="Tweet">
                <strong>Tweeter</strong>
              </button>
            </div>
          </div>
        </form>
      </div>


      <div class="modal fade" id="exampleModal" tabindex="-1"
      role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content fondbody">
          <div class="modal-header fond">
            <h5 class="modal-title" id="exampleModalLabel">
              Nouveau Tweet
            </h5>
            <button type="button" class="close" data-dismiss="modal"
            aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body fondbody">
          <form action="index.php?c=tweet" method="post">
            <div class="form-group">
              <label for="message-text" class="col-form-label">
                Message:
              </label>
              <textarea class="form-control bg-dark" name="tweet"
              id="message-text"></textarea>
            </div>
            <div class="modal-footer fondebody">
              <button type="button" class="btn btn-secondary"
              data-dismiss="modal">Fermer
            </button>
            <button type="submit" class="btn btn-primary">
              Envoyer
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>
<?php while ($line = $tline->fetch()) {
  while ($rtw = $rt->fetch()) {
    if (!empty($rtw['content_tweet'])) {
      ?>
      <div class="fondbodyt">
        <div class="row">
          <p class="container">
            <img src="<?=$line['avatar']?>" alt="Profile" class="profil">
            <strong class="white"><?=$line['firstname'];?>
          </strong>
          <a href="index.php?c=Extprofile&p=<?=$line['username']?>">
            @<?=$line['username']?>
          </a> - retweet :
          <?php
          $times = new ReTime($rtw);
          $time = $times->time();
          ?><br>
          <img src="<?=$rtw['avatar']?>" alt="Profile" class="profil">
          <strong class="white"><?=$rtw['firstname'];?>
        </strong>
        <a href="index.php?c=Extprofile&p=<?=$rtw['username']?>">
          @<?=$rtw['username']?>
        </a> :
        <?php
        $times = new Time($line);
        $time = $times->time();
        ?>
      </p>
    </div>
    <div class="form-control bg-dark text-grey">
      <p>
        <?=$rtw['content_tweet']?>
      </p>
      <?php
      foreach ($comrt as $key => $value) {
        if (!empty($value['content_comment'])
          && $value['id_tweet'] == $rtw['id_tweet']) { ?>
            <p>
              <a href="index.php?c=Extprofile&p=<?=$value['username']?>">
                @<?=$value['username'] ?></a> : <?=$value['content_comment'] ?>
              </p>
            <?php }
          } ?>
          <form action="index.php?c=comment" method="post" class="col-lg-12">
            <div class="row">
              <div class="row col-lg-9">
                <textarea name="content_comment" rows="1"
                class="form-control bg-dark tweet-area"
                placeholder="Une réponse ?"></textarea>
              </div>
              <div class="col-lg-2">
                <button class="follow" type="submit"
                value="<?=$rtw['id_tweet']?>" name="id_tweet">
                <strong>Répondre</strong>
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php
  } };
  ?>
  <div class="fondbodyt">
    <div class="row">
      <p class="container">
        <img src="<?=$line['avatar']?>" alt="Profile" class="profil">
        <strong class="white"><?=$line['firstname'];?></strong>
        <a href="index.php?c=Extprofile&p=<?=$line['username']?>">
          @<?=$line['username']?> :
        </a>
        <?php
        $times = new Time($line);
        $time = $times->time();
        ?>
      </p>
    </div>
    <div class="form-control bg-dark text-grey">
      <p>
        <?=$line['content_tweet']?>
      </p>
      <?php foreach ($com as $key => $value) {
        if (!empty($value['content_comment'])
          && $value['id_tweet'] == $line['id_tweet']) { ?>
            <p>
              <a href="index.php?c=Extprofile&p=<?=$rtw['username']?>">
                @<?=$value['username'] ?>
              </a> : <?=$value['content_comment'] ?></p>
            <?php } } ?>
            <form action="index.php?c=comment" method="post" class="col-lg-12">
              <div class="row">
                <div class="row col-lg-9">
                  <textarea name="content_comment" rows="1"
                  class="form-control bg-dark tweet-area"
                  placeholder="Une réponse ?"></textarea>
                </div>
                <div class="col-lg-2">
                  <button class="follow" type="submit" name="id_tweet"
                  value="<?=$line['id_tweet']?>">
                  <strong>Répondre</strong>
                </button>
              </div>
            </div>
          </form>
        </div>
        <div class="col-lg-11">
          <div class="row">
            <form action="index.php?c=retweet" method="post" class="col-lg-2">
              <button type="submit" value="<?= $line['id_tweet']  ?>"
                name="id" class="btn-primary tweet">
                Retweeter
              </button>
            </form>
          </div>
        </div>
      </div>
    <?php }?>
  </div>
  <div class="col-sm-3 fondbodyr">
    <?php while ($my = $moi->fetch()) {
      ?>
      <div class="foll">
        <img src="<?=$my['avatar']?>" alt="Profile" class="profil recommended">
        <p>
          <?=$my['firstname']?> <br>
          <a href="index.php?c=Extprofile&p=<?=$my['username']?>">
            @<?=$my['username']?>
          </a>
        </p>
        <form action="index.php?c=follow" method="post">
          <button class="follow" type="submit" value="<?=$my['id_user']?>" name="follow">
            <strong>Follow</strong>
          </button>
        </form>
      </div>
    <?php }?>
  </div>
</div>
</div>
<script src="Controller/header.js"></script>
</body>

</html>
