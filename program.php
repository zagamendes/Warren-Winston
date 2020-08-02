<?php
include_once("classes/photo.php");
//include_once("parameters.php");


include_once("classes/content_program_right_side.php");

include_once("classes/content_program_left_side.php");

$photo = new PhotoDAO();


$content_program_right_side = new content_program_right_sideDAO();
$contentPRight = $content_program_right_side->listContent();

$content_program_left_side = new content_program_left_sideDAO();
$contentPLeft = $content_program_left_side->listContent();

$photoBP = $photo->listContent2("background_program");

$photos = $photo->listContentProgram("photo_program");
include_once("header.php");
?>
<link rel="stylesheet" type="text/css" href="css/program.css">

<section>
  <div class="container">
    <center><img src="img/logo-successful-male.jpg" class="img-responsive"></center>
  </div>
</section>


<section class="successful-male-pictures">
  <div class="container">
    <div class="row teste">

      <!-- albuns -->
      <div class="col-sm-6">

        <div class="row">

          <?php foreach ($photos as $photo) { ?>
            <div class="col-sm-6">
              <img src="img/<?= $photo->getPhoto(); ?>" class="img-responsive fotos">
            </div>
          <?php } ?>

        </div><!-- /row -->

      </div>

      <!-- servicos -->
      <div class="col-sm-6 successful-male-text">
        <?php
        echo $contentPRight->getContent();
        ?>
        <a href="connect"><button class="btn btn-default btn-learn-more">Learn more...</button></a>

      </div>


    </div>
</section>






<section class="section-video">
  <div class="container">

    <video controls="" class="video" poster="img/logo-successful-male.jpg">
      <source src="img/success male.mp4" type="video/mp4">
    </video>


  </div>
</section>
<?php
include_once("footer.php");
?>

</body>

</html>