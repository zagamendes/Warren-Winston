<?php
	session_start();
 	if(!isset($_SESSION["user"])){
      header('location:../admin/login');
  	}
	include_once("../classes/testimony.php");
	include_once("header-dashboard.php");
	$testimonyDAO = new TestimonyDAO();

	$testimonies = $testimonyDAO->listTestimonies();
?>
>
        
<div class="container">
	<?php 
          include_once("../notifications.php");  
        ?>
	<h3 style="text-align: center; margin-bottom: 20px;" class="font-weight-bold text-uppercase">List Of Testimonies</h3>

<table class="table table-hover table-striped">
	<thead>
		<tr>
			<th class="font-weight-bold text-uppercase">Photo</th>
			<th class="font-weight-bold text-uppercase">Name</th>
			<th class="font-weight-bold text-uppercase">Occupation</th>
			<th class="font-weight-bold text-uppercase">Testimony</th>
			<th class="font-weight-bold text-uppercase">Edit </th>
			<th class="font-weight-bold text-uppercase">Delete </th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($testimonies as $testimony) { ?>
			<tr>
				<td><img src="../img/<?= $testimony->getphoto()?>" class="img-circle"></td>

				<td><?= $testimony->getName()?></td>
				<td><?= $testimony->getOccupation()?></td>
				<td><?= $testimony->getTestimony()?></td>
				<td><a href="testimony?id=<?=$testimony->getId()?>" class="btn btn-primary text-uppercase font-weight-bold"><span class="fas fa-edit"></span> Edit </a></td>
				<td>
					<a class="btn btn-danger font-weight-bold text-uppercase" onclick="return confirm('Are You Sure You Want To Delete This Item?');" href="../processes/delete?id=<?=$testimony->getId();?>&page=testimonies&table=testimony&photo=<?=$testimony->getPhoto()?>"><span class="fas fa-trash"></span> Delete </a></td>
			</tr>
<?php		} ?>
							
	</tbody>
</table>