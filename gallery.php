<?php
  include_once("parameters.php");
  include_once("classes/photo.php");
  
  
  $photo= new photoDAO();
  $photos=$photo->listContent("photo_gallery");

?>

<html>
    <head>
        <title>Warren Winston</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="estilo.css">
        <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/jquery-mask.js"></script>
        <link rel="icon"  href="img/WarrenWinston-logo-clr.png">
        <script type="text/javascript" src="functions.js"></script>
        <script src="http://malsup.github.io/min/jquery.cycle2.min.js"></script>

     	 
        
    </head>
   
    <body>
    
       
      <nav class="navbar navbar-inverse">
          <div class="container">
            <div class="navbar-header">
              <img src="img/WarrenWinston-logo-wht.png" class="logo">
              <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#barra-navegacao">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
              

              <div id="barra-navegacao" class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index" class="active" id="home">Home</a></li>
                    <li><a href="about">About</a></li>
                    <li id="programs"><a href="#">Programs<span class="caret"></span></a>
                      <ul class="menu-dropdown" id="menu-dropdown">
                        <li><a href="business">Doing Business Unsual</a></li>
                        <li><a href="program">The Successful Male</a></li>
                        <li><a href="workshops">Workshops</a></li>
                      </ul>
                    </li>
                    <li><a href="#">Gallery</a></li>
            <li><a href="connect">Connect</a></li>
                </ul>
              </div>
            </div> 
      </nav>
            
      <div class="container">
        <div class="cycle-slideshow" data-cycle-fx="scrollHorz" data-cycle-timeout="0" data-cycle-prev="#prev" data-cycle-next="#next" data-cycle-pager="#pager" data-cycle-pager-template="<a href='#'><img src='{{src}}' height=100px; width=100px;>">
          <span id="prev" class="glyphicon glyphicon-chevron-left"></span>
          <span id="next" class="glyphicon glyphicon-chevron-right"></span>
          <?php 
                            
            foreach ($photos as $photo1) { ?>
          <img src="img/<?=$photo1->getPhoto();?>" class="img-responsive" style="width: 100%; height: auto;">
  <?php   }  ?>

        </div>
        <div id="pager"></div>
        
      </div>
   <?php
      include_once("footer.php");
    ?>
              
            
    </body>
</html>