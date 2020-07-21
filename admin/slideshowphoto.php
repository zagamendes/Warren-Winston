<?php
	session_start();
		if(!isset($_SESSION["user"])){
			header('location:../admin/login');
	}
	include_once("../classes/photo.php");
	include_once("header-dashboard.php");
	
	
	$photo= new photoDAO();
	$photos=$photo->listContent("photo_slideshow");

	?>
	<script type="text/javascript" src="../js/events-slideshow.js"></script>

			<div class="container">
				<legend><h2 class="font-weight-bold text-uppercase text-center">Photos of home page</h2></legend>
			
				<?php 
					include_once("../notifications.php");  
				?>
				<div class="modal fade in" id="myModal">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h2 class="font-weight-bold text-uppercase">Edition of Picture</h2>
							</div>
							<div class="modal-body">
								<form action="../processes/save photo" enctype="multipart/form-data" method="post">
									<input type="hidden" name="page" value="slideshowphoto">
									<input type="hidden" name="table" value="photo_slideshow">
									<input type="hidden" name="slideshow" value="slideshow">
									<input type="hidden" name="id" id="id">
									<div class="form-group">
										<label>Title:</label>
										<input type="text" name="title" id="title" class="form-control">
									</div>
									<div class="form-group">
										<label>Description:</label>
										<input type="text" name="description" id="description" class="form-control">
									</div>
									<div class="form-group">
										<label>Picture:</label>
										<!-- <label class="btn btn-primary btn-block font-weight-bold text-uppercase">
											<span class="fas fa-image"></span> Select Picture
											
											
										</label> -->
										<input type="file" name="photo" class="form-control">
										<input type="hidden" name="oldphoto" id="oldphoto">
									</div>

									<div class="row">
										<div class="col-sm-6">
											<button class="btn btn-success btn-block font-weight-bold text-uppercase">
												<span class="fas fa-check"></span> Save
												
											</button> 
										</div>
										<div class="col-sm-6">
											<button data-dismiss="modal" type="button" class="btn btn-danger btn-block font-weight-bold text-uppercase">
												<span class="fas fa-times"></span> close
												
											</button> 
										</div>
									</div>

								</form>
							</div>
							
						</div>
					</div>
				</div>
				<table class="table table-hover">
					<thead>
						<tr>
							<th class="font-weight-bold text-uppercase">Photo</th>
							<th class="font-weight-bold text-uppercase">title</th>
							<th class="font-weight-bold text-uppercase">Description</th>
							<th class="font-weight-bold text-uppercase">Edit</th>
							<th class="font-weight-bold text-uppercase">Delete</th>
						</tr>
					</thead>

					<tbody>
						<?php foreach ($photos as $photo) { ?>
			
							<tr>
								<td><img src="../img/<?=$photo->getPhoto()?>" style="width: 100px;" class="img-responsive"></td>
								<td><?= $photo->getTitle()?></td>
								<td><?= $photo->getDescription()?></td>
								<td>
									<button class="btn btn-primary text-uppercase font-weight-bold" data-id="<?= $photo->getId()?>" data-title="<?= $photo->getTitle()?>" data-description="<?= $photo->getDescription()?>" data-oldPhoto="<?= $photo->getPhoto()?>"><span class="fas fa-edit"></span> Edit</button>
								</td>
								<td><a class="btn btn-danger" onclick="return confirm('are you sure that you want to delete this?');" href="../processes/delete.php?id=<?=$photo->getId();?>&table=photo_slideshow&photo=<?=$photo->getPhoto();?>&page=slideshowphoto">
									<span class="fas fa-trash"></span> Delete 
									</a>
								</td>
							</tr> 
			
				<?php 	} ?>
					</tbody>
				</table>
			</div>
</body>
<?php
	include_once("footer.php");

?>