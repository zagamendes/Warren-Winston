<?php
include_once("../parameters.php");
if (isset($_GET["erro"])) {
  $erro = $_GET["erro"];
} else {
  $erro = 0;
}

?>

<html>

<head>
  <title>Warren Winston</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="img/WarrenWinston-logo-clr.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../estilo.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../functions.js"></script>

</head>

<body>


  <nav class="navbar navbar-inverse">
    <img src="../img/WarrenWinston-logo-wht.png" id="img-logo-top" class="img-responsive logo-login">
  </nav>

  <div class="container">

    <fieldset>
      <form action="../processes/validalogin.php" method="post">
        <center>
          <legend>Login</legend>
          <?php if ($erro == 1) { ?>
            <font color="red">
              <p align=center>User or password is wrong. Try again.</p>
            </font>
          <?php } ?>
          <div class="col-sm-4 login">
            <label>User</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input type="text" name="user" class="form-control" placeholder="User">

            </div>
            <br>
            <label>Password</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span><input type="password" class="form-control" name="password" placeholder="password">
            </div>
            <br>
            <input type="submit" name="" value="Sign in" class="btn btn-primary form-control">
          </div>
        </center>

    </fieldset>



  </div>
  <br>
  <br>
  <br>
  <br>
  <br>
  <footer id="rodape">

    <div class="row">

      <div class="col-sm-2">
        <img src="../img/WarrenWinston-logo-wht.png" class="img-responsive">
      </div>

      <div class="col-sm-3">
        <p>© 2017 WLW ENTERPRISES, LLC<br> All Rights Reserved</p>

      </div>

      <div class="col-md-7">
        <nav class="navbar">

          <ul class="nav navbar-nav">
            <li><a href="index.html" class="active" id="home">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="#">The Program</a></li>
            <li><a href="gallery.html">Gallery</a></li>
            <li><a href="connect.php">Connect</a></li>
            <li class="img-responsive"><a href=""><img src="../img/facebook.png"></a></li>
            <li class="img-responsive"><a href=""><img src="../img/twitter.png"></a></li>
            <li class="img-responsive"><a href=""><img src="../img/instagram.png"></a></li>
          </ul>
        </nav>
      </div>





    </div><!-- /row -->

  </footer>









</body>

</html>