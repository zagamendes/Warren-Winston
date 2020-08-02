<?php
include_once("classes/content_index_right_side.php");
include_once("classes/content_index_left_side.php");
include_once("classes/photo.php");
include_once("header.php");


$photo = new photoDAO();
$content_index_left_side = new content_index_left_sideDAO();
$content_index_right_side = new content_index_right_sideDAO();



$contentLeft = $content_index_left_side->listContent();


$contentRight = $content_index_right_side->listContent();



$photoLeft = $photo->listContent2("index_photo_left_side");

$photoRight = $photo->listContent2("index_photo_right_side");

$photos = $photo->listContent("photo_slideshow");
?>
<link rel="stylesheet" type="text/css" href="css/index.css">


<div class="container">

    <div class="row" style="margin-bottom: 20px !important;">

        <div id="myCarousel" class="carousel slide myCarousel" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <?php
				$ativo = 2;
				$Indicators = 1;
				foreach ($photos as $photo) {
					if ($ativo == 2) {
						$ativo = 1; ?>

                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <?php 		} else { ?>

                <li data-target="#myCarousel" data-slide-to="<?= $Indicators ?>"></li>

                <?php $Indicators++; ?>
                <?php		} ?>

                <?php 	} ?>



            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <?php
				$active = 2;
				foreach ($photos as $photo) {

					if ($active == 2) {

						$active = 1;
				?>
                <div class="item active">

                    <img style="padding: 0px;" src="img/<?= $photo->getPhoto(); ?>" class="img-responsive">
                    <div class="carousel-caption">

                        <h2 class="text-uppercase font-weight-bold">

                            <?= $photo->getTitle() ?>

                        </h2>
                        <p class="text-uppercase font-weight-bold"><?= $photo->getDescription() ?></p>

                    </div>

                </div>
                <?php 			} else { ?>

                <div class="item">

                    <img style="padding: 0px;" src="img/<?= $photo->getPhoto(); ?>">

                    <div class="carousel-caption">

                        <h3 class="text-uppercase font-weight-bold">

                            <?= $photo->getTitle() ?>

                        </h3>
                        <p><?= $photo->getDescription() ?></p>

                    </div>

                </div>

                <?php 			} ?>

                <?php 		} ?>

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

    <div class="row">

        <div class="col-sm-6 picture">
            <img src="img/<?= $photoLeft->getPhoto(); ?>" class="img-responsive img-rounded">

        </div>


        <div class="col-sm-6">
            <?= $contentRight->getContent(); ?>
            <a href="about"><button class="btn btn-primary">Read more...</button></a>


        </div>
    </div>

    <div class="row">

        <div class="col-sm-6">

            <?= $contentLeft->getContent(); ?>
            <a href="program"><button class="btn btn-primary">Learn more...</button></a>

        </div>

        <div class="col-sm-6 picture">
            <img src="img/<?= $photoRight->getPhoto(); ?>" class="img-responsive img-rounded">
        </div>
    </div>
</div>

<?php
include_once("footer.php");
?>
</body>

</html>