<?php
//include_once("../parameters.php");
include_once("classes/testimony.php");




$testimonyDAO = new TestimonyDAO();
$testimonies = $testimonyDAO->listTestimonies();
include_once("header.php");
?>
<link rel="stylesheet" type="text/css" href="css/business.css">


<div class="container">
  <?php
  include_once("notifications.php");
  ?>

  <video controls="" class="img-responsive video" poster="img/WarrenWinston-logo-clr.png">
    <source src="img/warren.mp4" type="video/mp4">
  </video>

  <br>
  <div class="row">
    <div id="myCarousel" class="carousel slide testimonies" data-ride="carousel">


      <!-- Wrapper for slides -->
      <div class="carousel-inner">

        <?php
        $active = 2;
        foreach ($testimonies as $testimony) {
          if ($active == 2) {
            $active = 1;
        ?>
            <div class="item active">
              <center>
                <div class="balao">
                  <h2>"<?= $testimony->getTestimony() ?>"</h2>
                </div>
                <img style="padding: 0px;" class="img-circle" src="img/<?= $testimony->getPhoto(); ?>">
                <div class="bottom-text">
                  <h4><?= $testimony->getName() ?></h4>
                  <p><?= $testimony->getOccupation() ?></p>
                </div>
              </center>
            </div>
          <?php } else { ?>
            <div class="item">
              <center>
                <div class="balao">
                  <h2>"<?= $testimony->getTestimony() ?>"</h2>
                </div>
                <img style="padding: 0px;" class="img-circle" src="img/<?= $testimony->getPhoto(); ?>">
                <div class="bottom-text">
                  <h4><?= $testimony->getName() ?></h4>
                  <p><?= $testimony->getOccupation() ?></p>
                </div>
              </center>
            </div>

          <?php } ?>
        <?php } ?>
      </div>
      <!--carousel inner-->

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <!--carousel-->
  </div>
  <!--row do carousel-->
  <br>


  <fieldset style="border-top: 1px solid grey; padding-top: 20px;">
    <center>
      <h1>EXPLODE YOUR SUCCESS IN THE NEXT 90 DAYS</h1>
      <br>
      <P><strong>
          This simple guide reveals the "10 STEPS TO BECOME SUCCESSFUL MALE".
        </strong>
        <br>
        Finally you can learn the time-tested principles of achievement
        apply proven strategies to explode your results.
      </P>
    </center>
    <div class="row">
      <div class="col-sm-5">
        <form action="processes/mail.php" method="post">
          <label>Name *</label>
          <div class="form-group">
            <input type="text" name="name" class="form-control input-lg" required placeholder="Name">
            <input type="hidden" name="page" value="business">
          </div>



          <label>Email address *</label>
          <div class="form-group">
            <input type="email" name="email" placeholder="youremail@mail.com" class="form-control input-lg" required>
          </div>
          <input type="submit" id="iwant" class="btn btn-danger btn-block btn-lg" value="YES, I WANT THIS">
        </form>

      </div>
      <div class="col-sm-6">
        <img src="img/tablet.png" class="img-responsive tablet-successful-male">
      </div>
    </div>

  </fieldset>

</div>
<?php
include_once("footer.php");
?>

</body>

</html>