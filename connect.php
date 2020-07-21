<?php
	
	
	include_once("header.php");
?>
		

			<div class="container" style="position: relative;">
				<?php
					include_once("notifications.php");
				?>
				
				<div class="row">
					<div class="col-sm-6">
						<h1>CONNECT WITH ME!</h1>

						<p style="font-size: medium;">Need some assistance to move forward in going from good to extraordinary? Then feel free to connect with me! I'd like to believe that the cost for achieving MASSIVE SUCCESS is priceless! 

						I truly look forward to hearing from you. </p>

						International Mail Center:
						<p><span class="fas fa-map-marker-alt"></span> P.O. Box 6248,Katy, TX 77491</p>
						<p><span class="fas fa-envelope"></span> askme@warrenwinston.com</p>
						<p><span class="fas fa-phone-alt"></span> 888-802-8666</p>
					</div>
				</div>


				<div class="row">
					<div class="col-sm-6">
						
						<form action="processes/mail.php" method="post">

							<div class="form-group">
								<label>Name*:</label>
								<div class="input-group">
									<span class="input-group-addon">
										<span class="fas fa-user"></span>
									</span>
									<input type="text" name="name" required=""  placeholder="Your name" class="form-control">
								</div>
							</div>

							<div class="form-group">
								<label>Email*:</label>
								<div class="input-group">
									<span class="input-group-addon">
										<span class="fas fa-at"></span>
									</span>
									<input type="email" name="email" required=""  placeholder="Ex:youremail@something.com" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label>Subject*:</label>
								<div class="input-group">
									<span class="input-group-addon">
										<span class="fas fa-envelope"></span>
									</span>
									<input type="text" name="subject" required=""  placeholder="What is about?" class="form-control">
								</div>
							</div>
							<textarea class="form-control" rows="5" name="message"  placeholder="Message"></textarea>
							<button class="btn btn-primary text-uppercase font-weight-bold btn-lg btn-block">Send <span class="fas fa-paper-plane"></span></button>
						</form>

					</div>

					<div class="col-sm-6">
						<iframe src="https://www.google.com/maps/embed?pb=!4v1539571076400!6m8!1m7!1sMR-5KQqiQkgpBPjfoYqiPw!2m2!1d29.74641414013298!2d-95.37203408154707!3f338.40076625703375!4f-0.5299250679190948!5f0.7820865974627469" frameborder="1" style="width: 100%; height: 50%;"  allowfullscreen></iframe>
					</div>
				</div>

			</div>
	 <?php
			include_once("footer.php");
		?>
</body>
</html>