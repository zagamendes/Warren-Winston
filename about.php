<?php

include_once("classes/content_about.php");
include_once("classes/photo.php");

$content_aboutDAO = new content_aboutDAO();
$content_about = $content_aboutDAO->listContent();

$photoDAO = new PhotoDAO();
$photo = $photoDAO->listContent2("photo_about");
include_once("header.php");
?>


<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <img src="img/Warren-Winston-109.jpg" class="img-responsive img-circle" width="100%">
            <div class="caption text-center">
                <h3>Warren Winston</h3>
            </div>
        </div>
        <div class="col-sm-9">
            <video controls="" width="100%" poster="img/WarrenWinston-logo-clr.png">
                <source src="img/warren.mp4" type="video/mp4">
            </video>
        </div>
    </div><br>
    <div class="row" id="about">
        <?php
		echo $content_about->getContent();
		?>
    </div>
</div>
<?php
include_once("footer.php");
?>

</body>

</html>