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
include_once("../classes/content_about.php");
include_once("../classes/photo.php");

include_once("header-dashboard.php");
$content_aboutDAO = new content_aboutDAO();
$content_about = $content_aboutDAO->listContent();

$photoDAO = new PhotoDAO();
$photo = $photoDAO->listContent2("photo_about");
?>


<div class="container">
	<?php
	include_once("../notifications.php");
	?>
	<div class="row">
		<div class="col-sm-3">
			<img src="../img/<?= $photo->getPhoto() ?>" class="img-responsive img-circle">
			<div class="caption text-center">
				<h3>Warren Winston</h3>
			</div>

			<form action="../processes/save photo.php" enctype="multipart/form-data" method="post">
				<div class="row">
					<div class="col-sm-6">
						<label class="btn btn-primary text-uppercase font-weight-bold btn-block">
							<span class="fas fa-image"></span> Picture
							<input type="file" name="photo" style="position: absolute; width: 0; z-index: 0;">
							<input type="hidden" name="id" value="<?= $photo->getId(); ?>">
							<input type="hidden" name="oldphoto" value="<?= $photo->getOldPhoto(); ?>">
							<input type="hidden" name="table" value="photo_about">
							<input type="hidden" name="page" value="about">
						</label>
					</div>
					<div class="col-sm-6">
						<button class="btn btn-success btn-block font-weight-bold text-uppercase"><span class="fas fa-check"></span> save</button>
					</div>
				</div>
			</form>

		</div>
		<div class="col-sm-9">
			<video controls="" style="max-width: 100%; float: right;" poster="../img/WarrenWinston-logo-clr.png">
				<source src="../img/warren.mp4" type="video/mp4">
			</video>
		</div>
	</div>

	<form action="../processes/process about.php" method="post">
		<input type="hidden" name="id" value="<?= $content_about->getId(); ?>">
		<textarea name="about">
							<?php
							echo $content_about->getContent();
							?>
						</textarea>
		<button class="btn btn-success btn-block font-weight-bold text-uppercase "><span class="fas fa-check"></span> Save</button>
	</form>

</div>
<?php
include_once("footer.php");
?>
</body>
<script>
	CKEDITOR.replace('about');
</script>

</html>