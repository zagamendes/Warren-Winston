<?php
session_start();
if (!isset($_SESSION["user"])) {
	header('location:../admin/login');
}
include_once("../classes/photo.php");

$photo = new PhotoDAO();
$photos = $photo->listContentProgram("photo_program");
include_once("header-dashboard.php");
?>


<div class="container">

	<?php
	include_once("../notifications.php");
	?>

	<table class="table table-hover">
		<thead>
			<tr>
				<th>Photo</th>
				<th>Edit <span class="glyphicon glyphicon-pencil"></span></th>
				<th>Delete <span class="glyphicon glyphicon-trash"></span></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($photos as $photo) { ?>


				<tr>
					<td><img src="../img/<?= $photo->getPhoto() ?>" style="width: 100px;" class="img-responsive"></td>
					<td>
						<form method="post" action="processes/save photo.php" enctype="multipart/form-data">
							<label class="btn btn-primary font-weight-bold text-uppercase"><span class="fas fa-image"></span> Change Picture
								<input type="file" name="photo" style="position: absolute;width: 0; z-index: 0;">
							</label>

							<input type="hidden" name="id" value="<?= $photo->getId(); ?>">
							<input type="hidden" name="table" value="photo_program">
							<input type="hidden" name="oldphoto" value="<?= $photo->getPhoto(); ?>">
							<button class="btn btn-success font-weight-bold text-uppercase"><span class="fas fa-check"></span> Save </button>

						</form>
					</td>
					<td><a class="btn btn-danger" onclick="return confirm('are you sure that you want to delete this?');" href="../processes/delete.php?id=<?= $photo->getId(); ?>&table=photo_program&photo=<?= $photo->getPhoto(); ?>&page=edit_program photos">
							<span class="fas fa-trash"></span> Delete
						</a>
					</td>
				</tr>

			<?php } ?>
		</tbody>
	</table>

</div>
</body>