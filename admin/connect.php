<?php
session_start();
if (!isset($_SESSION["user"])) {
  header('location:../admin/login');
}
if (isset($_GET["status"])) {
  $status = $_GET["status"];
} else {
  $status = null;
}

include_once("../parameters.php");
?>
<html>

<head>
  <title>Warren Winston</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../img/WarrenWinston-logo-clr.png">
  <script src="//cdn.ckeditor.com/4.10.1/full/ckeditor.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../estilo.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../functions.js"></script>

</head>

<body>


  <nav class="navbar navbar-inverse">
    <div class="container">
      <div class="navbar-header">
        <img src="../img/WarrenWinston-logo-wht.png" class="logo">
        <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#barra-navegacao">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>


      <div id="barra-navegacao" class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right menu">

          <li><a href="../index" target="_blank" id="home">Home</a></li>
          <li><a href="../about" target="_blank">About</a></li>
          <li id="programs"><a href="#">Programs<span class="caret"></span></a>
            <ul class="menu-dropdown" id="menu-dropdown">
              <li><a href="../business" href="../business" target="_blank">Doing Business Unsual</a></li>
              <li><a href="../program" href="../program" target="_blank">The Successful Male</a></li>
              <li><a href="../Workshops" href="../workshops" target="_blank">Workshops</a></li>
            </ul>
          </li>
          <li><a href="../gallery" target="_blank">Gallery</a></li>
          <li><a href="../connect" target="_blank">Connect</a></li>
          <li><a href="logout">Sign out <span class="glyphicon glyphicon-log-out"></span></a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <form style="margin-top:35px;" action="../processes/process connect.php" method="post">
          <input type="hidden" name="id" value="<?= $content_connect->getId(); ?>">
          <textarea name="connect">
                <?php
                echo $content_connect->getContent();
                ?>
              </textarea>
          <input type="submit" name="" value="save" class="btn btn-primary btn-lg">
        </form>
      </div>
    </div>
    <div class="row">
      <form action="" method="post">
        <div class="col-sm-6">
          <div class="form-group">
            <input type="text" name="nome" required="" disabled placeholder="name*" class="form-control">
          </div>
          <div class="form-group">
            <input type="email" name="email" required="" disabled="" placeholder="email*" class="form-control">
          </div>
          <div class="form-group">
            <input type="text" name="assunto" required="" disabled="" placeholder="subject*" class="form-control">
          </div>
          <textarea class="form-control" rows="5" name="mensagem" disabled="" placeholder="Message"></textarea>
          <input type="submit" disabled="" class="btn btn-success" value="Send" style="float:right;">
        </div>
      </form>
      <div class="col-sm-6">
        <iframe src="https://www.google.com/maps/embed?pb=!4v1539571076400!6m8!1m7!1sMR-5KQqiQkgpBPjfoYqiPw!2m2!1d29.74641414013298!2d-95.37203408154707!3f338.40076625703375!4f-0.5299250679190948!5f0.7820865974627469" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
    </div>
  </div>
  <?php
  include_once("../footer.php");
  ?>
</body>
<script type="text/javascript">
  CKEDITOR.replace('connect');
</script>

</html>