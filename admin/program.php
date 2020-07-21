<?php
	session_start();
	if(!isset($_SESSION["user"])){
			header('location:../admin/login');
	}
	
	include_once("../classes/photo.php");
	//include_once("../parameters.php");
	
	include_once("header-dashboard.php");
	
	include_once("../classes/content_program_right_side.php");
	
	include_once("../classes/content_program_left_side.php");

	$photo = new PhotoDAO();


	$content_program_right_side = new content_program_right_sideDAO();
	$contentPRight = $content_program_right_side->listContent();

	$content_program_left_side = new content_program_left_sideDAO();
	$contentPLeft = $content_program_left_side->listContent();
	
	$photoBP=$photo->listContent2("background_program");

	$photos=$photo->listContentProgram("photo_program");
	

	

?>
<link rel="stylesheet" type="text/css" href="../css/program.css">

		<section>
			<div class="container">
				<?php 
					include_once("../notifications.php");  
				?>
				<center><img src="../img/<?= $photoBP->getPhoto();?>" class="img-responsive"></center>
				<form method="post" action="../processes/save photo.php" enctype="multipart/form-data">
					
					<div class="row">
								
						<div class="col-sm-6">
							<label class="btn btn-primary btn-block text-uppercase font-weight-bold">
								<span class="fas fa-image"></span> Change Picture
								<input type="file" name="photo" style="position: absolute; width: 0; z-index: 0;">
							</label>
							<input type="hidden" name="id" value="<?= $photoBP->getId();?>">
							<input type="hidden" name="table" value="background_program">
							<input type="hidden" name="oldphoto" value="<?=$photoBP->getPhoto();?>">
							<input type="hidden" name="page" value="program">
						</div>
									
						<div class="col-sm-6">

							<button type="submit" class="btn btn-success btn-block font-weight-bold text-uppercase">
								<span class="fas fa-check"></span> Save
							</button>

						</div>
					</div>
				</form>
			</div>
		</section>
		 
				 
		<section class="successful-male-pictures">
			<div class="container">
				<div class="row">

					<!-- albuns -->
					<div class="col-sm-6 ">
						
							<div class="row albuns">
									<?php foreach ($photos as $photo) {?>
										<div class="col-sm-6">
												<img src="../img/<?= $photo->getPhoto();?>" class="img-responsive fotos">
										</div>
									<?php } ?>
							</div><!-- /row -->
							<a href="programphotos">
								<button class="btn btn-primary btn-block text-uppercase font-weight-bold"><span class="fas fa-images"></span> Edit Pictures</button>
							</a>


					</div> <!--COL-SM-6 -->
					

					<!-- servicos -->
					<div class="col-sm-6">
							<form action="../processes/process program.php" method="post">
								<input type="hidden" name="id_program_right_side" value="<?= $contentPRight->getId();?>">
								<textarea name="content_program_right_side">
									<?php
										echo $contentPRight->getContent();
									?>
								</textarea>
								<button class="btn btn-success btn-block font-weight-bold text-uppercase form-control"><span class="fas fa-check"></span> Save</button>
							</form>
					</div>
							 
				 
				</div>
			</div>
		</section>
									 
								 
		<section id="recursos">
			<div class="container">
				<div class="row">
					
					<!-- recursos -->
					<!-- <div class="col-sm-6">
						<form action="../processes/process program_left.php" method="post">
								<input type="hidden" name="id_program_left_side" value="<?= $contentPLeft->getId();?>">
								<textarea name="content_program_left_side">
									<?php
										echo $contentPLeft->getContent();
									?>
								</textarea>
								<button class="btn btn-success btn-block font-weight-bold text-uppercase"><span class="fas fa-check"></span> save</button>
							</form>

					</div> -->

					<!-- img recursos -->
					<div class="col-sm-12">
							
						<video controls=""  style="width: 100%;" poster="../img/cover.jpg">
							<source src="../img/success male.mp4" type="video/mp4">
							<source src="../img/success male.mp4" type="video/ogv">
							<source src="../img/success male.mp4" type="video/webm">
						</video>
						
					</div>

				</div>
			</div>
		</section>



		<?php
			include_once("footer.php");
		?>
							
						

						 
		 
			
			
		</body>

		<script type="text/javascript">
			CKEDITOR.replace('content_program_right_side');
			CKEDITOR.replace('content_program_left_side');
		</script>
</html>