<?php
	session_start();
	if(!isset($_SESSION["user"])){
			header('location:../admin/login');
	}
	if(isset($_GET["status"])){
		$status=$_GET["status"];
	}else{
		$status=null;
	}
	//include_once("../parameters.php");
	include_once("../classes/photo.php");
	include_once("../classes/testimony.php");
	include_once("../classes/content_workshop_right_side.php");


	$photo = new PhotoDAO();
	$photos = $photo->listContent("photo_slideshow_workshop");
	$photoWorkshop = $photo->listContent2("workshop_photo_left_side");
	$content_workshop_right_side = new content_workshop_right_sideDAO();
	$contentWorkshop = $content_workshop_right_side->listContent();

	$testimonyDAO = new TestimonyDAO();
	$testimonies = $testimonyDAO->listTestimonies();

	include_once("header-dashboard.php");
?>
		<link rel="stylesheet" type="text/css" href="../css/workshops.css">

			<section>
				<div class="carousel slide" data-ride="carousel">
					<div class="carousel-inner pictures">
						
						<?php 
							$active=2;
							
							foreach ($photos as $photo) { 
								
								if($active==2){
									$active=1;
								?>
									<div class="item active">
										<img class="img-responsive" src="../img/<?=$photo->getPhoto();?>">
										<div class="carousel-caption">
											<h2 class="font-weight-bold"><?= $photo->getTitle()?></h2>
										</div>
									</div>
						<?php 	}else{ ?>
									<div class="item">
										<img class="img-responsive" src="../img/<?=$photo->getPhoto();?>">
										<div class="carousel-caption">
											<h2 class="font-weight-bold"><?= $photo->getTitle()?></h2>
										</div>
									</div>

						<?php 	} ?>

					<?php 	} ?>

									
					</div>
				</div>
			</section>

				
			<section class="section-warren-business">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-6" style="">
							<img src="../img/<?= $photoWorkshop->getPhoto();?>" class="img-responsive">
							<div class="row">
								<form method="post" action="../processes/save photo.php" enctype="multipart/form-data">
									<div class="col-sm-6">
										<label class="font-weight-bold text-uppercase btn btn-primary btn-block">
											<span class="fas fa-image"> Change picture </span>
											<input type="file" name="photo" style="position: absolute;width: 0; z-index: -1;">
										</label>
									</div>
									<div class="col-sm-6">
										<input type="hidden" name="id" value="<?= $photoWorkshop->getId();?>">
										<input type="hidden" name="table" value="workshop_photo_left_side">
										<input type="hidden" name="page" value="workshops">
										<input type="hidden" name="oldphoto" value="<?= $photoWorkshop->getOldPhoto()?>">
										<button class="font-weight-bold text-uppercase btn btn-success btn-block">
											<span class="fas fa-check"></span>Save												
										</button>
									</div>
								</form>
							</div>
						</div>

						<div class="col-sm-6" style="">
							<form action="../processes/process workshop.php" method="post">
								<input type="hidden" name="id_workshop_right_side" value="<?= $contentWorkshop->getId();?>">
								<textarea name="content_workshop_right_side">
									<?php
										echo $contentWorkshop->getContent();
									?>
								</textarea>
								<input type="submit" name="" value="save" class="btn btn-success form-control">
								
							</form>
						</div>
					</div>
				</div>
			</section>

			<section style="background-color: black; padding-top: 30px; padding-bottom: 30px; margin-top: 20px;">
				<div class="container" style="">
					<div class="row row-squares">
						<div class="col-sm-4 workshop-squares" >
							<img src="../img/bar-chart.png" class="img-responsive workshop-squares-img">
								<div class="workshop-squares-h2">
									<center><h2>INCREASE YOUR BUSINESS</h2></center>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc purus orci, vulputate in condimentum et, congue vel massa.
									</p>
								</div>
									<button class="btn btn-default workshop-buttons">CONNECT WITH ME
									</button>
						</div>

						<div class="col-sm-4 workshop-squares" >
							<img src="../img/calendar.png" class="img-responsive workshop-squares-img">
							<div class="workshop-squares-h2">
								<center><h2>ACHIEVE YOUR GOALS QUICKLY</h2></center>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc purus orci, vulputate in condimentum et, congue vel massa.
								</p>
							</div>
								<button class="btn btn-default workshop-buttons" >CONNECT WITH ME</button>
						</div>

						<div class="col-sm-4 workshop-squares" >
							<img src="../img/connection.png" class="img-responsive workshop-squares-img">
							<div class="workshop-squares-h2">
								<center>
									<h2>EXPAND YOUR NETWORK</h2>
								</center>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc purus orci, vulputate in condimentum et, congue vel massa.
								</p>
							</div>
									<button class="btn btn-default workshop-buttons">CONNECT WITH ME</button>
						</div>

					</div>
				</div>
			</section>

			<!-- TESTIMONIES -->
	  		<section class="testimonies-section">
		 		<div class="row">
			 		<div id="myCarousel" class="carousel slide testimonies-workshop" data-ride="carousel">
				  		
				  		<!-- Wrapper for slides -->
				  		<div class="carousel-inner ">

							<?php
								$ativo=2;

							  foreach ($testimonies as $testimony) { 
								if($ativo==2){ 
								  $ativo=1; ?>
								  <div class="item active">
								  
									<center>
									  <div class="balao">
										<h2>"<?=$testimony->getTestimony()?>"</h2>
									  </div>
									  <img src="../img/<?= $testimony->getPhoto()?>" style="width: 150px; height: 150px;" class="img-circle">
									  <div class="bottom-text">
										<h4><?= $testimony->getName()?></h4>
										<p><?= $testimony->getOccupation()?></p>
									  </div>
									</center>
								  </div>
						<?php   }else{ ?>
								  <div class="item">
									<center>
									  <div class="balao">
										<h2>"<?=$testimony->getTestimony()?>"</h2>
									  </div>
									  <img src="../img/<?= $testimony->getPhoto()?>" class="img-circle" style="width: 150px; height: 150px;">
									  <div class="bottom-text">
										<h4><?=$testimony->getName()?></h4>
										<p><?=$testimony->getOccupation()?></p>
									  </div>
									</center>

								  </div>
				<?php           }
							  }  ?>

						</div><!--carousel inner-->
						<a class="left carousel-control" href="#myCarousel" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" href="#myCarousel" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right"></span>
							<span class="sr-only">Next</span>
						</a>
					  
				  </div><!--carousel-->
			   </div><!--row do carousel-->
	  		</section>

	  		<div class="row" style="background-color: white;">
				
				<video controls="" class="video-workshop img-responsive"  poster="../img/WarrenWinston-logo-clr.png">
					<source src="img/warren.mp4" type="video/mp4">
				</video>
				
			</div>


			<script>
				CKEDITOR.replace('content_workshop_right_side');
			</script>
			<?php include_once("footer.php");
			?>