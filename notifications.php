<?php
  isset($_GET["status"]) ? $status = $_GET["status"] : $status="";


                if($status=="sent"){ ?>
                  <div class="alert alert-success alert-dismissible fade in" >
                    <strong>SUCCESS!</strong> Your email has been sent to us.
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                  </div>

    <?php       } ?>

        <?php
          if($status=="erro"){ ?>
            <div class="alert alert-danger alert-dismissible fade in" >
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>ERROR!</strong>&nbsp; Sorry, there was an error to try execute this action.<?=$_GET["error"]?> 
            </div>  
      <?php } 

       if($status=="success"){ ?>
                  <div class="alert alert-success alert-dismissible fade in" >
                    <strong>SUCCESS!</strong> action completed successfully.
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                  </div>

    <?php       } ?>