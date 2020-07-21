<?php
	session_start();
	if(!isset($_SESSION["user"])){
			header('location:../admin/login');
	}

	if(isset($_GET["status"])){
		$status=$_GET["status"];
	}else{
		$status="null";
	}
	
	//include_once("../parameters.php");
	include_once("header-dashboard.php");
?>
		<style type="text/css">
			.btn:hover{
				background: black;
				color: white;
				transition: all .3s;
			}
			a{
				color: black;
			}
			
		</style>


				


			 <div class="container">
			 	<?php 
					include_once("../notifications.php");  
				?>


				<div class="row" style="margin-top: 20px; margin-bottom: 20px;">
				 
					

					<div class="col-sm-4">
						<button class="btn btn-lg btn-block text-uppercase font-weight-bold" data-toggle="modal" data-target="#home"> 
							<span class="fas fa-image"></span> Add photo to home page
						</button>
					</div>

					<div class="col-sm-4">
						<button class="btn btn-lg btn-block text-uppercase font-weight-bold label-dashboard" data-toggle="modal" data-target="#workshop"> 
							<span class="fas fa-image"></span> Add photo to workshop page
						</button>
					</div>

					<div class="col-sm-4">
						<button class="btn btn-lg btn-block text-uppercase font-weight-bold label-dashboard" data-toggle="modal" data-target="#testimony"> 
							<span class="fas fa-smile-beam"></span> Add a Testimony 
						</button>
					</div>

					
				</div>	

				<div class="row">
					<div class="col-sm-4">
						<a href="slideshowphoto">
							<button class="btn btn-lg btn-block text-uppercase font-weight-bold label-dashboard" > 
								<span class="fas fa-edit"></span> Edit photos of home page
							</button>
						</a>
					</div>

					<div class="col-sm-4">
						<a href="workshopslideshow">
							<button class="btn btn-lg btn-block text-uppercase font-weight-bold label-dashboard" > 
								<span class="fas fa-edit"></span> Edit photos of workshop page
							</button>
						</a>
					</div>

					<div class="col-sm-4">
						<a href="Testimonies">
							<button class="btn btn-lg btn-block text-uppercase font-weight-bold label-dashboard" > 
								<span class="fas fa-edit"></span> Edit Testimonies
							</button>
						</a>
					</div>
					
				</div>		
				
					
			
	

	

	<div class="modal fade" id="home">
		
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title font-weight-bold text-capitalize">About Home Photos </h3>
				</div>
				<div class="modal-body">
					<form method="post" action="../processes/save photo" enctype="multipart/form-data">
						<input type="hidden" name="home" value="home">
						<input type="hidden" name="table" value="photo_slideshow">
						<input type="hidden" name="page" value="index">
						<div class="form-group">
							<label class="text-uppercase">Ttitle:</label>
							<input type="text"  name="title" class="form-control" >
						</div>
						
						<div class="form-group">
							<label class="text-uppercase">Short Description:</label>
							<textarea  name="description" class="form-control"  rows="3">
							</textarea>
						</div>

						<div class="form-group">
							<label class="btn  btn-primary font-weight-bold btn-block text-uppercase"><span class="fas fa-image"></span> select photo 
								<input type="file" style="position: absolute;z-index: -1; width: 0;" required name="photo" class="form-control">
							</label>
						</div>

						<div class="row">
							<div class="col-sm-6">
								<button name="dashboard" class="btn btn-success btn-block btn-lg text-uppercase font-weight-bold">
									<span class="fas fa-check-circle"></span> Save 
								</button>
							</div>

							<div class="col-sm-6">
								<button type="button" class="btn btn-danger btn-block btn-lg  text-uppercase font-weight-bold" data-dismiss="modal">
									<span class="fas fa-times"></span> Close 
								</button>
							</div>
						</div>
					</form>
				</div>
					
			</div>
		</div>
	</div>

	<div class="modal fade" id="workshop">
		
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title font-weight-bold text-capitalize">Add Workshop Photo </h3>
				</div>
				<div class="modal-body">
					<form method="post" action="../processes/save photo" enctype="multipart/form-data">
						<input type="hidden" name="home" value="home">
						<input type="hidden" name="table" value="photo_slideshow_workshop">
						<input type="hidden" name="page" value="index">
						<div class="form-group">
							<label class="text-uppercase">Ttitle:</label>
							<input type="text"  name="title" class="form-control" >
						</div>
						
						<div class="form-group">
							<label class="text-uppercase">Short Description:</label>
							<textarea  name="description" class="form-control"  rows="3">
							</textarea>
						</div>

						<div class="form-group">
							<label class="btn  btn-primary font-weight-bold btn-block text-uppercase"><span class="fas fa-image"></span> select photo 
								<input type="file" style="position: absolute;z-index: -1; width: 0;" required name="photo" class="form-control">
							</label>
						</div>

						<div class="row">
							<div class="col-sm-6">
								<button name="dashboard" class="btn btn-success btn-block btn-lg text-uppercase font-weight-bold">
									<span class="fas fa-check-circle"></span> Save 
								</button>
							</div>

							<div class="col-sm-6">
								<button type="button" class="btn btn-danger btn-block btn-lg  text-uppercase font-weight-bold" data-dismiss="modal">
									<span class="fas fa-times"></span> Close 
								</button>
							</div>
						</div>
					</form>
				</div>
					
			</div>
		</div>
	</div>

	<div class="modal fade" id="testimony">
		
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title font-weight-bold text-capitalize">Registration of Testimonies</h3>
				</div>
				<div class="modal-body">
					<form method="post" action="../processes/process testimony" enctype="multipart/form-data">
						<input type="hidden" name="page" value="index">
						<div class="form-group">
							<label class="text-uppercase">Name:</label>
							<input type="text"  name="name" class="form-control" required placeholder="E.G. Izaac Mendes" >
						</div>

						<div class="form-group">
							<label class="text-uppercase">Occupation:</label>
							<input type="text"  name="occupation" class="form-control" required placeholder="E.G. Web Developer" >
						</div>

						<div class="form-group">
							<label class="text-uppercase">Short Message:</label>
							<textarea  name="testimony" class="form-control"  rows="3" required placeholder="E.G. Brief message about what the person has to say about your service." >
							</textarea>
						</div>

						<div class="form-group">
							<label class="btn  btn-primary font-weight-bold btn-block text-uppercase"><span class="fas fa-image"></span> select photo 
								<input type="file" style="position: absolute;z-index: -1; width: 0;" required name="photo" class="form-control">
							</label>
						</div>

						<div class="row">
							<div class="col-sm-6">
								<button name="dashboard" class="btn btn-success btn-block btn-lg text-uppercase font-weight-bold">
									<span class="fas fa-check-circle"></span> Save 
								</button>
							</div>

							<div class="col-sm-6">
								<button type="button" class="btn btn-danger btn-block btn-lg  text-uppercase font-weight-bold" data-dismiss="modal">
									<span class="fas fa-times"></span> Close 
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
							
		 

								
					
						 
		 
			
			
		</body>
</html>