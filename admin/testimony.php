<?php
	include_once("../classes/testimony.php");
	session_start();
 	if(!isset($_SESSION["user"])){
      header('location:../admin/login');
  	}
	isset($_GET["id"]) ? $id = $_GET["id"] : $id = 0;
	$testimonyDAO = new TestimonyDAO();
	$testimony = $testimonyDAO->listTestimoniesById($id);

	include_once("header-dashboard.php");
?>

        
	<div class="container">
		<?php 
          include_once("../notifications.php");  
        ?>
		
			<legend><h3 class="font-weight-bold text-uppercase text-center">Registration Of Testimonies</h3></legend>
			<form action="../processes/process testimony.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="page" value="testimony">
				<input type="hidden" name="update" value="update">
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label>Name:</label>
							<input type="hidden" name="id" value="<?= $testimony->getId()?>">
							<input type="text" class="form-control" value="<?= $testimony->getName()?>" name="name" required="required" placeholder="Ex: Izaac Mendes">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Occupation:</label>
							<input type="text" class="form-control" value="<?= $testimony->getOccupation()?>" placeholder="Ex: Web Developer" required  name="occupation">
						</div>
					</div>

					<div class="col-sm-6">
						<div class="form-group">
							<label>Picture:</label>
							<label class="btn btn-primary btn-block font-weight-bold text-uppercase"><span class="fas fa-image"></span> Picture
								<input type="file" name="photo" style="position: absolute;z-index: 0;width: 0">
								<input type="hidden" name="oldPhoto" value="<?= $testimony->getPhoto()?>">
							</label>
						</div>
					</div>
				

					<div class="col-sm-12">
						<div class="form-group">
							<label>Message:</label>
							<textarea class="form-control" required="required" rows="4" value="" name="testimony"><?=$testimony->getTestimony();?>
							</textarea>
						</div>
					</div>

					

				</div>
				<div class="row">
					<div class="col-sm-6">
						
						<button class="btn btn-success btn-block font-weight-bold text-uppercase"><span class="fas fa-check"></span> save</button>
						
					</div>
					<div class="col-sm-6">
						
						<a href="testimony">
							<button type="button" class="btn btn-primary btn-block font-weight-bold text-uppercase">
								<span class="fas fa-plus"></span> New
							</button>
						</a>
						
					</div>
				</div>
			</form>
	</div>
<?php
	include_once("footer.php");
?>