<?php
	include_once("classes/photo.php");
	include_once("classes/testimony.php");
	include_once("classes/content_workshop_right_side.php");


	$photo = new PhotoDAO();
	$photos = $photo->listContent("photo_slideshow_workshop");
	$photoWorkshop = $photo->listContent2("workshop_photo_left_side");
	$content_workshop_right_side = new content_workshop_right_sideDAO();
	$contentWorkshop = $content_workshop_right_side->listContent();

	$testimonyDAO = new TestimonyDAO();
	$testimonies = $testimonyDAO->listTestimonies();
	include_once("header.php");
?>
		<link rel="stylesheet" type="text/css" href="css/workshops.css">
			<!-- SLIDESHOW -->
			<section>
				<div class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						
						
						<?php 
							$active=2;
							foreach ($photos as $photo) { 
								if($active==2){
										$active=1;
							?>
								<div class="item active">
									<img class="img-responsive" src="img/<?=$photo->getPhoto();?>">
									<div class="carousel-caption">
										<h2 class="font-weight-bold"><?= $photo->getTitle()?></h2>
										<p class="font-weight-bold"><?= $photo->getDescription()?></p>
									</div>
														 
								</div>
				<?php 			}else{ ?>
									<div class="item">
										<img class="img-responsive" src="img/<?=$photo->getPhoto();?>">
										<div class="carousel-caption">
											<h2 class="font-weight-bold"><?= $photo->getTitle()?></h2>
											<p class="font-weight-bold"><?= $photo->getDescription()?></p>
										</div>
									</div>

					<?php 		} ?>

					<?php 	} ?>

									
					</div>
				</div>
			</section>

			<!-- SECTION WITH A PICTURE AND TEXT -->
			<section class="section-warren-business">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-6" style="">
							 <img src="img/<?= $photoWorkshop->getPhoto();?>" class="img-responsive">
						</div>
						<div class="col-sm-6" style="">
							<?php
									echo $contentWorkshop->getContent();
							?>
						</div>
					</div>
				</div>
			</section>

			<!-- SECTION BLACK SQUARES -->
			<section style="background-color: black; margin-top: 40px; padding: 40px;">
				<div class="container">
					<div class="row row-squares">
						<div class="col-sm-4 workshop-squares" >
							<img src="img/bar-chart.png" class="img-responsive workshop-squares-img">
									<h3 class="workshops-titles">INCREASE YOUR BUSINESS</h3>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc purus orci, vulputate in condimentum et, congue vel massa.
									</p>
									<a href="connect">
										<button class="btn btn-default workshop-buttons">CONNECT WITH ME</button>
									</a>
						</div>

						<div class="col-sm-4 workshop-squares"  >
							<img src="img/calendar.png" class="img-responsive workshop-squares-img">
								<h3 class="workshops-titles">ACHIEVE YOUR GOALS QUICKLY</h3>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc purus orci, vulputate in condimentum et, congue vel massa.
								</p>
								<a href="connect">
									<button class="btn btn-default workshop-buttons" >CONNECT WITH ME</button>
								</a>
						</div>

						<div class="col-sm-4 workshop-squares"  >
							<img src="img/connection.png" class="img-responsive workshop-squares-img">
									<h3 class="workshops-titles">EXPAND YOUR NETWORK</h3>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc purus orci, vulputate in condimentum et, congue vel massa.
								</p>
								<a href="connect">
									<button class="btn btn-default workshop-buttons">CONNECT WITH ME</button>
								</a>
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
																				<h2 class="font-weight-bold">"<?=$testimony->getTestimony()?>"</h2>
																			</div>
																			<img src="img/<?= $testimony->getPhoto()?>" style="width: 150px; height: 150px;" class="img-circle">
																			<div class="bottom-text">
																				<h4 class="font-weight-bold"><?= $testimony->getName()?></h4>
																				<p class="font-weight-bold"><?= $testimony->getOccupation()?></p>
																			</div>
																		</center>
																	</div>
												<?php   }else{ ?>
																	<div class="item">
																		<center>
																			<div class="balao">
																				<h2 class="font-weight-bold">"<?=$testimony->getTestimony()?>"</h2>
																			</div>
																			<img src="img/<?= $testimony->getPhoto()?>" class="img-circle" style="width: 150px; height: 150px;">
																			<div class="bottom-text">
																				<h4 class="font-weight-bold"><?= $testimony->getName()?></h4>
																				<p class="font-weight-bold"><?= $testimony->getOccupation()?></p>
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
			<div class="row" style="background-color: white; " >
				
					<video controls="" class="video-workshop img-responsive"  poster="img/WarrenWinston-logo-clr.png">
						<source src="img/warren.mp4" type="video/mp4">
					</video>
				
			</div>

			<?php
				include_once("footer.php");
			?>
		 
	</body>
</html>