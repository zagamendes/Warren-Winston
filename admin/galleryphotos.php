<?php
	session_start();
  	if(!isset($_SESSION["user"])){
      header('location:../admin/login');
 	}
	include_once("../classes/photo.php");
	if(isset($_GET["status"])){
		$status=$_GET["status"];
	}else{
		$status="null";
	}
  include_once("header-dashboard.php");
	
	$photo= new photoDAO();
	$photos=$photo->listContent("photo_gallery");


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
            	<?php foreach ($photos as $photo1) { ?>
            		
            			
            				<tr>
            					<td><img src="../img/<?=$photo1->getPhoto()?>" style="width: 100px;" class="img-responsive"></td>
            					<td>
            						<form method="post" action="../processes/save photo.php" enctype="multipart/form-data">
            							<input type="file" name="photo">
                        	<input type="hidden" name="id" value="<?= $photo1->getId();?>">
                        	<input type="hidden" name="table" value="photo_slideshow">
                        	<input type="hidden" name="oldphoto" value="<?=$photo1->getPhoto();?>">
                        	<button class="btn btn-success">Save <span class=" glyphicon glyphicon-save"></span></button>
            						
            						</form>
            					</td>
            					<td><a class="btn btn-danger" onclick="return confirm('are you sure that you want to delete this?');" href="../processes/delete.php?id=<?=$photo1->getId();?>&table=photo_gallery&photo=<?=$photo1->getPhoto();?>&page=edit_gallery photos">
            						Delete <span class="glyphicon glyphicon-trash"></span>
            						</a>
            					</td>
            				</tr> 
            			
              <?php } ?>
      	     </tbody>
        </table>
      </div>
</body>