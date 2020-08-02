<?php
session_start();
if (!isset($_SESSION["user"])) {
	header('location:../admin/login');
}

include_once("../classes/content_index_right_side.php");
include_once("../classes/content_index_left_side.php");
include_once("../classes/photo.php");
include_once("header-dashboard.php");


$photo = new photoDAO();
$content_index_left_side = new content_index_left_sideDAO();
$content_index_right_side = new content_index_right_sideDAO();



$contentLeft = $content_index_left_side->listContent();


$contentRight = $content_index_right_side->listContent();



$photoLeft = $photo->listContent2("index_photo_left_side");

$photoRight = $photo->listContent2("index_photo_right_side");

$photos = $photo->listContent("photo_slideshow");



?>



<div class="container">
	<?php
	include_once("../notifications.php");
	?>
	<div class="row">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<?php
				$ativo = 2;
				$Indicators = 1;
				foreach ($photos as $photo) {
					if ($ativo == 2) {
						$ativo = 1;
				?>
						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<?php } else {

					?>
						<li data-target="#myCarousel" data-slide-to="<?= $Indicators ?>"></li>


					<?php
						$Indicators++;
					} ?>

				<?php } ?>

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
							<img style="padding: 0px;" src="../img/<?= $photo->getPhoto(); ?>">

						</div>
					<?php } else { ?>
						<div class="item">
							<img style="padding: 0px;" src="../img/<?= $photo->getPhoto(); ?>">
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

	<div class="row">
		<div class="col-sm-6">
			<img src="../img/<?= $photoLeft->getPhoto(); ?>" class="img-responsive">
			<form method="post" action="../processes/save photo.php" enctype="multipart/form-data">
				<div class="row">
					<div class="col-sm-6">
						<label class="btn btn-primary font-weight-bold text-uppercase btn-block">
							<span class="fas fa-image"></span> Change Photo
							<input type="file" name="photo" style="position: absolute;z-index: 0; width: 0;">
						</label>
						<input type="hidden" name="id" value="<?= $photoLeft->getId(); ?>">
						<input type="hidden" name="table" value="index_photo_left_side">
						<input type="hidden" name="page" value="home">
					</div>
					<div class="col-sm-6">
						<button class="btn btn-success btn-block font-weight-bold text-uppercase"><span class="fas fa-check"></span> save </button>
					</div>
				</div>
			</form>

		</div>


		<div class="col-sm-6">
			<form method="post" action="../processes/process.php">
				<input type="hidden" name="id_index_right_side" value="<?= $contentRight->getId(); ?>">

				<textarea rows="25" cols="100%" name="content_index_right_side">
												<?php
												echo $contentRight->getContent();
												?>
										</textarea>
				<button class="btn btn-primary form-control font-weight-bold text-uppercase"><span class="fas fa-check"> Save Text </button>
			</form>

		</div>
	</div>
	<!-- SECOND ROW -->
	<div class="row" style="margin-top: 40px;">
		<div class="container">
			<div class="row">
				<!-- TEXT LEFT SIDDE -->
				<div class="col-sm-6">

					<form method="post" action="../processes/process left.php" enctype="multipart/form-data">


						<input type="hidden" name="id_index_left_side" value="<?= $contentLeft->getId(); ?>">
						<textarea rows="25" cols="100%" name="content_index_left_side">
													<?php

													echo $contentLeft->getContent();

													?>
													
												</textarea>
						<button class="btn btn-primary btn-block font-weight-bold text-uppercase">
							<span class="fas fa-check"></span> Save Text
						</button>
					</form>
				</div>
				<!-- PICTURE RIGHT SIDE  -->
				<div class="col-sm-6">
					<img src="../img/<?= $photoRight->getPhoto(); ?>" class="img-responsive">
					<form method="post" action="../processes/save photo.php" enctype="multipart/form-data">
						<div class="row">
							<div class="col-sm-6">
								<label class="btn btn-primary btn-block font-weight-bold text-uppercase">
									<span class="fas fa-image"></span> Change picture
									<input type="hidden" name="id" value="<?= $photoRight->getId(); ?>">
									<input type="hidden" name="table" value="index_photo_right_side">
									<input type="file" name="photo" style="position: absolute;z-index: 0; width: 0;">
									<input type="hidden" name="page" value="home">
								</label>
							</div>
							<div class="col-sm-6">
								<button name="" value="Save Photo" class="btn btn-success btn-block font-weight-bold text-uppercase">
									<span class="fas fa-check"></span> Save
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include_once("footer.php");
?>


<script>
	CKEDITOR.replace('content_index_right_side');
	CKEDITOR.replace('content_index_left_side');
</script>







</body>

</html>