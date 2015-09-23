<?php include_once 'konfiguracija.php'; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include_once 'head.php'; ?>
  </head>
  <body>

    <?php 

      include_once 'carousel.php'; 
      include_once 'navbar.php';

    ?>    

    <!-- START THE FEATURETTES -->

    <?php include_once 'o_nama.php'; ?>
    
    <hr class="featurette-divider">

    <div class="row featurette">        
      <?php include_once 'nadolazeci_dogadaji.php'; ?>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-12" id="prijedlog">
        <h2 class="featurette-heading">Imaš ideju?</h2>
        <a href="prijedlozi.php" class="button btn btn-primary">Javi nam se</a>
      </div>
      <!--<div class="col-md-5 col-md-pull-7"></div>-->
    </div>

    <hr class="featurette-divider">

    <?php include_once 'kontakt.php'; ?>
   
    <!-- /END THE FEATURETTES -->

    <?php include_once 'podnozje.php'; ?>      

    <!-- /.container -->

    <?php include_once 'skripte.php'; ?>
    
  </body>
</html>